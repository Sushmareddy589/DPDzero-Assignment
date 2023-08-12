
<?php
require "../config.php";

try {
    $query = "SELECT employee_id,emp_name,emp_email,emp_username FROM employees";
    $prepared = $conn->prepare($query);
    $prepared->execute();
    $result = $prepared->fetchAll(PDO::FETCH_ASSOC);
?>
    <!DOCTYPE html>
    <html>
    <table border="1" cellpadding="10" cellspacing="0">

 

        <head>
            <title>Employees_list</title>

        </head>

        <body>
            <div>
            <div align="center">
                <a href="http://localhost/sample/users/add_users.php">
                    Register
                </a>
                <br>
                <br>
            </div>
                <div>
                    <table border="1px">
                        <thead>
                            <td>
                                Emp ID
                            </td>
                            <td>
                                Emp Name
                            </td>
                            <td>
                                Emp Email
                            </td>
                            <td>
                                Emp Username
                            </td>
                            <td>
                                action
                            </td>



                        </thead>  
                        <tbody>

                            <tr>
                                <?php
                                $sn = 1;
                                foreach ($result as $data) {

                                ?>
                            <tr>

                                <td><?php echo $data['employee_id']; ?> </td>
                                <td><?php echo $data['emp_name']; ?> </td>
                                <td><?php echo $data['emp_email']; ?> </td>
                                <td><?php echo $data['emp_username']; ?> </td>
                                <td>
                                    <a href="delete_user.php?employee_id=<?php echo $data['employee_id']; ?>">delete </a>
                                    <a href="update_user.php?employee_id=<?php echo $data['employee_id']; ?>">update</a>
                                </td>
                            </tr>

                        <?php
                                }
                        ?>
                    </table>
                <?php
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
                ?>
                </tr>




                </tbody>
    </table>
    </div>

    </div>

    </body>

    </html>
