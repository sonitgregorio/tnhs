<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			Year And Section
		</div>
<?php 

if (!isset($id)) {
      $year = '';
        $section = '';
}
?>
		<div class="panel-body">
            <div class="col-md-12 ">
                <form class="form-horizontal" method="post" action="/insert_class">
                       <div class="form-group col-md-5" style="padding:0px">
                        <label class="col-sm-3 control-label" for="exampleInputEmail1">Grade</label>
                        <div class="col-sm-9">
                            <select name="year" class="form-control">
                                <option <?php echo $year == 'Grade 7' ? 'selected' : '' ?>>Grade 7</option>
                                <option <?php echo $year == 'Grade 8' ? 'selected' : '' ?>>Grade 8</option>
                                <option <?php echo $year == 'Grade 9' ? 'selected' : '' ?>>Grade 9</option>
                                <option <?php echo $year == 'Grade 10' ? 'selected' : '' ?>>Grade 10</option>
                                <option <?php echo $year == 'Grade 11' ? 'selected' : '' ?>>Grade 11</option>
                                <option <?php echo $year == 'Grade 12' ? 'selected' : '' ?>>Grade 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4" style="padding:0px">
                        <label class="col-sm-3 control-label" for="exampleInputEmail1">Section</label>
                        <div class="col-sm-9">
                             <input value  ="<?php echo $section ?>"name="section" type="text" class="form-control" required style="padding:0px">
                        </div>
                    </div>
                    <div class="col-md-3">
                     <button type="Submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
            </div>
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
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

