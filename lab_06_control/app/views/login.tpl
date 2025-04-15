{extends file="main.tpl"}

{block name=footer}All Rights Reserved by Maciej Bilnicki{/block}

{block name=content}
{/block}

{block name=slider}

<div class="row">
  <div class="col-lg-7 col-md-8 mx-auto">
    <div class="detail-box">
      <h1>
        Logowanie
      </h1>
        {if !($messages->isEmpty())}

        {foreach $messages->getErrors() as $msg}
            {strip}
            <p>{$msg}</p>
            {/strip}
        {/foreach}
        {/if}
      <p>
        zaloguj się, aby użyć konwertera
      </p>
    </div>
  </div>
</div>
<div class="find_container ">
  <div class="container">
    <form action="{$config->action_url}/login" method="post">
      <div class="row">
      <div class="col">
        <div class="form-row ">
          <div class="form-group col-lg-3">
            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
          </div>
          <div class="form-group col-lg-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col">
        <div class="form-row ">
          <div class="form-group col-lg-3">
          <div class="btn-box">
            <button type="submit" value="zaloguj" class="btn ">Zaloguj</button>
          </div>
          </div>
        </div>
      </div>
      </div>
    </form>
  </div>
</div>
{/block}