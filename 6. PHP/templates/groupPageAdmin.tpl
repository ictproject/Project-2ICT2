<h3>{$Group.name}</h3>
<p class="edit"><a href="#" onclick="toggle_visibility('editTitle');">Edit</a></p>
<form action="#" method="post" id="editTitle">
    <input type="text" name="txtTitle" value="{$Group.name}" />
    <input type="submit" value="Edit" />
</form>
<a href="groupPageAdmin.php?id={$Group.id}&DeleteGroupId={$Group.id}" id="btnDeleteGroup">Delete</a>
<p id="admin">admin: <a href="profile.php?id={$admin.id}">{$admin.username}</a></p>

<h4>Presentations</h4>

<p id="normalView"><a href="groupPageNormalUser.php?id={$Group.id}">back to normal view</a></p>


<div id="presentations">
        <div id="scroll">
            {iteration:iPresentations}
                <div class="presentation">
                        <p class="title">{$iPresentations.name}</p>
                        <p class="buttons">
                                <a href="#" class="delete">delete</a>
                                <a href="#" class="settings">settings</a>
                                <a href="#" class="edit">edit</a>
                        </p>
                </div>
            {/iteration:iPresentations}    
        </div>
</div>

<div id="Description">
        <h4>Description</h4>

        <p class="edit"><a href="#" onclick="toggle_visibility('editDescription');">Edit</a></p>
        <form action="#" method="post" id="editDescription">
            <textarea name="txtDescription" rows="10" cols="50">
                {$Group.description}
            </textarea>
            <input type="submit" value="Edit">
        </form>
        <p id="descriptionText">
                {$Group.description}
        </p>
</div>

<div id="Members">
        <h4>Members ({$NumberOfMembers})</h4>
        <a id="search" href="#" onclick="toggle_visibility('searchUsers'); toggle_visibility('images');">Invite</a>

        <form action="#" method="post" id="searchUsers">
            <input type=search results=5 name=search placeholder="Search ..." />
            <input type="submit" name="search" value="Search" >
            <div id="AllUsers">
                <div id="scroll">
                    {iteration:iAllUsers}
                        <p class="group"><input type="checkbox" name='users[]' value="{$iAllUsers.id}" /><a href="profile.php?id={$iAllUsers.id}">{$iAllUsers.username}</a></p>
                    {/iteration:iAllUsers}
                </div>
            </div>
            <input type="submit" name="Add" value="Add" >
        </form>

        <div id="images" class="clearfix">
            {iteration:iMembers}
                <div id="imgBox">
                        <a href="profile.php?id={$iMembers.id}" ><img src="./files/users/{$iMembers.username}/{$iMembers.profile_picture}" width="95" height="148" alt="img" /></a>
                        <a class="delete" href="groupPageAdmin.php?id={$Group.id}&UserId={$iMembers.id}" ></a>
                        <p>{$iMembers.username}</p>
                </div>
                
            {/iteration:iMembers}
        </div>
</div>
	  	