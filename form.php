<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>    
    <form action="save.php" method="post">
    <h1>Sign up</h1>
    <label for="txtname"></label>
    <input type="text" id="name" placeholder="Full name" name="user">
    <br><br>
    <label for="txtpass"></label>
    <input type="text"  id="class" placeholder="class" name="pas">

    <br><br>

    <button>Sign Up</button>
    </div>
     </form>
    
    <br><br>
    <table>
        <header><tr><td>ID</td><td>Name</td><td>class</td></tr></header>
        <tbody> 
        <?php
                    $con=mysqli_connect("localhost:3306","root","","db");
                    if(!$con){
                        die("Connection Failed:".mysqli_connect_error()); 
                    }
                    else{
                        $qry_show = "select * from std_info";
                        $qry_run = mysqli_query($con, $qry_show);
                        if (mysqli_num_rows($qry_run)) {
                        while ($row = mysqli_fetch_array($qry_run)) {            
        ?>
        <tr> 
            <td>
                <?php echo $row['ID']; ?> 

            </td>

            <td>
            <?php echo $row['Name']; ?>
            </td>

            <td>
            <?php echo $row['Class']; ?>
            </td>

            <td>
            <input type="submit" value="edit" name="edit">
            </td>

            <td>
            <input type="hidden" name="key"  value="<?php echo $row['ID'] ?>">
            <a href="form.php/?id=<?php echo $row['ID']?>"><input type="submit" value="delete" name="del"></a>   
        </td>

        </tr>
        <?php 
        // php closing bracket for while loop and if condition
                        }
                    }
                
                if(isset($_GET['id'])){
                $id = $_GET['id'];
                $delete = "delete from std_info where ID='$id'";
                $delRun = mysqli_query($con, $delete);
                if($delRun){?>
                    <script> 
                    alert("Data Deleted Successfully");
                    window.location.replace("http://localhost/form.php");
                    </script> <?php
                    
                }
                else{
                    echo "Error";
                }
            }
        }
                ?>
        </tbody>
    </table>

</body>
</html>
