{extends file="main.tpl"}

{block name=return_action}<li><a href="{$conf->action_url}editGroup/"{$form->id}>return</a></li>{/block}

{block name=main_body}

        <div class="welcome-hero-serch-box">
            <form action="{$conf->action_url}notesList">
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


<div class="explore-content">

            <div class="row">

                {foreach $records as $r}
                {strip}
                    <div class=" col-md-4 col-sm-6">
                        <div class="single-explore-item">
                            <div class="single-explore-txt bg-theme-1">
                                <h2><a href="{$conf->action_url}editNote/{$r['id']}">{$r["title"]}</a></h2>
                                <p class="explore-rating-price">
                                    utworzono {$r["creationDate"]}
                                    <span class="explore-price-box">
                                        edytowano {$r["lastModified"]}
                                    </span>
                                </p>
                                <div class="explore-person">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p>
                                                {$r["content"]} 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="explore-open-close-part">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p> {$r["category"]}</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="explore-map-icon">
                                                <a href="{$conf->action_url}editNote/{$r['id']}"><i data-feather="edit-2"></i></a>
                                                <a href="{$conf->action_url}deleteNote/{$r['id']}"><i data-feather="trash"></i></a>
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
                    <form action="{$conf->action_url}addNote">
                    <button class="welcome-hero-btn">
                        + new note
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
