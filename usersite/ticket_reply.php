<?php


if (isset($_POST['user_reply_submit']))  
{ 
  $ticket_id = strip_tags(trim($_POST['ticket_id']));
  $user_id=strip_tags(trim($_POST['user_id']));
  $admin_id=1;
  $message = strip_tags(trim($_POST['message']));
  	 
    $pdo = $db->prepare('INSERT INTO support_ticket_reply(ticket_id,msg_from,msg_to,message)
    VALUES (:ticket_id,:msg_from,:msg_to,:message)');
    $pdo->bindParam(':ticket_id', $ticket_id, PDO::PARAM_STR);
    $pdo->bindParam(':msg_from', $user_id, PDO::PARAM_STR);
    $pdo->bindParam(':msg_to', $admin_id, PDO::PARAM_STR);
    $pdo->bindParam(':message', $message, PDO::PARAM_STR);    
    $pdo->execute();

    header("Location: ".BASE_URL."index.php?module=client&page=opened_support_ticket&ticket_id=".$ticket_id);

  }else{
 
 header("Location: ".BASE_URL."index.php?module=client&page=opened_support_ticket");
}

?>