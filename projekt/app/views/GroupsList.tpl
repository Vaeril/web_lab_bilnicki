{extends file="main.tpl"}

{block name=return_action}<li><a href="{$conf->action_url}notesList">return</a></li>{/block}

{block name=main_body}

        <div class="welcome-hero-serch-box">
            <form action="{$conf->action_url}groupsList">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form">
                        <h3>name</h3>
                        <input type="text" name="name" value="{$searchName}"/>
                    </div>
                    <div class="single-welcome-hero-form">
                        <h3>member</h3>
                        <input type="text" name="member" value="{$searchMember}"/>
                    </div>
                    <div class="welcome-hero-serch">
                        <button class="welcome-hero-btn" type="submit">
                                search  <i data-feather="search"></i> 
                        </button>
                    </div>
                </div>
            </form>
        </div>


<div class="explore-content">

            <div class="row">

            {foreach $records as $r}
            {strip}
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="{$conf->action_url}enterGroupSpace/{$r['id']}">    {$r["name"]}    </a></h2>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>     owner: {$r["mail"]}   </p>
                                    </div>
                                    <div class="col-sm-7">
                                    
                                    {if ({$r['owner']} == \core\SessionUtils::load("id", true))}
                                        <div class="explore-map-icon">
                                            <a href="{$conf->action_url}editGroup/{$r['id']}"><i data-feather="edit-2"></i></a>
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


            {if \core\RoleUtils::inRole("lead")}
                <div class="row">
                <div class=" col-md-4 col-sm-6">
                    <form action="{$conf->action_url}addGroup">
                    <button class="welcome-hero-btn">
                        + new group
                    </button>
                    </form>
                </div>
                </div>
            {/if}

            </div>
</div>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
