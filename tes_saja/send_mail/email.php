<?php

    $name = $_POST['name'];

    $subject = $_POST['subject'];

    $msg = $_POST['msg'];

    $from = $_POST['mail'];

    $to = 'richardtandy2015@gmail.com';

    $headers = 'From: '.$name;

    $txt = 'dapat email dari '.$from.".\n\n".$msg;

    mail($to,$subject,$txt,$headers);
    
    header("Location: index.php?mailsend");