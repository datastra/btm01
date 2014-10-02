<?php
// Javascript;




?>

<!-- JQuery -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- JQuery UI  -->
		<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		

		<script src="js/bootstrap-table.js"></script>
		
		<script src="js/tinymce/tinymce.min.js"></script>		
		
<script>
	
	$(document).ready(function(){
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			
			$("#console-debug").toggle();
		});
		
		
	});
	
$("#imgtag img").click(function(e) { // make sure the image is clicked
  var imgtag = $(this).parent(); // get the div to append the tagging list
  mouseX = ( e.pageX - $(imgtag).offset().left ) - 50; // x and y axis
  mouseY = ( e.pageY - $(imgtag).offset().top ) - 50;
  $( '#tagit' ).remove( ); // remove any tagit div first
  //insert an input box with save and cancel operations.
  $( imgtag ).append( '<div id="tagit"><div class="box"></div><div class="name"><div class="text">Type any name or tag</div><input type="text" name="txtname" id="tagname" /><input type="button" name="btnsave" value="Save" id="btnsave" /><input type="button" name="btncancel" value="Cancel" id="btncancel" /></div></div>' );
  $( '#tagit' ).css({ top:mouseY, left:mouseX });
   
  $('#tagname').focus();
});
	
</script>