<div class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center display-3 text-primary">
          <b>Anmelden</b>
        </h1>
        <p class="">Bitte joine zuerst auf unseren Server. Danach solltest du eine Meldung bekommen, dass sich automatisch Passwort und ein Username generiert haben. Solltest du diese Meldung nicht haben, dann probiere den Befehl
          <b>/logindatas</b>. Somit bekommst du deine Anmeldedaten für das folgende Formular.</p>
      </div>
    </div>
  </div>
</div>
<div class="py-5" >
  <div class="container">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="col-md-6">
        <?php
          if(isset($_GET['error'])) {
            echo "<div class='alert alert-danger' role='alert'><strong>Fehler!</strong> Dein Benutzername oder Passwort ist falsch.</div>";
          }
        ?>
        <div class="card text-white p-5 bg-light">
          <div class="card-body">
            <h1 class="mb-4 text-primary">Anmelden</h1>
            <form method="post" action="/?p=index">
              <div class="form-group text-primary">
                <label>Benutzername</label>
                <input type="text" class="form-control" name="username" placeholder="Benutzername"> </div>
              <div class="form-group text-primary">
                <label>Passwort</label>
                <input type="password" class="form-control" name="password" placeholder="Passwort"> </div>
              <button type="submit" class="btn btn-secondary">Anmelden</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
