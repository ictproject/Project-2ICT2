<h3>{$Group.name}</h3>
<!--if user no admin show the button join or leave-->
{option:!oUserIsAdmin}
    {option:!oJoin}<a href="groupPageNormalUser.php?id={$Group.id}&join={$Group.id}" id="btnJoin">Join</a>{/option:!oJoin} 
    {option:oJoin}<a href="groupPageNormalUser.php?id={$Group.id}&leave={$Group.id}" id="btnLeave">Leave</a>{/option:oJoin}
{/option:!oUserIsAdmin}
{option:oUserIsAdmin}<!-- user is admin no buttons -->{/option:oUserIsAdmin}
<br />
<br />
<br />

<p id="admin">admin: <a href="profile.php?id={$admin.id}">{$admin.username}</a></p>

<h4>Presentations</h4>

<div id="presentations">
        <div id="scroll">
            {iteration:iPresentations}
                <div class="presentation" onclick="location.href='presentation.php?p={$iPresentations.id}';" style="cursor:pointer;">
                        <p class="title">{$iPresentations.name}</p>
                </div>
            {/iteration:iPresentations}
        </div>
</div>

<div id="Description">
        <h4>Description</h4>

        <p id="descriptionText">
                {$Group.description}
        </p>
</div>

<div id="Members">
        <h4>Members ({$NumberOfMembers})</h4>

        <div id="images" class="clearfix">
            {iteration:iMembers}
                <div id="imgBox">
                        <a href="profile.php?id={$iMembers.id}" ><img src="./files/users/{$iMembers.username}/{$iMembers.profile_picture}" width="95" height="148" alt="img" /></a>
                        <p>{$iMembers.username}</p>
                </div>
            {/iteration:iMembers}
        </div>
</div>
</div>