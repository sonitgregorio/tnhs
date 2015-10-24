<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="panel-heading" style="padding:15px">
			Year And Section
	
		</div>


<?php 

if (!isset($id)) {
      $year = '';
        $section = '';
        echo "alalala";
} else {
   echo "bulaga";
}



 ?>

<form class="form-horizontal" method="post" action="/insert_class">
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
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Section</label>
                        <div class="col-sm-4">
                             <input value  ="<?php echo $section ?>"name="section" type="text" class="form-control" required>
                        </div>
        <button type="Submit" class="btn btn-primary">Save changes</button>
                    </div>

       


		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Year Level</th>
					<th>Section</th>
					<th>Action</th>
				</thead>
				<tbody>
                        <?php foreach ($this->adminmd->get_year_section() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['year']?></td>
                            <td><?php echo $value['section'] ?></td>
                            <td>
                                <a href="/update_class/<?php echo $value['id'] ?>" data-toggle="modal"  class="btn btn-info btn-xs mod" data-param="<?php echo  $value['id'] ?>"> <span class="fa fa-edit"></span></a>
                                <a href="/delete_class/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')"><span class="fa fa-trash-o"></span></a>
                            </td>        
                        </tr>
                    <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

