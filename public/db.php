<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "exam_stc";
$password = "Aa@112233@aA";
$dbname = "exam_stc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `exams_tmp`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo  $row["Question"]. "<br>";

        

            if($row['Ans1']!=""){
                if($row['Result']==1){ $answer=1; }else{  $answer=0;  }
                $sql1= "INSERT INTO `mcq_answer` (`Answer`, `Question_ID`, `Is_Right`) VALUES ('".stripslashes($row['Ans1'])."','".$row['ID']."','".$answer."')";

                if ($conn->query($sql1) === TRUE) {
                  echo "<br><br><br><br> New record created successfully<br><br><br><br>";
                } else {
                  echo "<br><br><br><br>Error1 Error " . $sql1 . "<br>" . $conn->error."<br><br><br><br>";
                }

            }

            if($row['Ans2']!=""){
                if($row['Result']==2){ $answer=1; }else{  $answer=0;  }
                $sql2= "INSERT INTO `mcq_answer` (`Answer`, `Question_ID`, `Is_Right`) VALUES ('".stripslashes($row['Ans2'])."','".$row['ID']."','".$answer."')";

                if ($conn->query($sql2) === TRUE) {
                  echo "<br><br><br><br> New record created successfully<br><br><br><br>";
                } else {
                  echo "<br><br><br><br>Error2 Error " . $sql2 . "<br>" . $conn->error."<br><br><br><br>";
                }

            }




            if($row['Ans3']!=""){
                if($row['Result']==3){ $answer=1; }else{  $answer=0;  }
                $sql3= "INSERT INTO `mcq_answer` (`Answer`, `Question_ID`, `Is_Right`) VALUES ('".stripslashes($row['Ans3'])."','".$row['ID']."','".$answer."')";

                if ($conn->query($sql3) === TRUE) {
                  echo "<br><br><br><br> New record created successfully<br><br><br><br>";
                } else {
                  echo "<br><br><br><br>Error3 Error " . $sql3 . "<br>" . $conn->error."<br><br><br><br>";
                }

            }





            if($row['Ans4']!=""){
                if($row['Result']==4){ $answer=1; }else{  $answer=0;  }
                $sql4= "INSERT INTO `mcq_answer` (`Answer`, `Question_ID`, `Is_Right`) VALUES ('".stripslashes($row['Ans4'])."','".$row['ID']."','".$answer."')";

                if ($conn->query($sql4) === TRUE) {
                  echo "<br><br><br><br> New record created successfully<br><br><br><br>";
                } else {
                  echo "<br><br><br><br>Error4 Error " . $sql4 . "<br>" . $conn->error."<br><br><br><br>";
                }

            }



            if($row['Ans5']!=""){
                if($row['Result']==5){ $answer=1; }else{  $answer=0;  }
                $sql5= "INSERT INTO `mcq_answer` (`Answer`, `Question_ID`, `Is_Right`) VALUES ('".stripslashes($row['Ans5'])."','".$row['ID']."','".$answer."')";

                if ($conn->query($sql5) === TRUE) {
                  echo "<br><br><br><br> New record created successfully<br><br><br><br>";
                } else {
                  echo "<br><br><br><br>Error5 Error " . $sql5 . "<br>" . $conn->error."<br><br><br><br>";
                }

            }



    }
    
    






} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>