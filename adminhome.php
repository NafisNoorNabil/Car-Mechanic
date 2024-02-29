

<?php

require_once('DBconnect.php');
$query="select name,carcount, maxcar, id from mechanic";
$result= mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li ><a class="underline" href="homepage.html">Home</a></li>
            <li ><a class="underline" href="homepage.html">Bookings</a></li>
            
        </ul>
    </nav>
    <h1>Mechanic Information</h1>


<form action="adminhome.php" method="post">
    <table class="tableclass">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Maximum Cars</th>
            <th>Remove Mechanic</th>
            <th>Add</th>
            <th>Remove</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['maxcar'];?></td>
            <td>
                <button class="button" type="submit" name="action" value="delete_<?php echo $row['id']; ?>">Remove</button>
            </td>
            <td>
                <button class="addbutton" type="submit" name="action" value="add_<?php echo $row['id']; ?>">Add Car</button>
            </td>
            <td>
                <button class="removebutton"  type="submit" name="action" value="remove_<?php echo $row['id']; ?>">Remove Car</button>
            </td>
        </tr>

        
        <?php } ?>
        <?php
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
            $parts = explode('_', $action);
            $action_type = $parts[0];
            $mechanic_id = $parts[1];
        

            
            // Delete the mechanic from the database if the action is "delete"
            if ($action_type == "delete") {
                $sql = "DELETE FROM mechanic WHERE id = $mechanic_id";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Mechanic deleted successfully";
                    header("Location: adminhome.php");
                } else {
                    echo "Error deleting mechanic: " . mysqli_error($conn);
                }
            }

            if ($action_type == "add") {
                $sql = "UPDATE mechanic SET maxcar=maxcar+1  WHERE id = $mechanic_id";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Mechanic deleted successfully";
                    header("Location: adminhome.php");
                } else {
                    echo "Error deleting mechanic: " . mysqli_error($conn);
                }
            }

            if ($action_type == "remove") {
                $sql = "UPDATE mechanic SET maxcar=maxcar-1  WHERE id = $mechanic_id";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Mechanic deleted successfully";
                    header("Location: adminhome.php");
                } else {
                    echo "Error deleting mechanic: " . mysqli_error($conn);
                }
            }
            
            // Close the database connection
            
        }
        ?>
    </table>
</form>




<form action="adminhome.php" method="post" class="formclass">
        <label for="name">Mechanic Name</label>
        <input type="text" id="name" name="mechanicname">
        <label for="carcount">Max Car </label>
        <input type="text" id="price" name="carcount">
        <button type="submit">Add</button>
</form>
    
    <?php
    if(isset($_POST['mechanicname']) && isset($_POST['carcount'])){
        $mechanicname = $_POST['mechanicname'];
        $carcount = $_POST['carcount'];
        $sql = "INSERT INTO mechanic ( name, maxcar) VALUES ('$mechanicname', '$carcount')";
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location: adminhome.php");
        }
    }
?>



























<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $parts = explode('_', $action);
    $license = $parts[2];
    $new_date = $_POST['new_date_' . $license];
    $new_mechanic = $_POST['new_mechanic_' . $license];

    // get the old mechanic's name
    $old_mechanic_query = "SELECT mechanicname FROM booking WHERE license='$license'";
    $old_mechanic_result = mysqli_query($conn, $old_mechanic_query);
    $old_mechanic_row = mysqli_fetch_assoc($old_mechanic_result);
    $old_mechanic = $old_mechanic_row['mechanicname'];

    // decrease the carcount for the old mechanic
    $old_mechanic_query = "UPDATE mechanic SET carcount=carcount-1 WHERE name='$old_mechanic'";
    mysqli_query($conn, $old_mechanic_query);

    // increase the carcount for the new mechanic
    $new_mechanic_query = "UPDATE mechanic SET carcount=carcount+1 WHERE name='$new_mechanic'";
    mysqli_query($conn, $new_mechanic_query);

    // update the booking table
    $query = "UPDATE booking SET date='$new_date', mechanicname='$new_mechanic' WHERE license='$license'";
    mysqli_query($conn, $query);
    header("Location: adminhome.php");
    exit();
}
?>
<form action="adminhome.php" method="post">
    <table class="tableclass">
        <h1 class="mechhead">Bookings</h1>
        <tr>
            <th>Client</th>
            <th>Phone</th>
            <th>Registration No</th>
            <th>Appointment</th>
            <th>Mechanic</th>
            <th>Change Mechanic</th>
        </tr>
        <?php
        $query = "SELECT name, phone, license, date, mechanicname FROM booking";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>


                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['license']; ?></td>
                <td>
                    <input class="bookdate" type="date" name="new_date_<?php echo $row['license']; ?>"
                           value="<?php echo $row['date']; ?>">
                </td>
                <td>
                    <select class="selection" name="new_mechanic_<?php echo $row['license']; ?>">
                        <?php
                        $mechanics_query = "SELECT name FROM mechanic WHERE carcount < maxcar";
                        $mechanics_result = mysqli_query($conn, $mechanics_query);
                        while ($mechanic_row = mysqli_fetch_assoc($mechanics_result)) {
                            $selected = ($mechanic_row['name'] == $row['mechanicname']) ? 'selected' : '';
                            echo "<option value='" . $mechanic_row['name'] . "' $selected>" . $mechanic_row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <button class="button" type="submit" name="action"
                            value="change_mechanic_<?php echo $row['license']; ?>">Change
                    </button>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</form>


</body>
</html>