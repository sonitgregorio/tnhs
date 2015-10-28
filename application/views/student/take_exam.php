<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="panel panel-default">
		<div class=" header_styles" style="padding:15px" >
			Examination      
			<?php 
			 $qid;
			 $rand=rand(0,3);
			 ?>      	
		</div>
		<div class="panel-body">
            <?php echo $this->session->flashdata('message') ?>

				<form>

			<?php foreach ($this->studentmd->get_take_exam($qid) as $key => $value): ?>
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
					<form method="post" action="/checked_ans/"<?php $qid ?>>
						 <input class="btn btn-primary pull-right" type="submit" />
					</form>
			 		</div>
		      </form>
	</div>
</div>

  </div>
</div>