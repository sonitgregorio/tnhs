<div class="col-md-2"></div>
<div class="col-md-10">
<br />
	<div class="table table-responsive">
		<table class="table table-stripped table-bordered">
			<thead class="navbar navbar-inverse" style="color:white;text-align:center">
				<th style="text-align:center">No.</th>
				<th style="text-align:center">Name.</th>
        <th style="text-align:center">Date Taken</th>
        <th style="text-align:center">Time Taken</th>
				<th style="text-align:center">Status.</th>
				<th style="text-align:center">Action</th>
			</thead>
			<tbody>
			<?php foreach ($this->facultymd->getstudents($examid) as $key => $value): ?>
				<tr>
					<td><?php echo $value['idno'] ?></td>
					<td><?php echo $value['names'] ?></td>
          <td><?= $value['date_taken']?></td>
          <td><?= $value['time_taken']?></td>
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
					<?php if ($value['status'] == 1): ?>
						<a href="/stud_deactivate/<?php echo  $value['examid'] .'/'. $value['id']  ?>" class="btn btn-primary btn-xs fac">Deactivate
                                       <span class="fa fa-star"></span></a>
					<?php else: ?>
						<a href="#" class="btn btn-success btn-xs fac reactivate" data-param="<?php echo $value['examid'] ?>" data-param1="<?php echo $value['id'] ?>">Reactivate
                                       <span class="fa fa-star"></span></a>
					<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
				

			</tbody>
		</table>
	</div>
</div>
  <!-- Modal For Activation of Exam/Quiz. -->
<div class="modal fade" id="reactive_exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Activate Exam</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="/reactivate_stud_exam" method="post">
                    <input type="text" id="examids" name="examid" class="form-control">
                    <input type="text" id="uid" name="uid" class="form-control">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Date of Activation</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="date_activation" required>   
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Date of Deactivation</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="date_deactivate" required>   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Time Of Activation</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" name="time_activation" required>   
                            </div>
                        </div>    

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Time Of Deactivation</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" name="time_deactivation" required>   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Duration</label>
                            <div class="col-sm-8">
                                <input type="text" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" name="duration" class="form-control" placeholder="example (1:30)"/>
                                <!-- <input type="time" class="form-control" name="duration" required>    -->
                            </div>
                        </div>
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
            </form>
        </div>
      </div>
    </div>
</div>
