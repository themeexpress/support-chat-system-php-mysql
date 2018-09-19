<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Support Reply
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Support Reply</li>
        </ol>
    </section>

    <section class="content form_contant">
        <div class="row">
           <?php if (isset($_SESSION['msg'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['msg']; ?>
            </div>
            <?php
            unset($_SESSION["msg"]);
        endif;
        ?>
    </div>
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="box box-info box-solid box_gac">
                <div class="box-header with-border">
                    <h3 class="box-title">Tickets List</h3>
                </div>
                <div class="box-body table-responsive">                    
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>                                                            
                                <th>Ticket ID</th>
                                <th>Client ID</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $supports = get_data_from_table('support_ticket'); ?>
                            <?php
                            $i = 0;
                            foreach ($supports as $row):
                                ?>
                                <tr role="row" class="odd">
                                    
                                   <td><?php echo $row['ticket_id']; ?></td>
                                   <td><?php echo $row['client_id']; ?></td>
                                   <td><a href="<?php echo BASE_URL; ?>index.php?module=admin&page=admin_ticket_details&ticket_id=<?php echo $row['ticket_id'];?>"><?php echo $row['subject']; ?></a></td>                                                                    
                                   <td><?php echo $row['message']; ?></td>
                                   <td>
                                       <?php if($row['status']==1){?>
                                        <form action='<?php echo BASE_URL; ?>index.php?module=admin&page=close_ticket_process' method='post'>
                                                <input type='hidden' name='ticket_id' value='<?php echo $row['ticket_id']; ?>'>
                                                <input class='btn btn-inverse' type='submit' name='close_ticket' value='Close Ticket'><i class='icon-refresh icon-white'></i></input> 
                                                </form>
                                       <?php } else{
                                           echo 'Closed';
                                       } 
                                       ?>
                                    </td>
                                   <td><?php echo $row['created_at']; ?></td>
                                   <td>
                                   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#reply<?php echo $row['ticket_id'];?>">Reply</button> 
                                    </td>
                                 <!-- reply modal start-->
                                 <!-- Modal -->
                                    <div id="reply<?php echo $row['ticket_id'];?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Support Ticket Reply</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo BASE_URL; ?>index.php?module=admin&page=close_ticket_process" method="POST">
                                                <p><?php echo $row['subject']; ?></p>
                                                
                                                <div class="form-group">
                                                    <label for="pwd">Reply Message:</label>
                                                    <input type="hidden" class="form-control" name="ticket_id" value="<?php echo $row['ticket_id']; ?>">
                                                    <input type="hidden" class="form-control" name="client_id" value="<?php echo $row['client_id']; ?>">
                                                    <textarea class="form-control" rows="3" name="message"></textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary pull-right" name="message_reply">Reply</button>
                                        </div>
                                        </form>
                                        </div>

                                    </div>
                                    </div>

                                <!--/reply modal end-->
                                </tr>
                   

                           <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
