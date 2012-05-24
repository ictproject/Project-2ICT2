<h3>Profile</h3>

			<h4>Presentations</h4>

			<p class="edit"><a href="#">Edit</a></p>

			<div id="presentations">
				<div id="scroll">
                                    {iteration:iPresentations}
					<div class="presentation">
						<p class="title">{$iPresentations.name}</p>
					</div>
                                    {/iteration:iPresentations}
				</div>
			</div>

			<div id="general">
				<h4>General Information</h4>

				<p class="edit"><a href="#">Edit</a></p>

				<p><span>Name</span>{$fullName}</p>
				<p><span>Email</span>{$email}</p>
				<p><span>Member since</span>{$memberSince}</p>
			</div>

			<div id="picture">
				<h4>Picture</h4>

				<p class="edit"><a href="#">Edit</a></p>

				<div id="imgBox">
					<img src="{$imgSrc}"  alt="img"/>
				</div>
			</div>

			<div id="groups">
				<h4>Groups</h4>

				<p class="edit"><a href="groupsEdit.html">Edit</a></p>
                                {iteration:iGroups}
				<p class="group">{$iGroups.name}</p>
                                {/iteration:iGroups}
			</div>