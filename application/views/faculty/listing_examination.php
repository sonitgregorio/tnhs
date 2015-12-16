<div class="col-md-2"></div>
<div class="col-md-10">
<br />
	<div class="table table-responsive">
		<table class="table table-stripped table-bordered">
			<thead class="navbar navbar-inverse" style="color:white;text-align:center">
				<th style="text-align:center">No.</th>
				<th style="text-align:center">Name.</th>
				<th style="text-align:center">Status.</th>
				<th style="text-align:center">Action</th>
			</thead>
			<tbody>
			<?php foreach ($this->facultymd->getstudents($examid) as $key => $value): ?>
				<tr>
					<td><?php echo $value['idno'] ?></td>
					<td><?php echo $value['names'] ?></td>
					<td>
					<?php 
						if ($value['status'] == 1) {
							echo "Activated";
						}else{
							echo "Deactivated";
						}
					?>
					</td>
					<td>
						<a href="/deactivate/<?php echo $value['id'] ?>" class="btn btn-primary btn-xs fac">Deactivate
                                       <span class="fa fa-star"></span></a>
                                       <a href="/list_of_student/<?php echo $value['id'] ?>" class="btn btn-success btn-xs">List
                                       <span class="fa fa-star"></span></a>
					</td>
				</tr>
			<?php endforeach ?>
				

			</tbody>
		</table>
	</div>
</div>