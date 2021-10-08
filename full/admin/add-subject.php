<?php

require_once("includes/db.php");
if (isset($_POST["Submit"])){
    if (!empty($_POST["subject_name"])){
        $SubjectName = $_POST["subject_name"];
        $TeacherID = $_POST["teacher_id"];
        global $ConnectingDB;
        $sql = "INSERT INTO subject(subject_name,teacher_id) 
        VALUES(:subjectName,:teachertId)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':subjectName',$SubjectName);
        $stmt->bindValue(':teachertId',$TeacherID);
        $Execute = $stmt->execute();
        if($Execute)
        {echo "Record has been Added successfully";}
    }else{
        echo "Please atleast Subject Name and Teacher ID ";
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
            <form class="" action="add-subject.php" method="post">
                <fieldset>
                    <span class="FieldInfo">Subject Name:</span>
                    <br>
                    <input type="text" name="subject_name" value="">
                    <br>
                    <span class="FieldInfo">Teacher ID:</span>
                    <br>
                    <input type="text" name="teacher_id" value="">
                    <br><br>
                    <input type="submit" name="Submit" value="Submit">
            
                </fieldset>
            </form>
        </div>
    </body>
</html>