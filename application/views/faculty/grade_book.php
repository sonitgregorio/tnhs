<br />
<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			List of Subjects 

		</div>
		<div class="panel-body">
        <?php echo $this->session->flashdata('message') ?>
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>Subject Code</th>
					<th>Subject Title</th>
					<th>Section</th>
                    <th>Action</th>
				</thead>
				<tbody>
                <?php foreach ($this->facultymd->get_subject($this->session->userdata('uid')) as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['subject_code'] ?></td>
                        <td><?php echo $value['subject_title'] ?></td>
                        <td><?php echo $value['sec'] ?></td>
                        <td>
                            <a href="/view_exam/<?php echo $value['classid'] ?>"   class="btn btn-info btn-xs fac" >View Quizes <span class="fa fa-edit"></span></a>
                            
                        </td>        
                    </tr>
                <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

