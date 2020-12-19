<!DOCTYPE HTML>
<html>
<html lang="en">
  <head>
    <base href="http://localhost/m/Frontend/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Sky - Homepage 2</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="assets/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="assets/plugins/revolution/css/navigation.css">

    <!-- Custom-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
<body class="ps-loading">
<?php require_once 'header.php'; ?>

<div class="main-content">
    <div class="container">
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
      <?php endif; ?>
    </div>
    <!--    hiển thị nội dung động -->
  <?php echo $this->content; ?>
</div>


<?php require_once 'footer.php'; ?>

</body>

</html>