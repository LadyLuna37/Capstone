<?php session_start();?>
<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee</title>
<link rel="stylesheet" href="homepage.css"/>
<style>
    p{
    color:white;
    text-shadow: 2px 2px 4px black;
    font-weight:bold;
    font-size: 18px;
}
</style>
</head>
<!-- about us header  --> 
 <?php include "header.php";?>

<body>
    
     <!-- about us summary  --> 
    <?php
    
   echo "<blockquote><p> Luna Coffee was established in 2001 in University Place, WA. Founder, bean roaster, and professional barista Luna Scott has
        dedicated a significant portion of her life to assisting in providing the perfect cup of coffee to her local community.</p></blockquote> <br/><br/>";?>  
     
     <!-- about us photo  --> 
<?php echo "<center><a><img src='Coffee_Heaven.jpeg'/></a><br/><br/></center><p style='text-align: center'>Here at Luna Coffee, we guarantee a heavenly experience with every sip!</p>"; ?>
 
  
    
</body>

<!-- about us footer  --> 
<?php include 'footer.php';?>
</html>