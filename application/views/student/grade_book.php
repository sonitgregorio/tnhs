<br />
<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			Grade Book

		</div>
		<div class="panel-body">
        <?php echo $this->session->flashdata('message') ?>
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>Subject</th>
					<th>Score</th>
					<th>Date Taken</th>
					<th>Time Taken</th>
                    <th>Status</th>
				</thead>
				<tbody>
					<?php 
						

					 ?>
                <?php foreach ($this->studentmd->get_gradebook($this->session->userdata('uid')) as $key => $value): ?>
                    <?php $x = $this->studentmd->get_date_time($value['ex'], $this->session->userdata('uid')) ?>
                    <tr>
                        <td><?php echo $value['subject_title'] ?></td>
                       	<td><?php echo $value['points'] ?></td>
                       	<td><?= $x['date_taken']?></td>
                       	<td><?= $x['time_taken']?></td>
                         <td>
                         	<?php 

                         		if ($value['points']<$value['passing']) {
                         			echo "Failed";
                         		} else {
                         			echo "Passed";
                         		}
                         		

                         	 ?>
                         </td>
                    </tr>
                <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

