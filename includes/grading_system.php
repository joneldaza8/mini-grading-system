<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>School Grading System</title>
    <style media="screen">
      body{
        background-color:#21252B;
      }
      .myform{
        text-align: center;
        position:absolute;
        top:5%;
        width:99%;
        font-family:century gothic;
        color:white;
      }
      input{
        background-color:transparent;
        border:1px solid grey;
        width:25%;
        padding:10px;
        color:white;
        font:14px century gothic;
        border-radius:5px;
      }
      input:focus{
        border:none;
	      border:2px solid white;
	      outline:none !important;
      }
      input:active{
	      border:none;
        border:1px solid transparent;
       }
      .button{
        cursor:pointer;
      }
      .button:hover{
        background-color:white;
        color:black;
      }
      .errs{
        font-family:monospace;
        position:absolute;
        text-align: right;
        top:40%;
        background-color:#fff;
        color:#000;
        width:25%;
        padding:1%;
        border-radius:5px;
        margin:5%;
      }
      .errs p{
        text-align: left;
      }
      .reveal{
        color:white;
        position: absolute;
        top:100%;
        font-family:century gothic;
        text-align: center;
      }
      table{
        padding:5%;
      }
      td{
        padding:2%;
        width:5%;
      }
    </style>
  </head>
  <body>
    <div class="myform">
      <h1>School Grading System</h1>
      <form class="gsystem" action="" method="post">
        <input type="text" name="name" placeholder="Enter students name"><br><br>
        <input type="text" name="calculus" placeholder="Calculus-Based Physics 1"><br><br>
        <input type="text" name="discrete" placeholder="Discrete Structures"><br><br>
        <input type="text" name="programming" placeholder="Object-oriented Programming"><br><br>
        <input type="text" name="algorithms" placeholder="Algorithms & Complexity"><br><br>
        <input type="text" name="application" placeholder="Application Lifecycle Management"><br><br>
        <input  class="button" type="submit" name="submit" value="submit"><br>
      </form>
      <div class="errs">
      <?php
      /*
      Grading system
      By Evans Wanjau
      */
      //Assigning variables
      if (isset($_POST['submit'])){

        function test_input($data) {
	         $data = trim($data);
	         $data = stripslashes($data);
	         $data = htmlspecialchars($data);
	         return $data;
	      }

        //Variables
        $nameErr = $calculusErr = $discreteErr = $programmingErr = $algorithmsErr = $applicationErr = "";
        $name = $calculus = $discrete = $programming = $algorithms = $application = "";

        //Students name assignment
        if(empty($_POST['name'])){
          $nameErr = "<p>You have not entered a students name</p>";
        }else {
          $name = test_input($_POST['name']);
        }

        //calculus
        if(empty($_POST['calculus'])){
          $calculusErr = "<p>You have not entered Calculus marks</p>";
        }else {
          $calculus = test_input(intval($_POST['calculus']));
        }

        //discrete
        if(empty($_POST['discrete'])){
          $discreteErr = "<p>You have not entered Discrete marks</p>";
        }else {
          $discrete = test_input(intval($_POST['discrete']));
        }

        //programming
        if(empty($_POST['programming'])){
          $programmingErr = "<p>You have not entered Programming marks</p>";
        }else {
          $programming = test_input(intval($_POST['programming']));
        }

        //algorithms marks
        if(empty($_POST['algorithms'])){
          $algorithmsErr = "<p>You have not entered Algorithms marks</p>";
        }else {
          $algorithms = test_input(intval($_POST['algorithms']));
        }

        //application marks
        if(empty($_POST['application'])){
          $applicationErr = "<p>You have not entered Application marks</p>";
        }else {
          $application = test_input(intval($_POST['application']));
        }

        $m = (intval($calculus) * 100) / 50;
        $e = (intval($discrete) * 100) / 50;
        $s = (intval($programming) * 100) / 50;
        $sc = (intval($algorithms) * 100) / 50;
        $ss = (intval($application) * 100) / 50;


        $total = $m + $e + $s + $sc + $ss;
        $t = ($total * 100) / 500;
        //Grading system
        function getGrade($value){
            if($value >= 80 && $value <= 100){
              $grade = 'A - Excellent';
            }
            elseif ($value >= 60 && $value < 80) {
              $grade = 'B - Very Good';
            }
            elseif ($value >= 40 && $value < 60) {
              $grade = 'C - Good';
            }
            elseif ($value >= 20 && $value < 40) {
              $grade = 'D - Fail';
            }
            elseif ($value >= 0 && $value < 20) {
              $grade = 'E - Jembe';
            }
            else {
              $grade = 'X - You did not do the exam';
            }
          return $grade;
          }

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "demo";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $grade = getGrade($t);

          if($name == true){
            $sql = "INSERT INTO students (name, calculus, discrete, programming, algorithms, application, total, grade)
            VALUES ('$name', '$calculus', '$discrete', '$programming', '$algorithms', '$application', '$t', '$grade')";

            if ($conn->query($sql) === TRUE) {
              echo "<p>Student: " . $name . '</p>';
              echo '<p>Calculus: '. $m . '</p><p>Discrete: ' . $e . '</p><p>Programming: ' . $s .'</p><p>Algorithms: '. $sc . '</p><p>application: ' . $ss . '</p>';
              echo '<p>' . intval($t) . '% ' . $grade . '</p>';
            }else{
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }else{
            echo $nameErr;
            echo $calculusErr;
            echo $discreteErr;
            echo $programmingErr;
            echo $algorithmsErr;
            echo $applicationErr;
          }


      }
       ?>
     </div>
    </div>
    <div class="reveal">
      <h1>Student's results</h1>
      <table border="1">
        <tr>
          <th>Student</th>
          <th>Calculus-Based Physics 1</th>
          <th>Discrete Structures</th>
          <th>Object-oriented Programming</th>
          <th>Algorithms & Complexity</th>
          <th>Application Lifecycle Management</th>
          <th>Total(%)</th>
          <th>Grade</th>
        </tr>
      <?php

      $sql2 = "SELECT * FROM students ORDER BY `total` DESC";
      $result = $conn->query($sql2);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["name"] . "</td><td>" . $row["calculus"] . "</td><td>" . $row["discrete"] . "</td><td>" . $row["programming"] . "</td><td>" . $row["algorithms"] . "</td><td>" . $row["application"] . "</td><td>" . $row["total"] . "</td><td>" . $row["grade"] . "</td></tr>";
      }
    }else{
        echo "No data to display";
      }

       ?>

     </table>
    </div>
  </body>
</html>