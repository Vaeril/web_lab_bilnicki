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
                                    <a href="" onclick="ajaxPostForm('search-form','{$conf->action_url}deleteNote/{$r['id']}','list'); return false;"><i data-feather="trash"></i></a>
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