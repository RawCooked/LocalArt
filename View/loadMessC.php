<?php 
include '../Controller/messageC.php';
$msgC= new messageC();
$list =  $msgC->listmessages();
foreach ($list as $l ) { 
    if ($l['sent_by']==='a')
    {
        $side='left';
    }
    else if ($l['sent_by']==='c')
    {
        $side='right';
    }
  ?>
    <div class="<?php echo "msg $side-msg";?>">
          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">test</div>
              <div class="msg-info-time">test</div>
            </div>
    
            <div class="msg-text"><?php echo $l['mess'] ?></div>
          </div>
        </div>
        <?php  } ?>
