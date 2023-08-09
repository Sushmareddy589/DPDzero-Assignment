<?php
require "../config.php";
$stmt = $conn->prepare("SELECT employee_id,emp_name,emp_email,emp_username,Age,Gender FROM employees");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


?> 
<!DOCTYPE html>
<html>

<body>

            <div align="center">
                <a href="http://localhost/sample/users/add_users.php">
                    Register
                </a>
                <br>
                <br>
            </div>
    <table border="1px">
        <thead>
            <td>
                Emp ID
            </td>
            <td>
                Emp Name
            </td>
            
            <td>
                Emp Username
            </td>
            
            <td>
                action
            </td>



        </thead>

        <tbody>


            <?php
        // checking wether data found
            if ($stmt->fetch()) {

              // printing user data
                while ($data = $stmt->fetch()) {

            ?>
                    <td>

                        <tr><?php echo $data['employee_id']; ?> </tr>
                        <tr><?php echo $data['emp_name']; ?> </tr>
                        <tr><?php echo $data['emp_email']; ?> </tr>
                        <tr><?php echo $data['emp_username']; ?> </tr>
                       
                        <tr>
                            <a href="update_user.php?employee_id=<?php echo $data['employee_id']; ?>">update</a>
                            <a href="delete_user.php?employee_id=<?php echo $data['employee_id']; ?>">delete </a>

                        </tr>
                    </td>
        </tbody>
<?php
                }
            } 
            else {
                echo " User not Found !!";
            }
?>
    </table>

</body>




</html>