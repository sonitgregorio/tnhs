<br />
<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class="header_styles" style="padding:15px">
			My Lessons
		</div>
		<div class="panel-body">
            <div class="col-md-12" style="padding:0px">
            <?php echo $this->session->flashdata('message') ?>
                <form class="form-horizontal" method="post" action="/upload_lessons" enctype="multipart/form-data">
                <div class="col-md-12" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Add File</label>
                            <div class="col-sm-6" >
                               <input name="uploads" type="file" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Subject</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_this" name="subject">
                                        <?php foreach ($this->lessonsmd->get_subject() as $key => $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['subject_title'] ?></option>
                                        <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Description</label>
                            <div class="col-sm-6">
                               <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding:0">
                        <label class="col-sm-1 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12" style="margin-top:10px">
    			<table class="table table-bordered table-striped">
    				<thead class="header_styles">
    					<th>Description</th>
    					<th>Subject</th>
    					<th>File</th>
    					<th>Action</th>
    				</thead>
    				<tbody>
                        <?php foreach ($this->lessonsmd->get_lessons() as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['description'] ?></td>
                                <td><?php echo $value['subject_title'] ?></td>
                                <td><?php echo $value['filename'] ?></td>
                                <td>
                                    <a href="/delete_lessons/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')">Delete
                                    <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>        
                            </tr>
                        <?php endforeach ?>
                        
    				</tbody>
    			</table>
            </div>
		</div>
	</div>
</div>

