			<h3>My Presentations</h3>

			<p id="add"><a href="createPresentation.php">Add Presentation</a></p>

			<div id="presentations" class="clearfix">
			{option:oPresentations}
                            {iteration:iPresentations}
				<div class="presentation" onclick="location.href='presentation.php?p={$iPresentations.id}';" style="cursor:pointer;">
					<h4>{$iPresentations.name}</h4>
					<p class="buttons">
						<a href="slideEditor.php?Pid={$iPresentations.id}" class="settings">settings</a>
						<a href="slideEditor.php?Pid={$iPresentations.id}" class="edit">edit</a>
					</p>
				</div>
                            {/iteration:iPresentations}
             {/option:oPresentations}
             {option:!oPresentations}
             <p>U have no presentations</p>
             {/option:!oPresentations}
			</div>