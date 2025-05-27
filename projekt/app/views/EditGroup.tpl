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
					<div class="subscribe-title text-center">
						<h2>
							Members
						</h2>
					</div>

					<div class="subscribe-title text-center"></div>
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

                
<div class="explore-content">

            <div class="row">

            {foreach $records as $r}
            {strip}
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="{$conf->action_url}editCategory/{$r['id']}">    {$r["name"]}    </a></h2>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>     {$r["color"]}   </p>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="explore-map-icon">
                                            <a href="{$conf->action_url}editCategory/{$r['id']}"><i data-feather="edit-2"></i></a>
                                            <a href="{$conf->action_url}deleteCategory/{$r['id']}"><i data-feather="trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/strip}
            {/foreach}

                <div class="row">
                <div class=" col-md-4 col-sm-6">
                <form action="{$conf->action_url}addCategory">
                    <button class="welcome-hero-btn" type="submit">
                        + new category
                    </button>
                </form>
                </div>
                </div>

            </div>
</div>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
