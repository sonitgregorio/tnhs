<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of Quizes
        </div>
        <div class="panel-body">
            <div class="col-md-12" style="padding:0px">
            <?php echo $this->session->flashdata('message') ?>
                <form class="form-horizontal" method="post" action="/insert_exam">
                <div class="col-md-3" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-9" style="padding:0px">
                                <select class="form-control" id="section" name="section">
                                    <option>Select Class</option>
                                    <?php foreach ($this->facultymd->get_classes_byid() as $key => $value): ?>
                                        <option value="<?php echo $value['section'] ?>"><?php echo $value['sec'] ?></option>    
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Subject</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="select_this" name="subject">
                               
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" styl="padding:0px">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1" style="padding:0">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Description</th>
                    <th>Subject</th>
                    <th>Section</th>
                    <th width="32%">Action</th>
                </thead>
                <tbody>
                <?php foreach ($this->facultymd->get_quizes() as $key => $value): ?>
                     <tr>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo $value['subject_title'] ?></td>
                            <td><?php echo $value['sec'] ?></td>
                            <td>
                                <a href="/add_question/<?php echo $value['id'] ?>" class="btn btn-info btn-xs fac">Add Question
                                <span class="fa fa-edit"></span></a>
                                <?php if ($value['status'] == 0): ?>
                                      <!--   <a href="/activate_exams/<?php echo $value['id'] ?>" class="btn btn-info btn-xs">Activate Exams
                                       <span class="fa fa-star"></span></a>  -->
                                         <a href="#" class="btn btn-success btn-xs fac ac_exam" data-param="<?php echo $value['id'] ?>">Activate
                                       <span class="fa fa-star"></span></a>
                                       <a href="" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')">Delete
                                    <span class="fa fa-trash-o"></span>
                                </a>
                                <?php else: ?>
                                    <a href="/deactivate/<?php echo $value['id'] ?>" class="btn btn-primary btn-xs fac">Deactivate
                                       <span class="fa fa-star"></span></a>
                                       <a href="/list_of_student/<?php echo $value['id'] ?>" class="btn btn-success btn-xs">List
                                       <span class="fa fa-star"></span></a>

                                <?php endif ?>
                           
                                
                                
                            </td>        
                        </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Modal For Activation of Exam/Quiz. -->
<div class="modal fade" id="exams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Activate Exam</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="/activate_exams" method="post">
                    <input type="hidden" id="examids" name="examid" class="form-control">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Passing Score</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="score" required>   
                            </div>
                        </div>
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
                       <!--  <div class="form-group">
                            <label class="col-sm-4 control-label">Duration</label>
                            <div class="col-sm-8"> -->
                                <input type="hidden"  name="duration" class="form-control" placeholder="example (1:30)" value="01:00" />
                                <!-- <input type="time" class="form-control" name="duration" required>    -->
                            <!-- </div>
                        </div> -->
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
            </form>
        </div>
      </div>
    </div>
</div>
