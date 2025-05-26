{extends file="main.tpl"}

{block name=return_action}categoriesList{/block}

{block name=main_body}
				<form action="{$conf->action_url}saveCategory" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="name" placeholder="Category name"  value="{$categoryForm->name}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
							<select name="color" id="color"
								style = "display: inline-block;
											width: 630px;
                                            padding: 15px;
											padding-left:30px;
											font-size: 16px;
											color: #2d2f31;
											-webkit-border-radius:3px;
											-moz-border-radius:3px;
											border-radius:3px;
											border:1px solid #fff;
											box-shadow: 0 0px 10px rgba(21,19,19,.1);
											-webkit-transition:0.3s linear;
											-moz-transition:0.3s linear;
											-o-transition:0.3s linear;
											transition:0.3s linear;">
								<option value="red" {if $categoryForm->color == "red"}selected{/if}>Red</option>
								<option value="green" {if $categoryForm->color == "green"}selected{/if}>Green</option>
								<option value="white" {if $categoryForm->color == "white"}selected{/if}>White</option>
								<option value="blue" {if $categoryForm->color == "blue"}selected{/if}>Blue</option>
								<option value="purple" {if $categoryForm->color == "purple"}selected{/if}>Purple</option>
								<option value="grey" {if $categoryForm->color == "grey"}selected{/if}>Grey</option>
								<option value="orange" {if $categoryForm->color == "orange"}selected{/if}>Orange</option>
							</select>
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									Save
								</button>
							</div>
						</div>	
					</div>
				</form>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
