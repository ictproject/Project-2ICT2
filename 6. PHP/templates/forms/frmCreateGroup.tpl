{form:frmCreateGroup}
				<dl>
					<dt>
						{$btnSubmit}
					</dt>
					<dt><label for="name">Name:</label></dt>
					<dd>
						{$txtName}{$txtNameError}
					</dd>
					<dt><label for="comment">Description:</label></dt>
					<dd>
						{$txtDescription}{$txtDescriptionError}
					</dd>
					<dt id="options">Sharing Options</dt>
					<dt id="checkPublic">{$chkPublic}<label for="public">Public Group</label>{$chkPublicError}</dt>
				</dl>
{/form:frmCreateGroup}