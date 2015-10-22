<script src="../assets/js/jquery.js"></script>
<!-- <script src="../assets/js/moment.min.js"></script> -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- <script src="../assets/js/bootstrap-datepicker.js"></script> -->
<!-- <script src="../assets/js/user.js"></script> -->

<script type="text/javascript">
	$(document).ready(function(){
		 $('.form_submit').submit(function(){
         $.post("/student/insert_stud", $(this).serialize(), function(data){
         	if (data > 0) {
         		document.location = '/student'
         	}
         	else{
         		 $('#reg_student').html(data);
         	};
             
         });
		});
		 $('.mod').click(function(){
		 	$x = $(this).data('param');
		 	$.post("/student/select_data/"+$(this).data('param'), function(data){
		 		// alert(data);
		 		$('#add_student').modal('show');
		 	});
		 });

});
</script>


</body>
</html>
