{extends file="main.tpl"}

{block name=main_body}
				<form action="{$conf->action_url}register" method="POST">
					<div class="subscribe-title text-center">
						<h2>
							REGISTER
						</h2>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="email" placeholder="Email" value="{$registerForm->email}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" name="password" placeholder="Password" value="{$registerForm->password}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" name="password_2" placeholder="Repeat password" value="{$registerForm->password_2}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="role" placeholder="Role" value="{$registerForm->role}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									create account
								</button>
							</div>
						</div>	
					</div>
				</form>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
