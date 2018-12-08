<!DOCTYPE html>
<?php
  require_once("config.php");
  if($conn->connect_error) {
    die("MySQl connection failed: " . $conn->connect_error);
  }

  /* Login */
  if(isset($_POST['username'], $_POST['password'])) {
    $sql = "SELECT * FROM LoginDatas";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if($row["SpielerNAME"] == $_POST['username']) {
          if($row["Passwort"] == $_POST['password']) {
            $_SESSION['loggeduser'] = $_POST['username'];
            break;
          }
        }
      }
      if(!isset($_SESSION['loggeduser'])) {
        header("Location: /?p=apply/addons/login&error=true");
      }
    }
  }

  if(isset($_GET['p'])) {
    $p = htmlspecialchars($_GET['p']);
  }else {
    $p = "index";
  }
?>
<html>

<head>
  <title><?php echo($title); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="styles/theme.css">
</head>

<body>
  <?php include("menus/header.php");
  if(isset($_GET['apply'])) {
    if($_GET['apply'] == "true") {
      echo "<div class='alert alert-success' role='alert' style='border-radius: 0px !important; margin-bottom: 0px !important;'><div class='container'><strong>Erfolg!</strong> Du hast deine Bewerbung erfolgreich gesendet.</div></div>";
    }else {
      echo "<div class='alert alert-danger' role='alert' style='border-radius: 0px !important; margin-bottom: 0px !important;'><div class='container'><strong>Fehler!</strong> Deine Bewerbung wurde nicht gesendet.</div></div>";
    }
  }
  ?>

  <?php
    if(file_exists("menus/" . $p . ".php")) {
      include("menus/". $p . ".php");
    }else {
      include("menus/error.php");
    }
  ?>
  <?php include("menus/footer.php"); ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
