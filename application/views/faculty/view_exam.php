<br />
<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			List of Exam 

		</div>
		<div class="panel-body">
        <?php echo $this->session->flashdata('message') ?>
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>Description</th>
					
                    <th>Action</th>
				</thead>
				<tbody>
                <?php foreach ($this->facultymd->get_exam($eid) as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['description'] ?></td>
                       
                        <td>
                            <a href="/view_student_score/<?php echo $value['id'] ?>" class="btn btn-info btn-xs fac">View Student <span class="fa fa-edit"></span></a>
                            
                        </td>        
                    </tr>
                <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

