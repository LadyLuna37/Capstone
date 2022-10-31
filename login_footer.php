<?php 

date_default_timezone_set("America/New_York");
echo '<footer style="position: fixed; left: 0; bottom: 0; width: 100%;background-color: whitesmoke;color: brown;text-align: center">
     <button  style="border: 2px solid brown;background-color:chocolate; width:100px; height: 50px; color: white; text-shadow:1px 1px 1px black" type ="submit"  onClick ="Logout()">LOGOUT</button> 
  
                    <script>
                        function Logout() {
                        var ask = window.confirm("Are you sure you want to Logout?");
                        if (ask) {
                            window.alert("You have successfully Logged Out");

                            window.location.href = "./logout.php";

                        }
                        }
                    </script><br>
This page was last modified on '.date("m-d-Y").' ' .date("h:i:sa").'<br>
<p>All rights reserved. Designed by <a href ="#">Lady Luna Coffee</a></p>
</footer>';




