{extends file="main.tpl"}

{if \core\SessionUtils::load("groupId", true)}
{block name=left_navbar}

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand">Group: <span>{\core\SessionUtils::load("groupName", true)}</span></a>

    </div>
{/block}
{/if}


{block name=return_action}<li><a href="{$conf->action_url}notesList">return</a></li>{/block}

{block name=main_body}

<div class="explore-content">

            <div class="row">

            {foreach $records as $r}
            {strip}
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                        
                        {if (!(\core\SessionUtils::load("groupId", true)) || \core\SessionUtils::load("groupOwner", true) == \core\SessionUtils::load("id", true))}
                            <h2><a href="{$conf->action_url}editCategory/{$r['id']}">    {$r["name"]}    </a></h2>
                        {else}
                            <h2>    {$r["name"]}    </h2>
                        {/if}
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>     {$r["color"]}   </p>
                                    </div>
                                    <div class="col-sm-7">
                                    {if (!(\core\SessionUtils::load("groupId", true)) || \core\SessionUtils::load("groupOwner", true) == \core\SessionUtils::load("id", true))}
                                        <div class="explore-map-icon">
                                            <a href="{$conf->action_url}editCategory/{$r['id']}"><i data-feather="edit-2"></i></a>
                                            <a href="{$conf->action_url}deleteCategory/{$r['id']}"><i data-feather="trash"></i></a>
                                        </div>
                                    {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/strip}
            {/foreach}

            {if {$recordsNumber < 20}}
            {if (!(\core\SessionUtils::load("groupId", true)) || \core\SessionUtils::load("groupOwner", true) == \core\SessionUtils::load("id", true))}
                <div class="row">
                <div class=" col-md-4 col-sm-6">
                <form action="{$conf->action_url}addCategory">
                    <button class="welcome-hero-btn" type="submit">
                        + new category
                    </button>
                </form>
                </div>
                </div>
            {/if}
            {/if}

            </div>
</div>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
