<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of Student
             <div class="dropdown pull-right" >
                    <button id="dLabel" type="button" class="btn btn-info btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:2px">
                        <span class="fa fa-cog"></span>
                        Action
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#" id="mods" data-param="<?php echo $subid ?>">
                                <span class="fa fa-plus-circle"></span>
                                Add Student
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="panel-body">
                
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Student Name</th>
                    <th>Year &  Section</th>
                    <th width="30">Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->facultymd->get_all_classes($subid) as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['studname'] ?></td>
                            <td><?php echo $value['stud_sect'] ?></td>
                            <td>
                                <a href="/delet_stud_class/<?php echo $value['studids'] . '/' . $subid?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure?')">Delete <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                        
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Student</h4>
      </div>
      <div class="modal-body">
            <table class="table table-bordered display" id="example">
                <thead class="header_styles" >
                    <th>Name</th>
                    <th>Year and Section</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->facultymd->get_stud_class($subid) as $key => $value): ?>
                           <tr>
                                <td><?php echo $value['firstname'] ." ". $value['lastname'] ?></td>
                                <td><?php echo $value['year'] . "-" .  $value['section'] ?></td>
                                <td>
                                    <form method="post" action="/insert_studentsss">
                                       <input type="hidden" name="classid"> 
                                      <input type="hidden" name='stud_id' value="<?php echo  $value['studid'] ?>">
                                      <button  type="submit" class="btn btn-info btn-xs">Add Student</button>
                                    </form>
                                </td>
                            </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
           <!--  <form method="post" action="/insert_studentsss">
                  <input type="submit">
            </form> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>