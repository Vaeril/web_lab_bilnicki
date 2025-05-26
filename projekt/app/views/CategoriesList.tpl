{extends file="main.tpl"}

{block name=return_action}notesList{/block}

{block name=main_body}

<div class="explore-content">

            <div class="row">

            {foreach $records as $r}
            {strip}
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="#">    {$r["name"]}    </a></h2>
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
