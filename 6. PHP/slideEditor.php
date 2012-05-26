<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Variables
$username = '';
$formName = '';
$oTitle = false;
$oContent = false;
$oImage = false;
$oVideo = false;
$title = 'Title';
$subtitle = 'Subtitle';
$text = 'Example text';
$img = 'core/images/noImage.png';
$vid = USERS_PATH . 'jimi.webm';
$presentationDir = '';
$showSlides = array();
$deleted = false;

// start or continue session
SpoonSession::start();

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
    $username = SpoonSession::get('username');
}

// Redirect to Home if not logged in
if (!$loggedIn) {
    header('Location: index.php');
}

// get presentation id
$Pid = SpoonFilter::getGetValue('Pid', null, 0);

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

// load presentation info
$presentation = $db->getRecord('SELECT * FROM presentations WHERE id = ?', $Pid);

// load slides
$slides = $db->getRecords('SELECT * FROM slides WHERE presentation_id = ?', $Pid);

// set directory
$presentationDir = USERS_PATH . $username . '/presentations/videos/';

// get selected template
$template = SpoonFilter::getGetValue('template', null, '');

// get slide nr
$nr = SpoonFilter::getGetValue('nr', null, 0);

// get slide nr to delete
$delete = SpoonFilter::getGetValue('delete', null, '');

// show msg if deleted
$deleted = SpoonFilter::getGetValue('deleted', null, false);

// nr of deleted slide
$delNr = SpoonFilter::getGetValue('delNr', null, 0);

// Title template
if ($template == '' || $template == 'title') {
    // big slide
    $oTitle = true;
    
    // Form
    $frm = new SpoonForm('frmEditTitle');

    $frm->setParameter('class', 'clearfix');

    $frm->addText('contentTitle', $title);
    $frm->addText('contentSubtitle', $subtitle);
    
    $formName = 'frmEditTitle';
}

// content template
if ($template == 'content') {
    // big slide
    $oContent = true;
    
    // Form
    $frm = new SpoonForm('frmEditContent');

    $frm->setParameter('class', 'clearfix');

    $frm->addText('contentTitle', $title);
    $frm->addTextarea('contentText', $text);
    
    $formName = 'frmEditContent';

}

// image template
if ($template == 'image') {
    // big slide
    $oImage = true;
    
    // Form
    $frm = new SpoonForm('frmEditImage');

    $frm->setParameter('class', 'clearfix');

    $frm->addText('contentTitle', $title);
    $frm->addImage('contentImage');
    
    $formName = 'frmEditImage';
}

// video template
if ($template == 'video') {
    // big slide
    $oVideo = true;
    
    // Form
    $frm = new SpoonForm('frmEditVideo');

    $frm->setParameter('class', 'clearfix');

    $frm->addText('contentTitle', $title);
    $frm->addFile('contentVideo');
    
    $formName = 'frmEditVideo';
}


// Form handler
if($frm->isSubmitted()) {
        // get slide number
        $newNr = $db->getVar('SELECT MAX(nr) FROM slides WHERE presentation_id = ?', $Pid) +1;
        
        // image template
        if ($template == 'image') {
            $image = $frm->getField('contentImage'); //just to shorten the code
            // check image extension
            if($image->isAllowedExtension(array('jpg', 'png', 'gif'), 'Only jpg/gif/png are allowed.')) {
                // image is not bigger than 5MB
                if($image->isFilesize(5, 'mb', 'smaller', 'Too large. 5MB maximum')) {
                    // dimensions are minium 50x50
                    if($image->hasMinimumDimensions(50, 50, 'Too small. 50x50 minimum')) {
                    // move file
                    $image->moveFile($presentationDir . '/images/' . $image->getFileName(), 'Failed to upload the image to the server.');
                    }
                }
            }
        }
        
        // video template
        if ($template == 'video') {
            if($frm->getField('contentVideo')->isFilled('Please upload a video.')){
                $video = $frm->getField('contentVideo'); //just to shorten the code
                // video must be in webm format
                if($video->getExtension() == 'webm') {
                    // video is not bigger than 20MB
                    if($video->isFilesize(20, 'mb', 'smaller', 'Too large. 20MB maximum')) {   
                        // move file
                        if (!$video->moveFile($presentationDir . '/videos/' . $video->getFileName())) {   
                            $video->addError('Failed to upload.');
                        } 
                    }
                } else {
                    $video->addError('Your video must be in webm format.');
                } 
            }
        }
        
        if($frm->isCorrect())
	{
            // all the information that was submitted
            $data = $frm->getValues();

            // insert data in the DB
            $slide = array();
            $slide['title'] = $data['contentTitle'];
            
            // title template
            if ($template == '' || $template == 'title') {
                $slide['template'] = 'title';
                $slide['content'] = $data['contentSubtitle'];
            }
            
            // content template
            if ($template == 'content') {
                $slide['template'] = 'content';
                $slide['content'] = $data['contentText'];
            }
            
            // image template
            if ($template == 'image') {
                $slide['template'] = 'image';
                $slide['image'] = $image->getFileName();
            }
            
            // video template
            if ($template == 'video') {
                $slide['template'] = 'video';
                $slide['video'] = $video->getFileName();
            }                     
            
            // add presentation id
            $slide['presentation_id'] = $Pid;
            
            // check if it's a new slide
            if ($nr == 0) {
                // add slide number
                $slide['nr'] = $newNr;
                // insert
                $db->insert('slides', $slide); 
            } else {
                // add slide number
                $slide['nr'] = $nr;
                // update
                $db->update('slides', $slide, 'nr = ?', $nr);
            }
	}
}

// show selected slide
if ($nr != 0) {
    foreach ($slides as $s) {
        if ($s['nr'] == $nr) {
            $title = $s['title'];

            switch($s['template']){
                case 'title':
                        $subtitle = $s['content'];
                        break;
                case 'content':
                        $text = $s['content'];
                        break;
                case 'image':
                        $img = $s['image'];
                        break;
                case 'video':
                        $vid = $presentationDir . $s['video'];
                        break;
                default: 
                        die('error');
            }
        }
    }
}

// show all slides
$dbSlides = $db->getRecords('SELECT * FROM slides WHERE presentation_id = ? ORDER BY nr', $Pid);
//check for slides
if($dbSlides !== null) {
    foreach ($dbSlides as $tmpSlide){
            $slide = array();
            switch($tmpSlide['template']){
                    case 'title':
                            $slide['oTitle'] = true;
                            $slide['title'] = $tmpSlide['title'];
                            $slide['subtitle'] = $tmpSlide['content'];
                            $slide['template'] = $tmpSlide['template'];
                            $slide['nr'] = $tmpSlide['nr'];
                            break;
                    case 'content':
                            $slide['oContent'] = true;
                            $slide['title'] = $tmpSlide['title'];
                            $slide['text'] = $tmpSlide['content'];
                            $slide['template'] = $tmpSlide['template'];
                            $slide['nr'] = $tmpSlide['nr'];
                            break;
                    case 'image':
                            $slide['oImage'] = true;
                            $slide['title'] = $tmpSlide['title'];
                            $slide['imgSrc'] = $presentationDir . '/images/' . $tmpSlide['image'];
                            $slide['template'] = $tmpSlide['template'];
                            $slide['nr'] = $tmpSlide['nr'];
                            break;
                    case 'video':
                            $slide['oVideo'] = true;
                            $slide['title'] = $tmpSlide['title'];
                            $slide['template'] = $tmpSlide['template'];
                            $slide['nr'] = $tmpSlide['nr'];
                            break;
                    default: 
                            die('error');
            }
            array_push($showSlides, $slide);
    }
}

// delete slide
if (!$delete == '') {
    //check if number exists in DB
    foreach($slides as $s) {
        if ($s['nr'] == $delete) {
            if($db->delete('slides', 'nr = ?', $delete) == 1) {
                SpoonDirectory::delete($presentationDir . '/slide_' . $delete);
                $deleted = true;
                header('Location: slideEditor.php?Pid=' . $Pid . '&deleted=' . $deleted . '&delNr=' . $delete);
            }
        }
    }
}

/*
 * Page Template
 */

$Page = new SpoonTemplate ();

// Compile options
$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

// Page assigns

// big slide
$Page->assign('oTitle', $oTitle);
$Page->assign('oContent', $oContent);
$Page->assign('oImage', $oImage);
$Page->assign('oVideo', $oVideo);
$Page->assign('title', $title);
$Page->assign('subtitle', $subtitle);
$Page->assign('text', $text);
$Page->assign('img', $img);
$Page->assign('vid', $vid);

// Form
$frmTpl = new SpoonTemplate();

// Compile options
$frmTpl->setForceCompile(COMPILE_TEMPLATES);
$frmTpl->setCompileDirectory('cache');

$frm->parse($frmTpl);
$Page->assign('frmEdit', $frmTpl->getContent('templates/forms/' . $formName . '.tpl'));

// template links
$Page->assign('self', $_SERVER['PHP_SELF'] . '?Pid=' . $Pid);

// slides
if (isset($showSlides)) {
    $Page->assign('iSlides', $showSlides);
}

// delete 
$Page->assign('nr', $nr);
    // successfull
    if ($deleted) {
        $Page->assign('deleted', $delNr);
        $Page->assign('oDeleted', $deleted);
    }

// show the output
$Page->display ('templates/slideEditor.tpl');

?>