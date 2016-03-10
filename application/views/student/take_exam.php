<div class="col-md-2 loads"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class=" header_styles" style="padding:15px" >

			<?php 
				$id = $this->session->userdata('uid');
				$x = $this->db->query("SELECT time_duration FROM tbl_stud_exam WHERE examid = $qid AND uid = $id")->row_array();
				$time = $x['time_duration'];
				$ext = explode(':', $time);

				$h = $ext[0];
				$m = $ext[1];
			 ?> 
			<input type="hidden" name="h" value="<?php echo $h ?>">
			<input type="hidden" name="m" value="<?php echo $m ?>">
			Examination 
				<div id="countdowntimer" style="border:none" class="pull-right" ><span id="hm_timer" style="padding:5px;border:none;margin-bottom:10px"><span></div>

		</div>
		<div class="panel-body">
            <?php echo $this->session->flashdata('message') ?>

				<form>

			<?php foreach ($this->studentmd->get_take_exam($qid) as $key => $value): 
			 $rand=rand(0,3);
			?>
				<br />
				<div class="col-md-12" style="padding-top:30px">
					<p><?php echo $key+1 .".) ". $value['question'] ?>

					</p>
				</div>
				<div class="col-md-12" >

					<?php 
							if ($rand==0) { ?>	
							<div class="col-md-12 radio">
								<label><input class="checked1" type="radio" data-param="<?php echo $value['answer'] ?>"  data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['answer'] ?>" required><span>A.)&nbsp;&nbsp;</span><?php echo $value['answer'] ?></label>
							</div>	
							<div class="col-md-12 radio">
	                            <label><input class="checked1" type="radio" data-param="<?php echo $value['choice1'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice1'] ?>" required><span>B.)&nbsp;&nbsp;</span><?php echo $value['choice1'] ?></label>
							</div>	
							<div class="col-md-12 radio">
	                           	<label><input class="checked1" type="radio" data-param="<?php echo $value['choice2'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice2'] ?>" required><span>C.)&nbsp;&nbsp;</span><?php echo $value['choice2'] ?></label>
							</div>		  
							<div class="col-md-12 radio">
								<label><input class="checked1" type="radio" data-param="<?php echo $value['choice3'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice3'] ?>" required><span>D.)&nbsp;&nbsp;</span><?php echo $value['choice3'] ?></label>
							</div>
	                            
	                            
                            <?php
							} elseif ($rand==1) { ?>
							<div  class="col-md-12 radio">					            
								<label><input class="checked1" type="radio" data-param="<?php echo $value['choice1'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice1'] ?>" required><span>A.) </span><?php echo $value['choice1'] ?></label>
							</div>
							<div  class="col-md-12 radio">
								<label><input class="checked1" type="radio" data-param="<?php echo $value['answer'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['answer'] ?>" required><span>B.)&nbsp;&nbsp;</span><?php echo $value['answer'] ?></label>
							</div>
                           	<div class="col-md-12 radio">
                           		<label><input class="checked1" type="radio" data-param="<?php echo $value['choice2'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice2'] ?>" required><span>C.)&nbsp;&nbsp;</span><?php echo $value['choice2'] ?></label>
                           	</div>
                           	<div class="col-md-12 radio">
                           		 <label><input class="checked1" type="radio" data-param="<?php echo $value['choice3'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice3'] ?>" required><span>D.)&nbsp;&nbsp;</span><?php echo $value['choice3'] ?></label>
                           	</div>
                           
							<?php 
							} elseif ($rand==2) { ?>		
							
							<div  class="col-md-12 radio">
					            <label><input class="checked1" type="radio" data-param="<?php echo $value['choice1'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo  $value['choice1'] ?>" required><span>A.)&nbsp;&nbsp;</span><?php echo $value['choice1'] ?></label>
							</div>
							<div  class="col-md-12 radio">
								<label><input class="checked1" type="radio" data-param="<?php echo $value['choice2'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo  $value['choice2'] ?>" required><span>B.)&nbsp;&nbsp;</span><?php echo $value['choice2'] ?></label>
							</div>
                           	<div class="col-md-12 radio">
                           		<label><input class="checked1" type="radio" data-param="<?php echo $value['answer'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo  $value['answer'] ?>" required><span>C.)&nbsp;&nbsp;</span><?php echo $value['answer'] ?></label>
                           	</div>
                           	<div class="col-md-12 radio">
                           		 <label><input class="checked1" type="radio" data-param="<?php echo $value['choice3'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo   $value['choice3'] ?>" required><span>D.)&nbsp;&nbsp;</span><?php echo $value['choice3'] ?></label>
                           	</div>
							<?php   
							} else { ?>
							<div  class="col-md-12 radio">
					            <label><input class="checked1" type="radio" data-param="<?php echo $value['choice1'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo  $value['choice1'] ?>" required><span>A.)&nbsp;&nbsp;</span><?php echo $value['choice1'] ?></label>
							</div>
							<div  class="col-md-12 radio">
								<label><input class="checked1" type="radio" data-param="<?php echo $value['choice2'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice2'] ?>" required><span>B.)&nbsp;&nbsp;</span><?php echo $value['choice2'] ?></label>
							</div>
                           	<div class="col-md-12 radio">
                           		<label><input class="checked1" type="radio" data-param="<?php echo $value['choice3'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['choice3'] ?>" required><span>C.)&nbsp;&nbsp;</span><?php echo $value['choice3'] ?></label>
                           	</div>
                           	<div class="col-md-12 radio">
                           		
                           		 <label><input class="checked1" type="radio" data-param="<?php echo $value['answer'] ?>" data-param1="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" value="<?php echo $value['answer'] ?>" required><span>D.)&nbsp;&nbsp;</span><?php echo $value['answer'] ?></label>
                           	</div>



							<?php }     ?>  
				</div>
			 <?php endforeach ?>
				<div class="col-md-12"  style"margin-top:30px">
					<a href="/checked_ans/<?php echo $qid ?>" class="btn btn-primary pull-right">SUBMIT</a>
			 	</div>
	</div>
</div>

  </div>
</div>