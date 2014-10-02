<!DOCTYPE html>
<html>
	
<head>

	<title>BWSSB | UFW 0.1</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

<link href="css/styles.css" rel="stylesheet">

<!-- jQuery CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui-custom.css">

<!-- Dropzone CSS -->
<link rel="stylesheet" href="css/dropzone.css">

<!-- FontAwesome -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<style>
	
	html,
	body {
	  height: 100%;
	  /* The html and body elements cannot have any padding or margin. */
	}
	
	/* Wrapper for page content to push down footer */
	#wrap {
	  min-height: 100%;
	  height: auto;
	  /* Negative indent footer by its height */
	  margin: 0 auto -60px;
	  /* Pad bottom by footer height */
	  padding: 0 0 60px;
	}
	
	/* Set the fixed height of the footer here */
	#footer {
	  height: 60px;
	  background-color: #f5f5f5;
	}
	
	#btn-debug {
		/*
		position: absolute;
		right: 5px;
		*/
	}	
	
	#console-debug {
		position: absolute;
		top: 50px;
		left:0px;
		width:30%;
		height:700px;
		overflow-y:scroll;
		background-color: #FFFFFF;
		box-shadow: 2px 2px 5px #CCCCCC;
	}
	#console-debug pre {
		
		
	}
	
	.avatar-container {
		
		width: 100px;
		height: 100px;
		
		border-radius:3px;
		
		background-size: cover;
		background-position: center center;
		
		
	}
	
	
</style>	
	
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- jQuery UI -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- TinyMCE -->
<script src="js/tinymce/tinymce.min.js"></script>

<!-- Dropzone.js -->
<script src="js/dropzone.js"></script>


<script src="js/scripts.js"></script>


<script>
	
	$(document).ready(function() {
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		
		$(".btn-delete").on("click", function() {
			
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure you want to delete this page?");
			
			if(confirmed == true) {
				
				$.get("ajax/pages.php?id="+pageid);
				
				$("#page_"+pageid).remove();				
				
			}
			

			
			//alert(selected);
			
		})
		
		
		$("#sort-nav").sortable({
			cursor: "move",
			update: function() {
				var order = $(this).sortable("serialize");
				$.get("ajax/list-sort.php", order);
			}
		});
		
		
	}); // END document.ready();

	tinymce.init({
	    selector: ".editor",
	    theme: "modern",	    
	    plugins: [
	         "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
	   ],
	   content_css: "css/content.css",
	   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
	   style_formats: [
	        {title: 'Bold text', inline: 'b'},
	        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	        {title: 'Example 1', inline: 'span', classes: 'example1'},
	        {title: 'Example 2', inline: 'span', classes: 'example2'},
	        {title: 'Table styles'},
	        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	    ]
	 }); 
	
</script>	


</head>
	
<body>
	<div class="wrap">
	<nav class="navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">BWSSB</a>
      			<ul class="nav navbar-nav">
	
				<!--<li><a href="?page=ufw_current_month_view">View</a></li>-->
				<li><a href="?page=ufw_inlet_entry">Inlet</a></li>
				<li><a href="?page=ufw_consumption_entry">Consumption</a></li>
											<li><a href="?page=users">User Management</a></li>
						
				<li><a href="?page=change_password">Change Password</a></li>					
			</ul>
    </div>

		<div class="pull-right">
			<ul class="nav navbar-nav">
	
				<li>
											<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
									
				</li>	
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Rajendra K,SW2 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>

			</ul>
		</div>    
  </div>
</nav>



	

<div id="wrapper">
  <div id="sidebar-wrapper" class="col-md-1">
            <div id="sidebar">
                <ul class="nav list-group">
            	                	
                    <li>
                        <a class="list-group-item1" href="?page=ufw_consumption_entry&area_id=SW2DMA07&area_name=Banagiri Nagar"><i class="icon-home icon-1x"></i>Banagiri Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item2" href="?page=ufw_consumption_entry&area_id=SW2DMA10&area_name=Banashankari 2nd stage"><i class="icon-home icon-1x"></i>Banashankari 2nd stage</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item3" href="?page=ufw_consumption_entry&area_id=SW2DMA16&area_name=Bhuvaneshwari Nagar"><i class="icon-home icon-1x"></i>Bhuvaneshwari Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item4" href="?page=ufw_consumption_entry&area_id=SW2DMA06&area_name=Channammanakere"><i class="icon-home icon-1x"></i>Channammanakere</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item5" href="?page=ufw_consumption_entry&area_id=SW2DMA13&area_name=Dwaraka Nagar"><i class="icon-home icon-1x"></i>Dwaraka Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item6" href="?page=ufw_consumption_entry&area_id=SW2DMA14&area_name=Hosakerehalli"><i class="icon-home icon-1x"></i>Hosakerehalli</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item7" href="?page=ufw_consumption_entry&area_id=SW2DMA15&area_name=Ittamadu"><i class="icon-home icon-1x"></i>Ittamadu</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item8" href="?page=ufw_consumption_entry&area_id=SW2DMA12&area_name=Jayanagar 7th Block"><i class="icon-home icon-1x"></i>Jayanagar 7th Block</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item9" href="?page=ufw_consumption_entry&area_id=SW2DMA17&area_name=Kamkya Layout"><i class="icon-home icon-1x"></i>Kamkya Layout</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item10" href="?page=ufw_consumption_entry&area_id=SW2DMA04&area_name=Kathriguppe"><i class="icon-home icon-1x"></i>Kathriguppe</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item11" href="?page=ufw_consumption_entry&area_id=SW2DMA11&area_name=Shastri Nagar"><i class="icon-home icon-1x"></i>Shastri Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item12" href="?page=ufw_consumption_entry&area_id=SW2DMA03&area_name=Srinivasa Nagar"><i class="icon-home icon-1x"></i>Srinivasa Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item13" href="?page=ufw_consumption_entry&area_id=SW3DMA13&area_name=Thyagaraja Nagar"><i class="icon-home icon-1x"></i>Thyagaraja Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item14" href="?page=ufw_consumption_entry&area_id=SW2DMA01&area_name=Vidya Nagar"><i class="icon-home icon-1x"></i>Vidya Nagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item15" href="?page=ufw_consumption_entry&area_id=SW2DMA01&area_name=Vidyanagar"><i class="icon-home icon-1x"></i>Vidyanagar</a>
                    </li>
              	                	
                    <li>
                        <a class="list-group-item16" href="?page=ufw_consumption_entry&area_id=SW2DMA05&area_name=Vivekananda Nagar"><i class="icon-home icon-1x"></i>Vivekananda Nagar</a>
                    </li>
              	                    
                </ul>
            </div>
        </div>

	 


		<div id="main-wrapper" class="col-md-11 pull-right">
            <div id="main">
				<div class="page-header">
					<h4>Select an Area to enter the consumption quantities</h4>
				</div>
			</div>
		</div>							
            		
            	         
</div>

</div>

    <div class="footer">
      <div class="container">
        <p class="text-muted">Datastra Technologies LLP</p>
      </div>
    </div>
    

	<div id="console-debug">
	
			
		
<h1>GET</h1>
	
	<pre>			
Array
(
    [page] => ufw_consumption_entry
)
	
	</pre>
	
<h1>POST</h1>
	
	<pre>			
Array
(
)
	
	</pre>	

<h1>Page Array:</h1>	

	<pre>
ufw_consumption_entry			
	</pre>			
	
</div> 

	
</body>

</html>