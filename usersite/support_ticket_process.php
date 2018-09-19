
<?php

if (isset($_POST['submit_ticket']))  
{ 
  $subject = strip_tags(trim($_POST['subject']));
  $client_id=strip_tags(trim($_POST['client_id']));
  $message = strip_tags(trim($_POST['message']));
  	 
    $pdo = $db->prepare('INSERT INTO support_ticket(client_id,subject,message)
    VALUES ( :client_id,:subject,:message)');
    $pdo->bindParam(':client_id', $client_id, PDO::PARAM_STR);
    $pdo->bindParam(':subject', $subject, PDO::PARAM_STR);
    $pdo->bindParam(':message', $message, PDO::PARAM_STR);    
    $pdo->execute();

    $_SESSION['msg']  ='Support Ticket Successfully Submitted';
    header("Location: ".BASE_URL."index.php?module=client&page=support_ticket");

  }else{
 
 $_SESSION['msg']  ='Error!! Support Ticket Not Submitted';
 header("Location: ".BASE_URL."index.php?module=client&page=support_ticket");
}

?>


















?>