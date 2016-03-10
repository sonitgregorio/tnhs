<br />
<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			List of Student 

		</div>
		<div class="panel-body">
        <?php echo $this->session->flashdata('message') ?>
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>Name</th>
					<th>Score</th>
					<th>Date Taken</th>
					<th>Time Taken</th>
                    <th>Status</th>
				</thead>
				<tbody>
					<?php 

							$getpass = $this->db->query("SELECT * FROM tbl_exam WHERE id = $eid")->row_array();
							
							$p = $getpass['passing'];
					 ?>
                <?php foreach ($this->facultymd->get_scores($eid) as $key => $value): ?>
                	<?php 
                		$d = $this->facultymd->get_date_time($eid, $value['party']);
                	?>
                    <tr>
                        <td><?php echo $value['firstname']." ".$value['middlename']." ".$value['lastname'] ?></td>
                       	<td><?php echo $value['points'] ?></td>
                       	<td><?= $d['date_taken'] ?></td>
                       	<td><?= $d['time_taken'] ?></td>
                         <td>
                         	<?php if ($value['points'] < $p): ?>
                         		Failed
                         	<?php else: ?>
                         		Passed
                         	<?php endif ?>
                         </td>
                    </tr>
                <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

