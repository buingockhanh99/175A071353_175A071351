$(document).ready(function() {
    $('#btn1').click(function() {
      $.ajax({
      	type:'post',
      	url:'monhoc.php',
      	data:{user:'khanh',pass:'abc'},
      	success: function(data){
      		alert(data);
      	}
      })
    });


    // $('#btn1').click(function() {
    //    	$("#ip3").hide();
    // });

<?php 

$user = $_POST['user']
?>


});