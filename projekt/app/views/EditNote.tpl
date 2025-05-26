{extends file="main.tpl"}

{block name=return_action}<li><a href="{$conf->action_url}notesList">return</a></li>{/block}

{block name=main_body}
				<form action="{$conf->action_url}saveNote" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="title" value="{$note->title}">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
							<select name="category" id="category"
								style = "display: inline-block;
											width: 630px;
											padding:30px;
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
											
								{foreach $categories as $r}
								{strip}
									<option value="{$r["id"]}" {if ($r["id"] == $note->category)}selected{/if}>{$r["name"]}</option>
								{/strip}
								{/foreach}
							</select>
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<textarea name="text" rows="20" cols="50"
								style = "display: inline-block;
											width: 630px;
											padding:30px;
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
											transition:0.3s linear;">{$note->content}</textarea>
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
                    <input type="hidden" name="id" value="{$noteId}">
				</form>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
