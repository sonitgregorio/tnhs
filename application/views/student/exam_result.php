<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            Exam Result
        </div>
        <div class="panel-body">
           <div class="col-md-12">
              <form class="form-horizontal">
              <?php 
                        $des = $passing / 100;
                        $stats = $sumpoints * $des; 
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Total No. of Item</label>
                  <div class="col-sm-3">
                    <label class="form-control"><?php echo $sumpoints ?></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Score</label>
                  <div class="col-sm-3">
                      <label class="form-control"><?php echo $points ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Passing</label>
                  <div class="col-sm-3">
                      <label class="form-control"><?php echo $stats ?></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-3">
                      <?php 
                       
                        if ($stats <= $sumpoints) {
                          $f=  "Failed";
                        } else {
                          $f ="Passed";
                        }

                        

                       ?>
                       <label class="form-control"><?php echo $f ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-3">
                      <a href="/student_examination" class="btn btn-info pull-right">Back</a>
                  </div>
                </div>
              </form>
              
           </div>

        </div>
    </div>
</div>
