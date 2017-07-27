<?php 
include 'db.php';
?>
<html>
<head>
	<title>TECHBOX</title>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Jquery js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>
<body class="back-img">
	<div class="main_content">	
		<div class="content">
			<div class="col-md-offset-4 col-md-4 back_white login_dev">
				<form method="POST" action="loginController.php" id="form">
					<!-- User name -->
					<div class="alert alert-warning hide" style="text-align: center"></div>
					<div class="form-group pmd-textfield">
						<label for="email" class="control-label pmd-input-group-label">Username</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
							<input type="email" class="form-control" name="email" id="email" required>
						</div>
					</div>

					<!-- Password -->
					<div class="form-group pmd-textfield">
						<label for="password" class="control-label pmd-input-group-label">Password</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>
							<input type="password" class="form-control" name="password" id="password" required>
						</div>
					</div>
					<div class="form-group pmd-textfield">
						<input type="submit" name="login" value="Login" class="btn btn-primary pull-right">
					</div>
				</form>		
			</div>	
		</div>
	</div>
</body>
<footer>
  	<div class="footer">
      	<p class="uppercase "> copy reight resrved for khalid Hamza</p> 
    </div>
</footer>
<!-- Propeller textfield js -->
<script type="text/javascript" src="http://propeller.in/components/textfield/js/textfield.js"></script>
<!-- Sidebar js -->
<script type="text/javascript" language="javascript" src="http://propeller.in/components/sidebar/js/sidebar.js"></script>
<!-- Propeller Dropdown js -->
<script type="text/javascript" language="javascript" src="http://propeller.in/components/dropdown/js/dropdown.js"></script>
<!-- Propeller ripple effect js -->
<script type="text/javascript" language="javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
</html>
<script>
$(document).ready(function(){
	$("#form").validate();
});
</script>
<script type="text/javascript">
	$(document).ready( function() {		
		$('form').submit(function(e){
			e.preventDefault;			
			var data   = $('#form').serialize();		
			var action = $('#form').attr('action');
			$.ajax({
				url: action ,				
				type:'post',
				data:data,
				success:function(result){
					var response 	= jQuery.parseJSON(result);
					var msg = response.msg;
					var go  = response.go;
					var success  = response.success;
					if(success == true){
						$('.alert').text(msg);
						$('.alert').removeClass('hide');																
						setTimeout(function(){
						    window.location.href= go;				    
						}, 1000);						
					}else{
						$('.alert').text(msg);
						$('.alert').removeClass('hide');
						$('#email').focus(function(){
								$('.alert').text('');
								$('.alert').addClass('hide');							
						});
						$('#password').focus(function(){
								$('.alert').text('');
								$('.alert').addClass('hide');							
						});														
					}	
				}
			});
			return false;
		});
	});	
</script>
