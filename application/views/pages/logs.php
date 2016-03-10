<?php 
    
 ?>
<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            User Logs
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Activity</td>
                        <td>Date</td>
                        <td>Time</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->db->query("SELECT * FROM tbl_logs ORDER BY id DESC")->result_array() as $key => $value): ?>
                        <tr>
                            <td><?= $value['names']?></td>
                            <td><?= $value['activity']?></td>
                            <td><?= $value['date_log']?></td>
                            <td><?= $value['time_log']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
