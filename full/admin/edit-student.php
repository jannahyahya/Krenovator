<?php

require_once("includes/db.php");
?>

<!DOCTYPE>

<html>
    <head>
        <title>View Student Data from Database</title>
        <link rel="stylesheet" href = "includes/style.css">
    </head>

    
    <body>
        
        <table width="1000" border = "5" align="center">
            <caption>view from database</caption>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Password</th>
                <th>Class ID</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            
<?php

global $ConnectingDB;
$sql = "SELECT * FROM student";
$stmt = $ConnectingDB->query($sql);
while ($DataRows=$stmt->fetch())
{
$StudentID=$DataRows["student_id"];
$StudentName=$DataRows["student_name"];
$StudentEmail=$DataRows["student_email"];
$StudentPassword=$DataRows["password"];
$ClassID=$DataRows["class_id"];

?>
<tr>
    <td><?php echo $StudentID; ?> </td>
    <td><?php echo $StudentName; ?> </td>
    <td><?php echo $StudentEmail; ?> </td>
    <td><?php echo $StudentPassword; ?> </td>
    <td><?php echo $ClassID; ?> </td>
    <td> <a href = "update-student.php?id=<?php echo $StudentID; ?>">Update</a> </td>
    <td> <a href = "delete-student.php?id=<?php echo $StudentID; ?>">Delete</a> </td>
</tr>
<?php } ?>
        </table>
        <div></div>
    </body>
</html>