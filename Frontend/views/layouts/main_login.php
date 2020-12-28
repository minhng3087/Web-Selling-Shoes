<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <title>AdminLTE 2 | Dashboard</title> -->
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
    <!-- Bootstrap 3.3.7 -->
    <!-- <link rel="stylesheet" href="../Backend/assets/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../Backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Backend/assets/css/bootstrap.min.css"> -->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/css/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main_login.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">


    <!-- Main css -->
  
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    
        folder instead of downloading all of them to reduce the load. -->
        
    <!-- <link rel="stylesheet" href="assets/css/_all-skins.min.css"> -->
    <!-- Google Font -->
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body>
<div class="wrapper container">

    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>>
    </section>

    <?php echo $this->content; ?>
</div>
<!-- ./wrapper -->
	
<!--===============================================================================================-->
<script  type="text/javascript" src="assets/js/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/bootstrap/js/popper.js"></script>
	<script  type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/daterangepicker/moment.min.js"></script>
	<script  type="text/javascript" src="assets/js/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script  type="text/javascript" src="assets/js/main_login.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>




</body>
</html>
