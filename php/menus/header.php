<nav class="navbar navbar-expand-md bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <i class="fa d-inline fa-lg fa-cloud"></i>
      <b>&nbsp;Dein Minecraftserver</b>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?p=index">
            <i class="fa d-inline fa-lg fa-envelope-o"></i>&nbsp;Apply</a>
        </li>
      </ul>
      <?php if(isset($_SESSION['loggeduser'])) { ?>
        <a class="btn navbar-btn ml-2 btn-light text-primary" href="?p=apply/addons/logout">
          <image src="https://minotar.net/helm/<?php echo ($_SESSION['loggeduser']); ?>" height="25" /> <?php echo ($_SESSION['loggeduser']); ?>
        </a>
      <?php }else { ?>
        <a class="btn navbar-btn ml-2 btn-light text-primary" href="?p=apply/addons/login">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Anmelden</a>
      <?php } ?>
    </div>
  </div>
  </div>
</nav>
