<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container ">
        <div class="row">
          <div class="col-lg-7 col-md-8 mx-auto">
            <div class="detail-box">
              <h1>
                Konwerter
              </h1>
              <p>
                użyj tego konwertera, aby znaleźć odpowiedniki liczb w systemie binarnym, dziesiętnym i szestnastkowym
              </p>
            </div>
          </div>
        </div>
        <div class="find_container ">
          <div class="container">
            <form action="<?php print(_APP_URL);?>/app/converter.php#wyniki" method="post">
              <div class="row">
              <div class="col">
                <div class="form-row ">
                  <div class="form-group col-lg-3">
                  <input type="text" class="form-control" id="input" name="input" placeholder="Liczba">
                  </div>
                  <div class="form-group col-lg-3">
                  <select name="input_type" class="form-control wide" id="input_type">
                    <option value="2">System binarny </option>
                    <option value="10">System dziesiętny</option>
                    <option value="16">System szestnastkowy</option>
                  </select>
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col">
                <div class="form-row ">
                  <div class="form-group col-lg-3">
                  <div class="btn-box">
                    <button type="submit" class="btn ">Licz</button>
                  </div>
                  </div>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <?php 
include _ROOT_PATH.'/templates/results.php';
?>

  <?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/footer.php';
?>