<script src="../assets/js/jquery.min.js"></script>
<!-- <script src="../assets/js/moment.min.js"></script> -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- <script src="../assets/js/bootstrap-datepicker.js"></script> -->
<!-- <script src="../assets/js/user.js"></script> -->

<script type="text/javascript">
	$(document).ready(function(){

		 $('.form_submit').submit(function(){

         $.post("/student/insert_stud", $(this).serialize(), function(data){
         	
         	if (data > 0) 
         	{
         		document.location = '/student'
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
		});

</script>


</body>
</html>
