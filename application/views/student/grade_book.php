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
                    <th>Status</th>
				</thead>
				<tbody>
					<?php 
						

					 ?>
                <?php foreach ($this->studentmd->get_gradebook($this->session->userdata('uid')) as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['subject_title'] ?></td>
                       	<td><?php echo $value['points'] ?></td>
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

