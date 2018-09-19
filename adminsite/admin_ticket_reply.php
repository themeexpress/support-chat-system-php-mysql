<?php


if (isset($_POST['admin_reply_submit']))  
{ 
  $ticket_id = strip_tags(trim($_POST['ticket_id']));
  $client_id=strip_tags(trim($_POST['client_id']));
  $admin_id=1;
  $message = strip_tags(trim($_POST['message']));
  	 
    $pdo = $db->prepare('INSERT INTO support_ticket_reply(ticket_id,msg_from,msg_to,message)
    VALUES (:ticket_id,:msg_from,:msg_to,:message)');
    $pdo->bindParam(':ticket_id', $ticket_id, PDO::PARAM_STR);
    $pdo->bindParam(':msg_from', $admin_id, PDO::PARAM_STR);
    $pdo->bindParam(':msg_to', $client_id, PDO::PARAM_STR);
    $pdo->bindParam(':message', $message, PDO::PARAM_STR);    
    $pdo->execute();

    header("Location: ".BASE_URL."index.php?module=admin&page=admin_ticket_details&ticket_id=".$ticket_id);

  }else{
 
 header("Location: ".BASE_URL."index.php?module=admin&page=admin_support_ticket");
}

?>