<?php 
include '../Controller/messageC.php';
include '../Controller/phpfunctions.php';
$msgC= new messageC();
$list =  $msgC->listmessages();
foreach ($list as $l ) { 
    if ($l['sent_by']==='c')
    {
        $side='left';
        $name="Client";
    }
    else if ($l['sent_by']==='a')
    {
        $side='right';
        $name="Artiste";
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
