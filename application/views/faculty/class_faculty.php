<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of Student 

                 <!-- <div class="dropdown pull-right" >
                    <button id="dLabel" type="button" class="btn btn-info btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:2px">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#student_create" data-toggle="modal" class="face" data-target="#faculty" data-param='0'>
                                <span class="fa fa-plus-circle"></span>
                                New Faculty
                            </a>
                        </li>
                    </ul>
                </div> -->
        </div>
        <div class="panel-body">
                <form class="form-horizontal" action="/addclass" method="POST">
                    <div class="form-group col-md-4">
                         <label class="col-sm-4 control-label">School Year</label>
                            


                        <div class="col-sm-8">
                            <select name = "InsSY" class="form-control">
                                <?php foreach ($this->facultymd->get_sch_year() as $key => $value): ?>
                                     <option value = " <?php echo $value['id']; ?>">
                                       <?php 
                                       echo $value['sch_yr'];
                                        ?>
                                     </option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="InsSY"> -->
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-sm-2 control-label">Section</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="InsSec">
                             <?php 
                                foreach ($this->facultymd->selectsections() as $key => $value) { ?>
                                     <option value = " <?php echo $value['id']; ?>">
                                       <?php 
                                       echo $value['year'] . " - " . $value['section'];
                                        ?>
                                     </option>
                                <?php 
                                } ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group col-md-3">
                         <label class="col-sm-4 control-label">Subject</label>
                        <div class="col-sm-8" style="padding:0px">
                            <select class="form-control" name="InsSub">
                                <?php 
                                foreach ($this->facultymd->selectsubjects() as $key => $value) { ?>
                                     <option value = " <?php echo $value['id']; ?>">
                                       <?php 
                                       echo $value['subject_title'];
                                        ?>
                                     </option>
                                <?php 
                                } ?>                               
                            </select>

                            <!-- <input type="submit"> -->
                        </div>
                        
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>School year</th>
                    <th>Section</th>
                    <th>Subject Code</th>
                    <th>Title</th>
                    <th width="200">Unit</th>
                </thead>
                <tbody>
                    <?php 
                    foreach ($this->facultymd->selectclasses($this->session->userdata('uid')) as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['yr']; ?></td>
                            <td><?php echo $value['yearsec'] ?></td>
                            <td><?php echo $value['subject_code']; ?></td>
                            <td><?php echo $value['subject_title']; ?></td>
                            <td>
                                <a href="/view_stud/<?php echo $value['id'] ?>" class="btn btn-info btn-xs fac">View Student
                                <span class="fa fa-edit"></span></a>
                                <a href="/delete_classes/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')">Delete
                                    <span class="fa fa-trash-o"></span>
                                </a>
                            </td>        
                        </tr>
                    <?php 
                    }
                    ?>
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