
<?php

require_once("includes/db.php");
if (isset($_POST["Submit"])){
    if (!empty($_POST["teacher_name"])){
        $TeacherName = $_POST["teacher_name"];
        $SubjectID = $_POST["subject_id"];
        global $ConnectingDB;
        $sql = "INSERT INTO teacher(teacher_name,subject_id) 
        VALUES(:teacherName,:subjectId)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':teacherName',$TeacherName);
        $stmt->bindValue(':subjectId',$SubjectID);
        $Execute = $stmt->execute();
        if($Execute)
        {echo "Record has been Added successfully";}
    }else{
        echo "Please atleast Name and subject_id ";
    }
}


?>
    

<!DOCTYPE>
<html>
    <head>
        <title>Insert Data into Database</title>
        <link rel= "stylesheet" href="admin/includes/style.css">
    </head>
    <body>
        <div class="">
            <form class="" action="add-teacher.php" method="post">
                <fieldset>
                    <span class="FieldInfo">Teacher Name:</span>
                    <br>
                    <input type="text" name="teacher_name" value="">
                    <br>
                    <span class="FieldInfo">Subject ID:</span>
                    <br>
                    <input type="text" name="subject_id" value="">
                    <br><br>
                    <input type="submit" name="Submit" value="Submit">
            
                </fieldset>
            </form>
        </div>
    </body>
</html>