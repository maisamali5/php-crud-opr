<?php
     $con=mysqli_connect("localhost:3306","root","","std_db");
     if(!$con){
        die("Connection Failed:".mysqli_connect_error()); 
     }
     else{
         $name = $_POST['user'];
         $class = $_POST['pas'];

         $insert= "insert into std_info (Name,Class) values ('$name','$class')";
         $run = mysqli_query($con, $insert);

         if($run){
            ?>
            <script>
                  alert("Data Inserted Successfully");
                  window.location.replace("http://localhost/form.php");
            </script>
            <?php
         }
         else{
             echo "Error";
         }}

    ?> 
