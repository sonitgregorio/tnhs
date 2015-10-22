<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding:15px">
			Year And Section
				 <div class="dropdown pull-right" >
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#student_create" data-toggle="modal" data-target="#add_student">
                                <span class="fa fa-plus-circle"></span>
                                New Class
                            </a>
                        </li>
                    </ul>
                </div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Year Level</th>
					<th>Section</th>
					<th>Action</th>
				</thead>
				<tbody>
                        <?php foreach ($this->adminmd->get_year_section() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['year']?></td>
                            <td><?php echo $value['section'] ?></td>
                            <td>
                                <a href="#" data-toggle="modal"  class="btn btn-info btn-xs mod" data-param="<?php echo  $value['id'] ?>"> <span class="fa fa-edit"></span></a>
                                <a href="/delete_stud/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')"><span class="fa fa-trash-o"></span></a>
                            </td>        
                        </tr>
                    <?php endforeach ?>
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
        <h4 class="modal-title" id="myModalLabel">CLASS INFORMATION</h4>
      </div>
      <div class="modal-body">
       	<div class="row">
            <div class="col-md-12">
            	<form class="form-horizontal" method="post" action="/insert_stud">
            		   <div class="form-group">
                        <label class="col-sm-4 control-label" for="exampleInputEmail1">Year Level</label>
                        <div class="col-sm-8">
                            <select name="gender" class="form-control">
                                <option value="1">First Year</option>
                                <option value="2">Second Year</option>
                                      <option value="3">Thrid Year</option>
                                            <option value="4">Fourth Year</option>
                            </select>
                        </div>
                    </div>
            		<div class="form-group">
	                    <label class="col-sm-4 control-label" for="exampleInputEmail1">Section</label>
            			<div class="col-sm-8">
	                    	 <input name="mname" type="text" class="form-control" required>
            			</div>
            		</div>
            		<div class="form-group">
	              
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>