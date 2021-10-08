<?php

require_once("includes/db.php");
if (isset($_POST["Submit"])){
    if (!empty($_POST["student_name"])){
        $StudentName = $_POST["student_name"];
        $StudentEmail = $_POST["student_email"];
        $Password = $_POST["password"];
        $ClassID = $_POST["class_id"];
        global $ConnectingDB;
        $sql = "INSERT INTO student(student_name,student_email,password,class_id) 
        VALUES(:student_Name,:student_Email,:paassWord,:classId)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':student_Name',$StudentName);
        $stmt->bindValue(':student_Email',$StudentEmail);
        $stmt->bindValue(':paassWord',$Password);
        $stmt->bindValue(':classId',$ClassID);
        $Execute = $stmt->execute();
        if($Execute)
        {echo "Record has been Added successfully";}
    }else{
        echo "Please atleast Name and class id ";
    }
}


?>


<!DOCTYPE>

<html>
    <head>
        <title>Insert Data into Database</title>
        <link rel= "stylesheet" href="full/admin/includes/style.css">
    </head>
    <body>
        <div class="">
            <form class="" action="add-student.php" method="post">
                <fieldset>
                    <span class="FieldInfo">Student Name:</span>
                    <br>
                    <input type="text" name="student_name" value="">
                    <br>
                    <span class="FieldInfo">Student Email:</span>
                    <br>
                    <input type="text" name="student_email" value="">
                    <br>
                    <span class="FieldInfo">Password:</span>
                    <br>
                    <input type="text" name="password" value="">
                    <br>
                    <span class="FieldInfo">Class ID:</span>
                    <br>
                    <input type="text" name="class_id" value="">
                    <br><br>
                    <br><br>
                    <br><br>
                    <input type="submit" name="Submit" value="Submit">
            
                </fieldset>
            </form>
        </div>
    </body>
</html>