<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of My Subject 
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Subject</th>
                    <th>Instructor</th>
                    <th width="200">Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->studentmd->get_myclass() as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['subject_title'] ?></td>
                            <td><?php echo $value['instructor'] ?></td>
                            <td>
                                <a href="/view_lessons/<?php echo $value['id'] ?>" class="btn btn-primary btn-xs ">View Lessons
                                 <span class="fa fa-note"></span>
                            </td>     
                        </tr>
                    <?php endforeach ?>
                       
                  
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