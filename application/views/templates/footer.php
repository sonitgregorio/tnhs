<script src="../assets/js/jquery.min.js"></script>
<!-- <script src="../assets/js/moment.min.js"></script> -->
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<!-- <script src="../assets/js/user.js"></script> -->

<script type="text/javascript">
	$(document).ready(function(){

		 $('.form_submit').submit(function(){

         $.post("/student/insert_stud", $(this).serialize(), function(data){
         	
         	if (data > 0) 
         	{
         		document.location = '/student';
         	}
         	else
         	{
         		 $('.reg_student').html(data);
         	}
         });   

		});	

});
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$('.mod').click(function(){
		 	x = $(this).data('param');
		 	$.post("/student/select_data", {x}, function(data){
		 		// alert(data);
		 		$('.reg_student').html(data);
		 	});
		 });
			$('#mods').click(function(){
				x = $(this).data('param');
				$('input[name=classid]').val(x);
				$('#addstudent').modal('show')
			});

			$('.face').click(function(){
				x= $(this).data('param');
				$.post("/faculty/select_data", {x}, function(data){
					$('.faculty_reg').html(data);
				});
			});


			$('.fac_submits').submit(function(){
				$.post("/faculty/insert_faculty", $(this).serialize(), function(data){
					if (data > 0) {
						document.location = '/faculty';
					}else{
						$('.faculty_reg').html(data);
					}
				});
			})

			$('#example').DataTable();

			$('#section').change(function(){
				x = $('#section').val();
				$.post("/faculty/get_sub_byid", {x}, function(data){
					$('#select_this').html(data);

				});
			});

			$('.ac_exam').click(function(){
				x = $(this).data('param');
				$('input[name=examid]').val(x);
				$('#exams').modal('show');
			});
			
		
			$('.checked1').click(function(){
				ans = $(this).data('param');
				qid = $(this).data('param1');
				// x=$('input[name=che]:checked').val(); 
				// alert(ans +"|"+ qid);

				$.post("/faculty/insert_insert_answers", {ans, qid}, function(data){
						// alert(data);
				});
			});
		

			$('.view_vid').click(function(){
				x = $(this).data('param');
	
				$path = '../assets/lessons/'+x;
				// alert($path);
				$('#vids').attr('src', $path);
				$('#view_videos').modal('show');
			});
			

		});





</script>


</body>
</html>
