<?php 
    
    $x = $this->login->getinfo()
 ?>
<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            Account Settings
        </div>
        <div class="panel-body">
        <div class="col-md-8">
            <?=$this->session->flashdata('message')?>
            <form class="form-horizontal" method="POST" action="/main/update_users">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="fname" value="<?=$x['firstname']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Middle Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="mname" value="<?=$x['middlename']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lname" value="<?=$x['lastname']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date Of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="dob" value="<?=$x['dob']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="<?= $x['address']?>">
                    </div>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
            <br /><br /><br />
            <div class="panel panel-default">
                    <div class="header_styles" style="padding:15px">
                        <h3>Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <?=$this->session->flashdata('changepass');?>
                        <form class="form-horizontal" action="/main/change_pass" method="POST">
                            <input type="hidden" name="opassword" value="<?=$x['password']?>">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Old Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="oldpassword" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="npassword" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="cpassword" class="form-control">
                                </div>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
            
        </div>
    </div>
</div>
