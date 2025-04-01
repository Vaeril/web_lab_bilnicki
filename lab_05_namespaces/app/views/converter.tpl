{extends file="main.tpl"}

{block name=footer}All Rights Reserved by Maciej Bilnicki{/block}

{block name=content}
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
                {if !($messages->isEmpty())}

                  <div class="heading_container">
                        <h2>
                          Coś poszło nie tak
                        </h2>
                      </div>
                      <ul>
                
                {foreach $messages->getErrors() as $msg}
                  {strip}
                    <li>{$msg}</li>
                    {/strip}
                {/foreach}
                </ul>
                  <a href="#gora_strony">
                    Wróć
                  </a>
                {/if}
                {if $messages->isEmpty() && !($result->isEmpty())}

                <div class="heading_container">
                        <h2>
                          Wyniki
                        </h2>
                      </div>
                      <p>
                        Liczba binarna: {$result->results[0]}
                      </p>
                      <p>
                        Liczba dziesiętna: {$result->results[1]}
                      </p>
                      <p>
                        Liczba szestnastkowa: {$result->results[2]}
                      </p>

                      <a href="#gora_strony">
                        Wróć
                      </a>
                {/if}

          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{$config->app_url}/images/about-img.jpg" alt="">
          </div>
        </div>
      </div>
{/block}

{block name=slider}

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
    <form action="{$config->app_url}/mainCtrl.php#wyniki" method="post">
      <div class="row">
      <div class="col">
        <div class="form-row ">
          <div class="form-group col-lg-3">
          <input type="text" class="form-control" id="input" name="input" placeholder="Liczba" value="{$form->input}">
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
{/block}