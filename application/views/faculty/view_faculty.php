<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			List of Student 
				 <div class="dropdown pull-right" >
                    <button id="dLabel" type="button" class="btn btn-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:2px">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#student_create" data-toggle="modal" class="face" data-target="#faculty" data-param='0'>
                                <span class="fa fa-plus-circle"></span>
                                New Faculty
                            </a>
                        </li>
                    </ul>
                </div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>Faculty ID</th>
					<th>Name of Faculty</th>
					<th>Address</th>
					<th>Action</th>
				</thead>
				<tbody>
                <?php foreach ($this->studentmd->get_faculty() as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['idno'] ?></td>
                        <td><?php echo $value['firstname'] . " " . $value['middlename'] . " " . $value['lastname'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <td>
                            <a href="#"data-toggle="modal" data-target="#faculty"  class="btn btn-info btn-xs fac" 
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

<div class="modal fade" id="faculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Faculty</h4>
      </div>
      <div class="modal-body">
            <div class="faculty_reg">
                    <?php $this->load->view('faculty/register_faculty') ?>
            </div>
    </div>
  </div>
</div>