{extends file="main.tpl"}

{block name=return_action}<li><a href="{$conf->action_url}editGroup/"{$form->id}>return</a></li>{/block}

{block name=main_body}

        <div class="welcome-hero-serch-box">
            <form action="{$conf->action_url}chooseMember">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form" style="width:500px;">
                        <h3>mail</h3>
                        <input type="text" name="mail" value="{$searchMail}"/>
                    </div>
                    <div class="welcome-hero-serch">
                        <button class="welcome-hero-btn" type="submit">
                                search  <i data-feather="search"></i> 
                        </button>
                    </div>
                </div>
                <input type="hidden" name="id" value="{$form->id}">
            </form>
        </div>


<div class="explore-content">

        <div class="row">

            {foreach $records as $r}
            {strip}
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="{$conf->action_url}addMember/{$form->id}/{$r['id']}">    {$r["mail"]}    </a></h2>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>     {$r['role']} </p>
                                    </div>
                                    <div class="col-sm-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/strip}
            {/foreach}

        </div>
</div>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
