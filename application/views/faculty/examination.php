<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of Quizes
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="col-md-5" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <?php foreach ($this->facultymd->get_sub_byid() as $key => $value): ?>
                                        <option><?php echo $value['subject_title'] ?></option>    
                                    <?php endforeach ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:0">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Description</th>
                    <th>Subject</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-info btn-xs fac">Add Question
                                <span class="fa fa-edit"></span></a>
                                <a href="" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')">Delete
                                    <span class="fa fa-trash-o"></span>
                                </a>
                            </td>        
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="faculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Faculty</h4>
      </div>
      <div class="modal-body">
            <div class="faculty_reg">
            </div>
    </div>
  </div>
</div>