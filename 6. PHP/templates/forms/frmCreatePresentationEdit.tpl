{form:frmCreatePresentationEdit}
				<dl>
					<dt>
						{$btnSubmit}
					</dt>
                                   
					<dt><label for="name">Name:</label></dt>
					<dd>
						{$txtName}{$txtNameError}
					</dd>
	
					<dt id="options">Sharing Options</dt>
					<dt id="checkPublic">{$chkPublic}<label for="public">Public Presentation</label>{$chkPublicError}</dt>
                                        
                                        {$ddmGroups} {$ddmGroupsError}
				</dl>
{/form:frmCreatePresentationEdit}