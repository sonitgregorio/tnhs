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
                    <th>Status</th>
				</thead>
				<tbody>
					<?php 
							$sum = $this->facultymd->select_sum_scores($eid);
							

							$sum1 = $sum['points'] * 0.6;


					 ?>
                <?php foreach ($this->facultymd->get_scores($eid) as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['firstname']." ".$value['middlename']." ".$value['lastname'] ?></td>
                       	<td><?php echo $value['points'] ?></td>
                         <td>
                         	<?php if ($value['points'] < $sum1): ?>
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

