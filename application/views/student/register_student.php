<?php echo $this->session->flashdata('message') ?>
<?php 
    if(!isset($firstname))
    {

        $firstname = '';
        $middlename = '';
        $lastname = '';
        $gender ='';
        $civil = '';
        $dob = '';
        $address = '';
        $year_section = '';
        $username = ''; 
        $password = '';
        $sid = '';
        $idno='';
    }

 ?>
 <form class="form-horizontal form_submit" method="post" action="/insert_stud" onsubmit="return false">
        <input type="hidden" value="3" name="usertype">
        <input type="hidden" value="<?php echo $sid ?>" name="sid">
       	<div class="row">
            <div class="err">
                
            </div>
            <div class="col-md-12">
            		<div class="form-group">
                        <label class="col-sm-4 control-label">ID No.</label>
                        <div class="col-sm-8">
                            <input name="idno" type="text" class="form-control"  value="<?php echo $idno ?>"required>
                        </div>
                    </div>
                    <div class="form-group">
            			<label class="col-sm-4 control-label">First Name</label>
            			<div class="col-sm-8">
	                    	<input name="fname" type="text" class="form-control"  value="<?php echo $firstname ?>"required>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Middle Name</label>
            			<div class="col-sm-8">
	                    	 <input name="mname" type="text" class="form-control" value="<?php echo $middlename ?>" required>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Last Name</label>
            			<div class="col-sm-8">
	                    	 <input name="lname" type="text" class="form-control" value="<?php echo $lastname ?>" required>
            			</div>
            		</div>
            		
                   <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Gender</label>
            			<div class="col-sm-8">
	                    	<select name="gender" class="form-control">
		                        <option value="1" <?php echo $gender == '1' ? 'selected' : '' ?>>Male</option>
		                        <option value="0" <?php echo $gender == '0' ? 'selected' : '' ?>>Female</option>
		                    </select>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Civil</label>
            			<div class="col-sm-8">
	                    	<select name="civil" class="form-control">
	                        <option <?php echo $civil == 'Single' ? 'selected' : '' ?>>Single</option>
	                        <option <?php echo $civil == 'Married' ? 'selected' : '' ?>>Married</option>
	                        <option <?php echo $civil == 'Its Complicated' ? 'selected' : '' ?>>Its Complicated</option>
		                    </select>
            			</div>
            		</div>
                   
                   	<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Date of Birth</label>
            			<div class="col-sm-8">
	                    	<input name="dbirth" type="date" class="form-control" required value="<?php echo $dob ?>">
            			</div>
            		</div>

                   <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Address</label>
            			<div class="col-sm-8">
	                    	<input name="address" type="text" class="form-control" value="<?php echo $address ?>" required>
            			</div>
            		</div>

                    <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Year and Section</label>
            			<div class="col-sm-8">
	                    	 <select name='year_section' class="form-control">
		                        <?php foreach ($this->studentmd->get_section() as $key => $value): ?>
                                    <option value='<?php echo $value['id'] ?>'><?php echo $value['year'] . " - " . $value['section'] ?></option>
                                <?php endforeach ?>
		                    </select>
            			</div>
            		</div>

                     <div class="panel panel-default">
                        <div class="header_styles" style="padding:5px"><span class="fa fa-lock"></span>User Access</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">  
                                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">  
                                    <input type="password" class="form-control" name="password" value="<?php echo $password ?>">
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-8">  
                                    <input type="password" class="form-control" name="cpassword">
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>