{extends file="main.tpl"}

{block name=main_body}

        <div class="welcome-hero-serch-box">
            <div class="welcome-hero-form">
                <div class="single-welcome-hero-form">
                    <h3>title</h3>
                    <form action="index.html">
                        <input type="text"/>
                    </form>
                </div>
                <div class="single-welcome-hero-form">
                    <h3>category</h3>
                    <form action="index.html">
                        <input type="text"/>
                    </form>
                </div>
            </div>
            <div class="welcome-hero-serch">
                <button class="welcome-hero-btn" onclick="window.location.href='#'">
                        search  <i data-feather="search"></i> 
                </button>
            </div>
        </div>


<div class="explore-content">

            <div class="row">
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="#">Tytuł notatki</a></h2>
                            <p class="explore-rating-price">
                                utworzono 5 maja
                                <span class="explore-price-box">
                                    edytowano 10 maja
                                </span>
                            </p>
                            <div class="explore-person">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p> category</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="explore-map-icon">
                                            <a href="#"><i data-feather="edit-2"></i></a>
                                            <a href="#"><i data-feather="trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="#">Tytuł notatki</a></h2>
                            <p class="explore-rating-price">
                                utworzono 5 maja
                                <span class="explore-price-box">
                                    edytowano 10 maja
                                </span>
                            </p>
                            <div class="explore-person">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p> category</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="explore-map-icon">
                                            <a href="#"><i data-feather="edit-2"></i></a>
                                            <a href="#"><i data-feather="trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="#">Tytuł notatki</a></h2>
                            <p class="explore-rating-price">
                                utworzono 5 maja
                                <span class="explore-price-box">
                                    edytowano 10 maja
                                </span>
                            </p>
                            <div class="explore-person">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua.... 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore-open-close-part">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p> category</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="explore-map-icon">
                                            <a href="#"><i data-feather="edit-2"></i></a>
                                            <a href="#"><i data-feather="trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=" col-md-4 col-sm-6">
                    <button class="welcome-hero-btn"><a href="{$conf->action_url}addNote">
                        + new note
                    </button>
                </div>

            </div>
</div>

{/block}

{block name="messages"}
	{include file="messages.tpl"}
{/block}
