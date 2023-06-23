<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grading</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student Grading PHP</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/student-grade.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="shortcut icon" href="assets/img/ronk1.jpg" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style22.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.0.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"><img src="assets/img/student-grade.png" alt="Logo" style="width:30px;height:30px;"></a>
      <h1 class="logo mr-auto"><a href="index.php">Student Grading System</a></h1> 
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li class="active"><a href="about.php">About</a></li>          
          <li class="active"><a href="totalgrade.php">Admin</a></li>
			  <!-- Log on to codeastro.com for more projects! -->
             
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->

</head>
<body>
  <br>
  <br>
  <br>

<?php
                    // Include config file
                    require_once "config.php";


  // Attempt select query execution
$sql = "SELECT * FROM students";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '<table class="table table-bordered table-striped">';
            echo "<tr>";
            echo '<tr class="bg-danger">';
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>calculus</th>";
                echo "<th>discrete</th>";
                echo "<th>programming</th>";
                echo "<th>algorithms</th>";
                echo "<th>applicaton</th>";
                echo "<th>total</th>";
                echo "<th>grade</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>"; 
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['calculus'] . "</td>";
                    echo "<td>" . $row['discrete'] . "</td>";
                    echo "<td>" . $row['programming'] . "</td>";
                    echo "<td>" . $row['algorithms'] . "</td>";
                    echo "<td>" . $row['application'] . "</td>";
                    echo "<td>" . $row['total'] . "</td>";
                    echo "<td>" . $row['grade'] . "</td>";
                echo "</tr>";
            }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

    
</body>
</html>

