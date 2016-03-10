<?php 
date_default_timezone_set("Asia/Manila"); 

 ?>
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
                    <th>Deactivation Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->studentmd->get_kung_mayada_exam($this->session->userdata('uid')) as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo $value['subject_title']  ?></td>
                            <td><?php echo $value['sec'] ?></td>
                            <td><?= $value['date_deactivation']?></td>
                            <td><?php 

                            
                            if ($value['date_activation'] > date('Y-m-d') or $value['date_deactivation'] < date('Y-m-d') or $value['status'] == 0) {
                                $due = 'Deactivated';
                            }elseif ($value['date_activation'] == date('Y-m-d')) {
                                if ($value['time_start'] > date('H:i:s')) {
                                     $due = 'Deactivated';
                                } else{
                                    $due = 'Activated';
                                }
                            }elseif ($value['date_deactivation'] == date('Y-m-d')) {
                                if ($value['time_end'] < date('H:i:s')) {
                                     $due = 'Deactivated';
                                } else{
                                    $due = 'Activated';
                                }
                            } else {
                              $due = 'Activated';   
                            }
                            echo $due;

                           ?></td>
                             <td>
                        

                            <?php 
                                // echo "<a href='/take_exam/". $value['examid'] . "' class='btn btn-primary btn-xs' onclick='return confirm('Are You Sure?')'>Take Exam</a>";
                                $due = '';
                                if ($value['date_activation'] > date('Y-m-d') or $value['date_deactivation'] < date('Y-m-d') or $value['status'] == 0) {
                                    $due = '';
                                }elseif ($value['date_activation'] == date('Y-m-d')) {
                                    if ($value['time_start'] > date('H:i:s')) {
                                         $due = '';
                                    } else{
                                        $due = "<a href='/take_exam/". $value['examid'] . "' class='btn btn-primary btn-xs' onclick='return confirm('Are You Sure?')'>Take Exam</a>";;
                                    }
                                }elseif ($value['date_deactivation'] == date('Y-m-d')) {
                                    if ($value['time_end'] < date('H:i:s')) {
                                         $due = '';
                                    } else{
                                        $due = "<a href='/take_exam/". $value['examid'] . "' class='btn btn-primary btn-xs' onclick='return confirm('Are You Sure?')'>Take Exam</a>";;
                                    }
                                } else {
                                        $due = "<a href='/take_exam/". $value['examid'] . "' class='btn btn-primary btn-xs' onclick='return confirm('Are You Sure?')'>Take Exam</a>";
                                }
                                echo $due;



                             ?>


                               
                            
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