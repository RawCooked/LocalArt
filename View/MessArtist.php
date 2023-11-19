<?php
include '../Controller/messageC.php';
$msgC= new messageC(); 
if (isset($_POST["send"]))
{
if (
  isset($_POST["message"]) && !empty($_POST["message"])
) {
  $messContent=$_POST["message"];
  $messC = new message(NULL, 455, 105 , $messContent , date("h:i"),"a");  //c: client/a:artiste
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
        <link rel="stylesheet" href="Messagerie.css">
        <script>src="Messagerie.js"</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
          
            <main class="msger-chat" id="messages">
            <?php if (isset($messContent)) { ?>
        <script>
          appendMessage('saif',"assets/img/bg-showcase-1.jpg","right",<?=$messContent?>);
        </script>
        <!--
      <div class="<?php //echo "msg right-msg";?>"> 
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">test</div>
            <div class="msg-info-time">test</div>
          </div>
  
          <div class="msg-text"><?php //echo $messContent;//unset($_POST); ?></div>
        </div>
      </div>-->
      <?php  } ?>
            </main>
          
          <form class="msger-inputarea" method="POST" action="">
              <input type="text" class="msger-input" placeholder="Enter your message..." name="message">
              <button type="submit" class="msger-send-btn" name="send">Send</button>
            </form>
          </section>
          <script>
            setInterval('load_messages()',50);
            function load_messages(){
                $('#messages').load('loadMessA.php');  //C A
            }
          </script>
    </body>
</html>