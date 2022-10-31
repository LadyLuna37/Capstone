<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name ="description" content ="Our Coffee is Heavenly!">
<title>Luna Coffee - Employee Reorder</title>
<link rel="stylesheet" href="homepage.css"/>
<script src="https://kit.fontawesome.com/9b44d189ed.js" crossorigin="anonymous"></script>
<style>
    .btnAdd{
        background-color: brown;
        border: 2px solid white;
        color: white;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
}
     
.btnAdd:hover{
    background-color: whitesmoke ;
    color: brown;
    border: brown 2px solid;
</style>
</head>
<?php include "employee_header.php";?>

<body>
    <br><br><br><br><br>
 <blockquote>
        <form  action="" method ="post" class="form" enctype="multipart/form-data" style ="text-align: center; border:4px solid chocolate; background-color:#4b3621; background: rgba(0, 0, 0, 0.5); color:white; width:50%">
            <div class="add">
               <div class="clearfix">
               
                   <h1 style="text-align: center;font-size: 20px; color: white; background-color: brown; border: 2px solid #ffffff; width: auto">Reorder Request</h1>
                    
                 <label>Reorder Product 1 :&nbsp;&nbsp;&nbsp;</label><br>
                   <select name="reorder1" >
                    <option>Select Product</option><br><br>
                    <option value="Cafe Latte">Cafe Latte</option>
                    <option value="Irish Cream Breve">Irish Cream Breve</option>
                     <option value="Cappuccino">Cappuccino</option>
                    <option value="Mexi Mocha Latte">Mexi-Mocha Latte</option>
                     <option value="Salted Caramel Mocha">Salted Caramel Mocha"</option>
                     </select>
                    <input style="text-align: center" type="number" name="quantity" placeholder="0"/><br><br>
           
                <label>Reorder Product 2 :&nbsp;&nbsp;&nbsp;</label><br>
                    <select name="reorder2" >
                    <option>Select Product</option>
                    <option value="Cafe Latte">Cafe Latte</option>
                    <option value="Irish Cream Breve">Irish Cream Breve</option>
                     <option value="Cappuccino">Cappuccino</option>
                    <option value="Mexi Mocha Latte">Mexi-Mocha Latte</option>
                     <option value="Salted Caramel Mocha">Salted Caramel Mocha"</option>
                     </select> 
                    <input style="text-align: center" type="number" name="quantity" placeholder="0"/><br><br>
          
                 <label>Reorder Product 3 :&nbsp;&nbsp;&nbsp;</label><br>
                    <select name="reorder3" >
                    <option>Select Product</option>
                    <option value="Cafe Latte">Cafe Latte</option>
                    <option value="Irish Cream Breve">Irish Cream Breve</option>
                     <option value="Cappuccino">Cappuccino</option>
                    <option value="Mexi Mocha Latte">Mexi-Mocha Latte</option>
                     <option value="Salted Caramel Mocha">Salted Caramel Mocha"</option>
                     </select>  
                 <input style="text-align: center" type="number" name="quantity" placeholder="0"/><br><br>
      
                <label>Reorder Product 4 :&nbsp;&nbsp;&nbsp;</label><br>
                    <select name="reorder4" >
                    <option>Select Product</option>
                    <option value="Cafe Latte">Cafe Latte</option>
                    <option value="Irish Cream Breve">Irish Cream Breve</option>
                     <option value="Cappuccino">Cappuccino</option>
                    <option value="Mexi Mocha Latte">Mexi-Mocha Latte</option>
                     <option value="Salted Caramel Mocha">Salted Caramel Mocha"</option>
                     </select>
                    <input style="text-align: center" type="number" name="quantity" placeholder="0"/><br><br>
                 
                 <label>Reorder Product 5 :&nbsp;&nbsp;&nbsp;</label><br>
                    <select name="reorder5<br><br>" >
                    <option>Select Product</option>
                    <option value="Cafe Latte">Cafe Latte</option>
                    <option value="Irish Cream Breve">Irish Cream Breve</option>
                     <option value="Cappuccino">Cappuccino</option>
                    <option value="Mexi Mocha Latte">Mexi-Mocha Latte</option>
                     <option value="Salted Caramel Mocha">Salted Caramel Mocha</option>
                     </select>
                    <input style="text-align: center" type="number" name="quantity" placeholder="0"/><br><br><br>             
                   <div class="clearfix">
                       <button type="submit" name="reorder_product"  class="button">Send Reorder Request</button><br><br> 
                   </div>
               </div>
                </div>
            </form>   
    </blockquote>
  
   
</body>
</html>  
<?php include "login_footer.php";
