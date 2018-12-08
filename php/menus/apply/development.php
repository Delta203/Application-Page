<div class="py-5 bg-light" >
  <div class="container">
    <div class="row bg-secondary p-1">
      <div class="col-md-1">
        <i class="d-block  fa fa-3x fa-user"></i>
      </div>
      <div class="col-md-6">
        <h1 class="">Bewerben-
          <b>Development</b>
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 p-2 border border-secondary">
        <form class="" method="post" action="/?p=apply/addons/insert&art=Developer">
          <div class="form-group">
            <?php
              if(isset($_SESSION['loggeduser'])) { ?>
                <input type="text" class="form-control" placeholder="Minecraftname" maxlength="100" value="<?php echo ($_SESSION['loggeduser']); ?>" disabled required></div>
              <?php }else { ?>
                <input type="text" class="form-control" placeholder="Minecraftname" maxlength="100" required></div>
              <?php } ?>
          <div class="form-group">
            <input type="email" name="mail" class="form-control" placeholder="Email" maxlength="100" required> </div>
          <div class="form-group">
            <label>
              <b>
                <b>Geburtsdatum</b>
              </b>
            </label>
            <input type="date" name="birth" class="form-control" placeholder="TT.MM.JJJJ" maxlength="100" required> </div>
          <div class="form-group">
            <label>
              <b>
                <b>Benutzt du Skype oder Discord? Falls ja, wie lautet dein Nutzername oder deine ID?</b>
              </b>
            </label>
            <input type="text" name="skypeanddiscord" class="form-control" placeholder="Skypename" maxlength="100" required> </div>
          <div class="form-group">
            <label>
              <b>
                <b>Deine verfügbare Zeit in Stunden pro Woche</b>
              </b>
            </label>
            <input type="text" name="onlinetime" class="form-control" placeholder="Onlinezeiten" maxlength="100" required> </div>
          <div class="form-group">
            <label>
              <b>
                <b>Stelle dich kurz vor</b>
              </b>
            </label>
            <textarea type="text" name="about" class="form-control" rows="10" maxlength="10000" required></textarea>
          </div>
          <div class="form-group">
            <label>
              <b>
                <b>Was sind deine Stärken und Schwächen?</b>
              </b>
            </label>
            <textarea type="text" name="sands" class="form-control" rows="10" maxlength="10000" required></textarea>
          </div>
          <div class="form-group">
            <label>
              <b>
                <b>Welche Erfahrungen oder Referenzen hast du im Bereich des Developments?</b>
              </b>
            </label>
            <textarea type="text" name="qualifications" class="form-control" rows="10" maxlength="10000" required></textarea>
          </div>
          <div class="form-group">
            <label>
              <b>
                <b>Warum möchtest du hier als Teammitglied im Bereich des Developments aktiv werden?</b>
              </b>
            </label>
            <textarea type="text" name="whytous" class="form-control" rows="5" maxlength="10000" required></textarea>
          </div>
          <div class="form-group">
            <label>
              <b>
                <b>Warum sollten wir dich als Teammitglied nehmen?</b>
              </b>
            </label>
            <textarea type="text" name="whyyou" class="form-control" rows="5" maxlength="10000" required></textarea>
          </div>
          <div class="form-group">
            <label>
              <b>
                <b>Zusätzliche Hinweise</b>
              </b>
            </label>
            <textarea type="text" name="others" class="form-control" rows="5" maxlength="10000"></textarea>
            <div class="form-group">
              <label>
                <b></b>
              </label>
            </div>
          </div>
          <center>
            <label>
              <b>
                <b>Mit dem Abschicken der Bewerbung habe ich zur Kenntnis genommen, dass ich bei Ablehnung der Bewerbung keine Rückmeldung erhalten werde und ich den Status meiner Bewerbung nicht nachfragen werde.</b>
              </b>
            </label>
            <br>
            <?php
              if(isset($_SESSION['loggeduser'])) {
                $beworben = "0";

                $sql = "SELECT Beworben FROM LoginDatas WHERE SpielerNAME = '".$_SESSION['loggeduser']."'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $beworben = $row['Beworben'];
                  }
                }
                if($beworben == "1") { ?>
                  <a class="btn btn-primary btn-lg" href="/?p=index" >
                    <b>
                      <b>Du hast bereits deine Bewerbung geschrieben.</b>
                    </b>
                  </a>
                <?php }else { ?>
                  <input type="submit" class="btn btn-primary btn-lg" value="Bewerbung abschicken">
                <?php }?>
              <?php }else {?>
                <a class="btn btn-primary btn-lg" href="/?p=apply/addons/login" >
                  <b>
                    <b>Du musst angemeldet sein, damit du eine Bewerbung schreiben kannst.</b>
                  </b>
                </a>
              <?php } ?>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>
