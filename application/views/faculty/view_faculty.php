<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding:15px">
			List of Student 
				 <div class="dropdown pull-right" >
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#student_create" data-toggle="modal" data-target="#add_student">
                                <span class="fa fa-plus-circle"></span>
                                New Faculty
                            </a>
                        </li>
                    </ul>
                </div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Faculty ID</th>
					<th>Name of Faculty</th>
					<th>Address</th>
					<th>Action</th>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="add_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header" style="background:#f5f5f5">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Faculty</h4>
      </div>
      <div class="modal-body">
       	<div class="row">
            <div class="col-md-12">
            	<form class="form-horizontal" method="post" action="/insert_stud">
            		<div class="form-group">
            			<label class="col-sm-4 control-label">First Name</label>
            			<div class="col-sm-8">
	                    	<input name="fname" type="text" class="form-control" required>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Middle Name</label>
            			<div class="col-sm-8">
	                    	 <input name="mname" type="text" class="form-control" required>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Last Name</label>
            			<div class="col-sm-8">
	                    	 <input name="lname" type="text" class="form-control" required>
            			</div>
            		</div>
            		
                   <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Gender</label>
            			<div class="col-sm-8">
	                    	<select name="gender" class="form-control">
		                        <option value="1">Male</option>
		                        <option value="0">Female</option>
		                    </select>
            			</div>
            		</div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Civil</label>
            			<div class="col-sm-8">
	                    	<select name="civil" class="form-control">
	                        <option>Single</option>
	                        <option>Married</option>
	                        <option>Its Complicated</option>
		                    </select>
            			</div>
            		</div>
                   
                   	<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Date of Birth</label>
            			<div class="col-sm-8">
	                    	<input name="dbirth" type="date" class="form-control" required>
            			</div>
            		</div>

                   <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Address</label>
            			<div class="col-sm-8">
	                    	<input name="address" type="text" class="form-control" required>
            			</div>
            		</div>

                    <!-- <div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Year and Section</label>
            			<div class="col-sm-8">
	                    	 <select name='year_section' class="form-control">
		                    
		                    </select>
            			</div>
            		</div> -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="fa fa-lock"></span>User Access</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">  
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">  
                                    <input type="password" class="form-control" name="password">
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


                </form>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>