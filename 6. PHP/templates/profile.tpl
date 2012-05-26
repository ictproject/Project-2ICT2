<h3>Profile</h3>

<h4>Presentations</h4>
{option:oUserIsAdmin}

{/option:oUserIsAdmin}
{option:!oUserIsAdmin}
    <p class="hidden"></p>
{/option:!oUserIsAdmin}
<div id="presentations">
        <div id="scroll">
            {iteration:iPresentations}
                <div class="presentation" onclick="window.open('presentation.php?p={$iPresentations.id}');" style="cursor:pointer;">
                        <p class="title">{$iPresentations.name}</p>
                </div>
            {/iteration:iPresentations}
        </div>
</div>

<div id="general">
        <h4>General Information</h4>
        {option:oUserIsAdmin}
            <p class="edit"><a href="#" onclick="toggle_visibility('editGeneral');">Edit</a></p>
        {/option:oUserIsAdmin}
        {option:!oUserIsAdmin}
            <p class="hidden"></p>
        {/option:!oUserIsAdmin}
        <p><span>Name</span>{$fullName}</p>
        <p><span>Email</span>{$email}</p>
        <p><span>Member since</span>{$memberSince}</p>
        <form action="#" method="post" id="editGeneral">
            <p><span>Name</span><input type="text" name="txtName" value={$user.name} /></p>
            <p><span>Firstname</span><input type="text" name="txtFirstName" value="{$user.firstname}" /></p>
            <p><span>Email</span><input type="text" name="txtEmail" value="{$user.email}" /></p>
            <input type="submit" value="Edit" />
        </form>
</div>

<div id="picture">
        <h4>Picture</h4>
        {option:oUserIsAdmin}
            <p class="edit"><a href="#" onclick="toggle_visibility('editPicture');">Edit</a></p>
        {/option:oUserIsAdmin}
        {option:!oUserIsAdmin}
            <p class="hidden"></p>
        {/option:!oUserIsAdmin}
        <form action="#" method="post" id="editPicture">
            {$frmEditProfilePic}
        </form>

        <div id="imgBox">
                <img src="{$imgSrc}"  alt="img"/>
        </div>
</div>

<div id="groups">
        <h4>Groups</h4>
        {option:oUserIsAdmin}
            <p class="edit"><a href="editGroups.php">Edit</a></p>
        {/option:oUserIsAdmin}
        {option:!oUserIsAdmin}
            <p class="hidden"></p>
        {/option:!oUserIsAdmin}
        {iteration:iGroups}
        <p class="group"><a href="groupPageNormalUser.php?id={$iGroups.id}">{$iGroups.name}</a></p>
        {/iteration:iGroups}
</div>