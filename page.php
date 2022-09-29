<?php
  include('Customer/config/config.php');
?>
<head>
    <title>Makaan - Real Estate HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/fontawesome-free-6.1.1/css/all.min.css">
    <style>
      .container{
        text-align:center;
      }
      .page{      
        display: inline-block; 
        margin-top:20px;
        
      }
    .page-item{
      margin-top: 20px;
      border: 4px solid #355C7D;
      padding: 2px 9px;
      color: #0dcaf0;
      border-radius: 50%;
      }
      .current-page{
          background: #3cccac;
          color: #FFF;
      }
    </style>
</head>
<div class="container">
<?php
  if($current_page > 3){
    $firt_page = 1;
?>
  <a class="fa-solid fa-house" href="?per_page=<?=$item_per_page?>&page=<?=$firt_page?>"></a>
  <?php
  }
  if($current_page > 1 ){
    $back_page = $current_page - 1;?>
     <a style="padding: 0 8px 0 8px;" class="fa-solid fa-angle-left" href="?per_page=<?=$item_per_page?>&page=<?=$back_page?>"></a>
  <?php
  }
  ?>
<?php
    for ($num = 1; $num <= $totalpage; $num++) {
?>
  <div class="page">
  <?php
  if ($num != $current_page) {
  ?>
    <?php if ($num > $current_page - 2 && $num < $current_page + 2) { ?>
    <a class="page-item" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
    <?php } ?>
  <?php } else { ?>
    <strong class="current-page page-item"><?=$num?></strong>
  <?php } ?>
  </div>
<?php } 
  if($current_page < $totalpage - 1 ){
    $next_page = $current_page + 1;?>
     <a style="padding: 0 8px 0 8px;" class="fa-solid fa-angle-right" href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>"></a>
  <?php
  }
  ?>
</div>


