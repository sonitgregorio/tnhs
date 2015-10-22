$(function() {
    $(".delStudent").click(function(){
//Save the link in a variable called element
        var element = $(this);
//Find the id of the link that was clicked
        var del_id = element.attr("id");
//Built a url to send
        var info = 'id=' + del_id;
        if(confirm("Sure you want to delete this Student? There is NO undo!"))
        {
            $.ajax({
                type: "GET",
                url: "trash/delete-student.php",
                data: info,
                success: function(){
                }
            });
            $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "slow")
                .animate({ opacity: "hide" }, "slow");
//                confirm("Successfully Deleted!")
        }
        return false;
    });


    $('.res').click(function(e){
         $img = $(this).data('param');
         $('#qid').val($img);
         $('#quiz_activate').modal('show');
         e.preventDefault();
       });
});