			<h3>My Presentations</h3>

			<p id="add"><a href="#">Add Presentation</a></p>

			<div id="presentations" class="clearfix">
			{option:oPresentations}
                            {iteration:iPresentations}
				<div class="presentation">
					<h4>{$iPresentations.name}</h4>
					<p class="buttons">
						<a href="#" class="settings">settings</a>
						<a href="#" class="edit">edit</a>
					</p>
				</div>
                            {/iteration:iPresentations}
             {/option:oPresentations}
             {option:!oPresentations}
             <p>U have no presentations</p>
             {/option:!oPresentations}
			</div>