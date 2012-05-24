<h3>Edit groups</h3>

<div id="groups">
        <h4>My groups</h4>
        <span>hidden</span>
        {iteration:iGroups}
        <p class="group"><a href="groupPageNormalUser.php?id={$iGroups.id}">{$iGroups.name}</a><a href="editGroups.php?userId={$user.id}&groupId={$iGroups.id}" class="DeleteGroup"><img src="core/img/delete.png" alt="delete" /></a></p>
        {/iteration:iGroups}
</div>
<div id="groups">
        <div id="createGroup">
                <h4 >Created groups</h4>
                <p class="create"><a href="createGroup.php">Create</a></p>
        </div>
        <span>hidden</span>
        {iteration:iCreatedGroups}
            <p class="group"><a href="groupPageAdmin.php?id={$iCreatedGroups.id}">{$iCreatedGroups.name}</a><!--<a href="groupPage.php?group={$iCreatedGroups.id}" class="EditGroup"><img src="core/img/edit.png" alt="edit" />--></a></p>
        {/iteration:iCreatedGroups}

</div>
<div id="groups">
        <h4>Join a group</h4>
        
        <form method="post">
            <input type=search results=5 name=search placeholder="Search ..." />
            <input type="submit" name="action" value="None" style="display: none">
        </form>
        <span>hidden</span>
        <div id="joinGroup">
            <div id="scroll">
                {iteration:iAllGroups}
                    <p class="group"><a href="groupPageNormalUser.php?id={$iAllGroups.id}">{$iAllGroups.name}</a></p>
                {/iteration:iAllGroups}
            </div>
       </div>
</div>
