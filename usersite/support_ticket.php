
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Support Ticket
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
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Support Ticket
					</div>
					<div class="panel-body clearfix">
                        <form action="<?php echo BASE_URL; ?>index.php?module=client&page=support_ticket_process" method="POST">
                            <div class="form-group">
                                <label for="subject">Subject</label>                                
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required> 
                                <input type="hidden" value="<?php echo $_SESSION['client_id'];?>" name="client_id" />                               
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea rows="3" cols="40" class="form-control" name="message" placeholder="Write Your Message" required></textarea>
                            </div>                            
                            <button type="submit" class="btn btn-primary" name="submit_ticket">Submit</button>
                        </form>
					</div>
					<div class="panel-footer">
					</div>

				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Open Tickets
					</div>                    

					<div class="panel-body"> 
                        
                        <ul class="chat">
                        <?php
                        //get session client id
                         $client_id=$_SESSION['client_id'];
                         $open_tickets=open_tickets('support_ticket',$client_id);
                         foreach($open_tickets as $tickets): ?>	
						 <?php $id=$tickets['ticket_id'];?>					 
                                <li><a href="<?php echo BASE_URL; ?>index.php?module=client&page=opened_support_ticket&ticket_id=<?php echo $tickets['ticket_id'];?>">
								Ticket Number #<?php echo $tickets['ticket_id']." ".$tickets['subject']; ;?></a></li>
                        <?php endforeach;?>                                                               
                        </ul>                        
                        <!--/Chat widget-->                        
                    </div>
					<div class="panel-footer">
                       
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
