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
    {block name=return_action}<li><a href="{$conf->action_url}exitGroupSpace">return</a></li>{/block}
{/if}

{block name=main_body}

        <div class="welcome-hero-serch-box">
            <form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->action_root}notesListPart','list'); return false;">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form">
                        <h3>title</h3>
                        <input type="text" name="title" value="{$searchForm->title}"/>
                    </div>
                    <div class="single-welcome-hero-form">
                        <h3>category</h3>
                    </div>
                        <select name="category" id="category"
								style = "position: relative;
                                        display: flex;
                                        align-items: center;
                                        border: 0px blue;
                                        padding-right: 30px;
                                        padding-left: 30px;">
											
                                    <option value="-1">all categories</option>
								{foreach $categories as $r}
								{strip}
									<option value="{$r["id"]}" {if ($r["id"] == $searchForm->category)}selected{/if}>{$r["name"]}</option>
								{/strip}
								{/foreach}
							</select>
                    <div class="welcome-hero-serch">
                        <button class="welcome-hero-btn" type="submit">
                                search  <i data-feather="search"></i> 
                        </button>
                    </div>
                </div>
            </form>
        </div>


<div class="explore-content" id="list">

{include file="NotesListPart.tpl"}

</div>

<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
                        {if $page > 0}
							<a href="{$conf->action_url}notesList?page={$page-1}&title={$searchForm->title}&category={$searchForm->category}"><div class="single-list-topics-content">
                                <div class="explore-map-icon">
                                    <i data-feather="arrow-left"></i>
                                </div>
							</div></a>    
                        {/if}
						</li>
						<li>
                        {if $page < $lastPage - 1}
							<a href="{$conf->action_url}notesList?page={$page+1}&title={$searchForm->title}&category={$searchForm->category}"><div class="single-list-topics-content">
                                <div class="explore-map-icon">
                                    <i data-feather="arrow-right"></i>
                                </div>
							</div></a>
                        {/if}         
						</li>
					</ul>
				</div>
			</div><!--/.container-->
</section>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}