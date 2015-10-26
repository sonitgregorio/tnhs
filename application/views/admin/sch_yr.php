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
} else {
}



 ?>


       


		<div class="panel-body">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" method="post" action="/insert_sch">

                    <div class="form-group col-md-9" style="padding:0px">
                        <label class="col-sm-3 control-label" for="exampleInputEmail1"></label>
                        <div class="col-sm-9">
                             <input value  =""name="sch" type="text" class="form-control" required style="padding:0px" placeholder="e.g(2015-213)">
                        </div>
                    </div>

                    <div class="col-md-3">
                     <button type="Submit" class="btn btn-primary">Save</button>

                    </div>
            </form>

            </div>
            
			<table class="table table-bordered table-striped">
				<thead class="header_styles">
					<th>School Year</th>
					<th>Action</th>
				</thead>
				<tbody>
                        <?php foreach ($this->adminmd->get_sch_year() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['sch_yr']?></td>
                            <td>
                                <a href="/delete_sch/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')"><span class="fa fa-trash-o"></span></a>
                            </td>        
                        </tr>
                    <?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

