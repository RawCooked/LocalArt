<?php
include '../Controller/messageC.php';
$messageContent = isset($_POST['message']) ? $_POST['message'] : '';
$messC=new messageC(NULL, 455, 105, $messageContent,date("h:i"));
$messC->addmessage($messC,$messageContent);         
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Messagerie/Client</title>
        <link rel="stylesheet" href="MessClient.css">
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

            </main>
          
            <form class="msger-inputarea" method="POST" action="">
              <input type="text" class="msger-input" placeholder="Enter your message..." name="message">
              <button type="submit" class="msger-send-btn">Send</button>
            </form>
          </section>
          <script src="MessClient.js"></script>
          <?php

          ?>
    </body>
</html>