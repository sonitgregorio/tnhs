<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding:15px">
			Subject
	
		</div>


<?php 
if ($this->session->flashdata('data') != '') 
          {
            //Queries for getting the data to show in the fields.
            $ms = $this->session->flashdata('data');
              $x = $this->adminmd->get_subject_by_id($ms);
            $sid = $x['id'];
               $year = $x['year'];
        $unit = $x['unit'];
        $subject_code = $x['subject_code'];
        $subject_title = $x['subject_title'];
        $type = $x['type'];
              echo "asdasdasd";
          } 
          else
          {
            $sid='';
       $year = '';
        $unit = '';
        $subject_code = '';
        $subject_title = '';
        $type = '';
        echo "aaaaaaaaaa";
          }
        





 ?>

<form class="form-horizontal" method="post" action="/insert_subject">
    <input type="hidden" value="<?php echo $sid ?>" name="sid">
                           <div class="form-group">
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Year Level</label>
                        <div class="col-sm-4">
                            <select name="year" class="form-control">
                                <option <?php echo $year == 'First Year' ? 'selected' : '' ?>>First Year</option>
                                <option <?php echo $year == 'Second Year' ? 'selected' : '' ?>>Second Year</option>
                                <option <?php echo $year == 'Third Year' ? 'selected' : '' ?>>Third Year</option>
                                <option <?php echo $year == 'Fourth Year' ? 'selected' : '' ?>>Fourth Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">unit</label>
                        <div class="col-sm-4">
                             <input value  ="<?php echo $unit ?>"name="unit" type="text" class="form-control" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Subject Code</label>
                        <div class="col-sm-4">
                             <input value  ="<?php echo $subject_code ?>"name="subject_code" type="text" class="form-control" required>
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Subject Title</label>
                        <div class="col-sm-4">
                             <input value  ="<?php echo $subject_title ?>"name="subject_title" type="text" class="form-control" required>
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Type</label>
                        <div class="col-sm-4">
                             <input value  ="<?php echo $type ?>"name="type" type="text" class="form-control" required>
                        </div>
                    </div>


        <button type="Submit" class="btn btn-primary">Save changes</button>
                    </div>

       


		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Year Level</th>
					<th>Subject Code</th>
					<th>Title</th>
                    <th>Unit</th>
                    <th>Action</th>
				</thead>
				<tbody>
                        <?php foreach ($this->adminmd->get_subject() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['year']?></td>
                            <td><?php echo $value['subject_code'] ?></td>
                            <td><?php echo $value['subject_title'] ?></td>
                            <td><?php echo $value['unit'] ?></td>
                            <td>
                                <a href="/edit_subject/<?php echo $value['id'] ?>" data-toggle="modal"  class="btn btn-info btn-xs mod" data-param="<?php echo  $value['id'] ?>"> <span class="fa fa-edit"></span></a>
                                <a href="/delete_subject/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')"><span class="fa fa-trash-o"></span></a>
                            </td>        
                        </tr>
                    <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
