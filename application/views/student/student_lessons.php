<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of  Lessons
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Description</th>
                    <th>File Name</th>
                    <th width="200">Action</th>
                </thead>
                <tbody>
                        <?php foreach ($this->studentmd->get_my_lessons($classid) as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['description'] ?></td>
                                <td><?php echo $value['filename'] ?></td>
                                <td>
                                    <?php 
                                        $x = explode('.',$value['filename']);
                                     ?>
                                     <?php if ($x[1] == 'pdf'): ?>
                                           <a href="/view_pdf/<?php echo $value['filename'] ?>" class="btn btn-primary btn-xs" target="tab">View PDF
                                     <span class="fa fa-note"></span>
                                 <?php else: ?>
                                   <a href="#" data-param="<?php echo $value['filename'] ?>" class="btn btn-primary btn-xs view_vid">View Video
                                     <span class="fa fa-note"></span>
                                     <?php endif ?>
                                  
                                </td>     
                            </tr>
                        <?php endforeach ?>
                        
                    
                  
                </tbody>
            </table>

            <!-- <video src="../assets/lessons/samples.mp4" controls></video> -->
        </div>
    </div>
</div>

<div class="modal fade" id="view_videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  style="border-radius:10px">
      <div class="modal-header header_styles" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Video</h4>
      </div>
      <div class="modal-body">
           <video src="" id="vids" controls style="width:100%"></video>
    </div>
  </div>
</div>
</div>