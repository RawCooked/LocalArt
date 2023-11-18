<?php
include '../Controller/messageC.php';
$msgC= new messageC(); 
$list =  $msgC->listmessages();
if (isset($_POST["send"]))
{
if (
  isset($_POST["message"]) && !empty($_POST["message"])
) {
  $messContent=$_POST["message"];
  $messC = new message(NULL, 455, 105 , $messContent , date("h:i"),"s","a");
  $msgC->addmessage($messC);
}else{
  echo "missing";
}     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Messagerie/Client</title>
        <link rel="stylesheet" href="MessClient.css">
        <script>src="MessClient.js"</script>
    </head>
    <body>
        <section class="msger">
            <header class="msger-header">
              <div class="msger-header-title">
                <i class="fas fa-comment-alt"></i> SimpleChat
              </div>
              <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
              </div>
            </header>
          
            <main class="msger-chat">
              
 <?php foreach ($list as $l ) { 
  if ($l['type']==='r')
  { 
    $side='left';
  }
  else if ($l['type']==='s')
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
      <?php if (isset($messContent)) { ?>
      <div class="<?php echo "msg $side-msg";?>"> 
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">test</div>
            <div class="msg-info-time">test</div>
          </div>
  
          <div class="msg-text"><?php echo $messContent;//unset($_POST); ?></div>
        </div>
      </div>
      <?php  } ?>

            </main>
          
          <form class="msger-inputarea" method="POST" action="">
              <input type="text" class="msger-input" placeholder="Enter your message..." name="message">
              <button type="submit" class="msger-send-btn" name="send">Send</button>
            </form>
          </section>
          <?php

          ?>
    </body>
</html>