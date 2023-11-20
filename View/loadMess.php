<?php 
include '../Controller/messageC.php';
include '../Controller/phpfunctions.php';
session_start();
$msgC= new messageC();
$list =  $msgC->listmessages();

//user_list
$sql = "SELECT * FROM users";
        $db = config::getConnexion();
        try {
            $listu = $db->query($sql);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
//finuserlist
foreach ($list as $l ) {
    if ($_SESSION['id']===$l['idu'])
    {
        $side='right';
        $name=$_SESSION['name'];
    }
    else
    {
        $side='left';
        foreach ($listu as $u ){
            if ($l['idu']===$u['idu']){ //lezmha reglage
                $name=$u['name'];
            }
        }
    }
$date=$l['sent'];
$date=formaterDate($date);
$img="assets/img/bg-masthead.jpg"
  ?>
    <script>src="Messagerie.js"</script>
    <div class="<?="msg $side-msg";?>">
    <div class="msg-img" style="background-image: url(<?=$img?>)"></div>
          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name"><?=$name?></div>
              <div class="msg-info-time"><?=$date?></div>
            </div>
    
            <div class="msg-text"><?=$l['mess'] ?></div>
          </div>
        </div>
        <?php  } ?>
