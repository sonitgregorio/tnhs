<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class=" header_styles" style="padding:15px" >
			List of Student
            	<div class="dropdown pull-right" >
                    <button id="dLabel" type="button" class="btn btn-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:2px">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#student_create" data-toggle="modal" data-param='0' class="mod" data-target="#add_student">
                                <span class="fa fa-plus-circle"></span>
                                New Student Information
                            </a>
                        </li>
                    </ul>
                </div>
		</div>
		<div class="panel-body">
            <?php echo $this->session->flashdata('message') ?>
			<table class="table table-bordered table-striped">
				<thead class= "header_styles">
					<th>Student No.</th>
					<th>Name</th>
					<th>Year & Section</th>
					<th>Address</th>
					<th>Action</th>
				</thead>
				<tbody>
                    <?php foreach ($this->studentmd->get_stud() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['idno'] ?></td>
                            <td><?php echo $value['firstname'] . " " . $value['middlename'] . " " . $value['lastname'] ?></td>
                            <td><?php echo $value['section'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td>
                                <a href="#"data-toggle="modal" data-target="#add_student"  class="btn btn-info btn-xs mod" 
                                data-param="<?php echo  $value['id'] ?>"

                                > <span class="fa fa-edit"></span></a>
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
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Student</h4>
      </div>
      <div class="modal-body">
        <div class="reg_student">
            <?php $this->load->view('student/register_student.php') ?>
        </div>
    </div>
  </div>
</div>