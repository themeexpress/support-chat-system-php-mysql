
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Open Support Ticket
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Support Ticket</li>
        </ol>
        <?php
                if (!empty($_SESSION['msg'])) {
                    echo '<div class="alert alert-success"> ' . $_SESSION['msg'] . '</div>';
                    unset($_SESSION['msg']);
                }
                ?>
	</section>

	<section class="content form_contant">
		<div class="row">
			<div class="col-md-1">               
            </div>
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Open Ticket to Reply
					</div>

					<div class="panel-body"> 
                       
                        <ul class="chat">
                        <?php 
                            //Get ticket Id and Session User ID
                            $ticket_id = $_GET['ticket_id'];
                            $get_user_id=get_user_id($ticket_id);
                            $client_id=$get_user_id['client_id'];                           
                            $open_tickets_user=open_tickets_user($ticket_id); 
                            
                            //Loop for conversation 
                        foreach($open_tickets_user as $tickets): ?>
                            <?php if($tickets['msg_from']==1){?>
                                <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="http://placehold.it/50/55C1E7/fff&text=S" alt="User Avatar" class="img-circle" />
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Support Team</strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                        </div>
                                        <p><?php echo $tickets['message'];?>
                                            
                                        </p>
                                    </div>
                                </li>
                                <?php } else{ ?>
                                <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="http://placehold.it/50/FA6F57/fff&text=C" alt="User Avatar" class="img-circle" />
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class="text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $tickets['reply_date']; ?></small>
                                            <strong class="pull-right primary-font">Client</strong>
                                        </div>
                                        <p class="text-right"><?php echo $tickets['message']?>                                      </p>
                                    </div>
                                </li> 
                            <?php } ?>   
                                <?php endforeach; ?>                          
                        </ul>
                        
                        <!--/Chat widget-->
                        
                    </div>
					<div class="panel-footer"> 
                        <form action="<?php echo BASE_URL; ?>index.php?module=admin&page=admin_ticket_reply" method="POST">                  
                            <div class="input-group">                        
                                <input type="hidden" name="ticket_id" class="form-control" value="<?php echo $ticket_id; ?>">
                                <input type="hidden" name="client_id" class="form-control" value="<?php echo $client_id; ?>">
                                <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." required/>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" name="admin_reply_submit">Send</button>
                                </span>                        
                            </div>
                        </form>
					</div>
				</div>
			</div>
            <a class="btn btn-primary" href="<?php echo BASE_URL; ?>index.php?module=admin&page=admin_support_ticket">Back To Ticket</a>
            <div class="col-md-1"></div>
		</div>
        
	</section>
</div>
