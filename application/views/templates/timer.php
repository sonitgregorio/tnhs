<script>
	$(document).ready(function(){
			h = $('input[name=h]').val();
			m = $('input[name=m]').val();
			$("#hm_timer").countdowntimer({
	                hours : h,
	                minutes : m
		});
	});
	
</script>