<?php
  if(isset($_POST['mail'],$_GET['art'],$_POST['birth'],$_POST['skypeanddiscord'],$_POST['onlinetime'],$_POST['about'],$_POST['sands'],$_POST['qualifications'],$_POST['whytous'],$_POST['whyyou'])) {

    /*$name = $_SESSION['loggeduser'];
    $art = $_GET['art'];
    $mail = $_POST['mail'];
    $birth = $_POST['birth'];
    $skypeanddiscord = $_POST['skypeanddiscord'];
    $onlinetime = $_POST['onlinetime'];
    $about = $_POST['about'];
    $sands = $_POST['sands'];
    $qualifications = $_POST['qualifications'];
    $whytous = $_POST['whytous'];
    $whyyou = $_POST['whyyou'];
    $others = " ";
    if(isset($_POST['others'])) {
      $others = $_POST['others'];
    }

    $sql1 = "INSERT INTO ApplyDatas (Spieler,Art,Email,Geburtstag,SkypeoderDiscord,Onlinezeit,Vorstellung,StaerkenundSchwaechen,ErfahrungenundReferenzen,Warumhier,Warumdich,Weiteres) VALUES ('$name','$art','$mail','$birth','$skypeanddiscord','$onlinetime','$about','$sands','$qualifications','$whytous','$whyyou','$others')";
    $conn->query($sql1);*/

    $to = "dieEmail@gmail.com";
    $subject = "Bewerbung " . $_GET['art'];
    $message = "
    <html>
      <head>
        <title>Bewerbung " . $_GET['art'] . "</title>
      </head>
      <body>
        <h2>Bewerbung" . $_GET['art'] . "</h2><br/>
        <b>Name: </b>" . $_SESSION['loggeduser'] . "<br/>
        <b>Email: </b>" . $_POST['mail'] . "<br/>
        <b>Geburtstag: </b>" . $_POST['birth'] . "<br/>
        <b>Skype & Discord: </b>" . $_POST['skypeanddiscord'] . "<br/>
        <b>Onlinezeit: </b>" . $_POST['onlinetime'] . "<br/>
        <b>Über dich: </b>" . $_POST['about'] . "<br/>
        <b>Stärken & Schwächen: </b>" . $_POST['sands'] . "<br/>
        <b>Referenzen: </b>" . $_POST['qualifications'] . "<br/>
        <b>Warum zu uns: </b>" . $_POST['whytous'] . "<br/>
        <b>Warum du: </b>" . $_POST['whyyou'] . "<br/>
        <b>Weiteres: </b>" . $_POST['others'] . "<br/>
      </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <' . $_POST['mail'] . '>' . "\r\n";

    mail($to,$subject,$message,$headers);

    $sql = "UPDATE LoginDatas SET Beworben = '1' WHERE SpielerNAME = '" . $_SESSION['loggeduser'] . "'";
    $conn->query($sql);

    header("Location: /?p=index&apply=true");
  }else {
  header("Location: /?p=index&apply=false");
  }
?>
