<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class=" header_styles" style="padding:15px" >
            Examination
        </div>
        <div class="panel-body">
            <?php echo $this->session->flashdata('message') ?>
            <table class="table table-bordered table-striped">
                <thead class= "header_styles">
                    <th>Description</th>
                    <th>Subject</th>
                    <th>section</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->studentmd->get_kung_mayada_exam($this->session->userdata('uid')) as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo $value['subject_title']  ?></td>
                            <td><?php echo $value['sec'] ?></td>
                            <td><?php 

                            if ($value['status']==1) {
                                echo 'Activated';
                            } else {
                                echo 'Deactivated';
                            }
                            


                            ?></td>
                             <td>
                                <a href="#"data-toggle="modal" data-target="#add_student"  class="btn btn-info btn-xs mod" 
                                data-param="<?php echo  $value['id'] ?>"

                                > <span class="fa fa-edit"></span></a>
                                <a href="/delete_stud/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')"><span class="fa fa-trash-o"></span></a>
                            
                                 <a href="/take_exam/<?php echo $value['id'] ?>"   onclick="return confirm('Are You Sure?')">TAKE Exam</a>
                            
                            </td>        
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="add_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Student</h4>
      </div>
      <div class="modal-body">
        <div class="reg_student">
            <?php $this->load->view('student/register_student.php') ?>
        </div>
    </div>
  </div>
</div>