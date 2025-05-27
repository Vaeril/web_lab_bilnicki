{extends file="main.tpl"}

{block name=return_action}<li><a href="{$conf->action_url}groupsList">return</a></li>{/block}

{block name=main_body}
				<form action="{$conf->action_url}addGroup" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="name" placeholder="Group name">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									Create
								</button>
							</div>
						</div>	
					</div>
				</form>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
