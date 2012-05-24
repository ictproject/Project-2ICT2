{form:frmLogin}
    <fieldset class="fs" id="fieldset1">
            <dl>
                    <dt><label for="username">Username</label></dt>
                    <dd class="required">
                            {$txtUsername}{$txtUsernameError}
                    </dd>
                    <dt><label for="password">Password</label></dt>
                    <dd class="required">
                            {$txtPassword}{$txtPasswordError}
                    </dd>
                    <dt>   
                        {$chkSaveUser} <label for="saveUser">Save user</label>               
                    </dt>
                    <dt>
                        {$btnSubmit}
                    </dt>
            </dl>
    </fieldset>
{/form:frmLogin}

