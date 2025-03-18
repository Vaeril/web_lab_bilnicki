 
  <!-- results section -->

  <section class="about_section layout_padding">
    <div class="container" id="wyniki">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">


                <?php if(isset($messages) && count($messages) > 0) { ?>

                  <div class="heading_container">
                        <h2>
                          Coś poszło nie tak
                        </h2>
                      </div>
                      <ul>
                <?php 
                foreach($messages as $msg){
                print("<li>".$msg."</li>");
                }
                ?>
                </ul>

                      <a href="#gora_strony">
                        Wróć
                      </a>
                <?php } else {
                if(isset($results) && !empty($results)){ ?>

                <div class="heading_container">
                        <h2>
                          Wyniki
                        </h2>
                      </div>
                      <p>
                        Liczba binarna: <?php out($results[0]);?>
                      </p>
                      <p>
                        Liczba dziesiętna: <?php out($results[1]);?>
                      </p>
                      <p>
                        Liczba szestnastkowa: <?php out($results[2]);?>
                      </p>

                      <a href="#gora_strony">
                        Wróć
                      </a>
                <?php } } ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src=<?php print(_APP_URL."/images/about-img.jpg");?> alt="">
          </div>
        </div>
      </div>
    </div>
  </section>