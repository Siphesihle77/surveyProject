
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Calculating the total number of surveys and calculate average age
$sql1 = "SELECT * FROM survey";
$query1 = $conn->query($sql1);
$totalSurvey = $query1->num_rows;
if($totalSurvey == 0)
{
    ?>
    <script>
        swal({
          title: "Request Failure!",
          text: "No Surveys Available!",
          type: "warning",
         // timer: 6000,
          showConfirmButton: true
        }, function(){
              window.location.href = "home.php";
        });
    </script>
<?php
}
else
{
    $totalAge = 0;
    while($row=$query1->fetch_assoc())
    {
    $dob = $row['dob'];
    $diff = date_diff(date_create($dob), date_create());
    // Get the year difference
    $age = $diff->format('%y');

    $totalAge = $totalAge + $age;
    
    }
    $averageAge = round(($totalAge / $totalSurvey), 1);


    //Oldest person and Youngest people
    $sql2 = "SELECT dob FROM survey";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $ages = array();
        
        // Calculate age for each person and store it in an array
        while ($row1 = $result->fetch_assoc()) {
            $dob = $row1["dob"];
            $age = date_diff(date_create($dob), date_create())->y;
            $ages[] = $age;
        }
        
        // Find the maximum age and minimum age
        $oldestAge = max($ages);
        $youngestAge = min($ages);
    }


    //Get total number of people who like Pizza
    $sql = "SELECT * FROM survey WHERE favoriteFood = 'Pizza'";
    $query = $conn->query($sql);
    $totPizza = $query->num_rows;
    $percentagePizza = round((($totPizza / $totalSurvey) * 100), 1);

    //Get total number of people who like Pasta
    $sqll = "SELECT * FROM survey WHERE favoriteFood = 'Pasta'";
    $queryl = $conn->query($sqll);
    $totPasta = $queryl->num_rows;
    $percentagePasta = round((($totPasta / $totalSurvey) * 100), 1);

    //Get total number of people who like Pap and Wors
    $sql3 = "SELECT * FROM survey WHERE favoriteFood = 'Pap_and_Wors'";
    $query3 = $conn->query($sql3);
    $Pap_and_Wors = $query3->num_rows;
    $percPap_and_Wors = round((($Pap_and_Wors / $totalSurvey) * 100), 1);

     //Get average ratings for eat out
     $sql4 = "SELECT * FROM survey WHERE eatOut IN ('Strongly Agree', 'Agree')";
     $query4 = $conn->query($sql4);
     $eatOut = $query3->num_rows;
     $eatOutAvg = round(($eatOut / $totalSurvey), 1);

     //Get average ratings for listening radio
     $sql5 = "SELECT * FROM survey WHERE listenRadio IN ('Strongly Agree', 'Agree')";
     $query5 = $conn->query($sql5);
     $radio = $query5->num_rows;
     $radioAvg = round(($radio / $totalSurvey), 1);

     //Get average ratings for watch movies
     $sql6 = "SELECT * FROM survey WHERE watchMovies IN ('Strongly Agree', 'Agree')";
     $query6 = $conn->query($sql6);
     $movies = $query6->num_rows;
     $moviesAvg = round(($movies / $totalSurvey), 1);

     //Get average ratings for watch tv
     $sql7 = "SELECT * FROM survey WHERE watchTV IN ('Strongly Agree', 'Agree')";
     $query7 = $conn->query($sql7);
     $watchtv = $query7->num_rows;
     $watchtvAvg = round(($watchtv / $totalSurvey), 1);

   
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Survey</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<style>
	body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}



h4 {
    text-align: left;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 2px solid #3c8dbc;
}

th {
    background-color: #888;
}

input[type="radio"] {
	border: 2px solid #3c8dbc;
    width: 15px;
    height: 15px;
}

button {
    display: block;
    margin: 0 auto;
}

.button-area button{
  color: #fff;
  display: block;
  width: 160px!important;
  height: 45px;
  outline: none;
  font-size: 18px;
  font-weight: 500;
  /*border-radius: 6px; */
  cursor: pointer;
  flex-wrap: nowrap;
  background: #3c8dbc;
  border: 2px solid #3c8dbc;
  transition: all 0.3s ease;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="tel"] {
    width: 100%;
    padding: 10px;
    border: 2px solid #3c8dbc;
    border-radius: 5px;
    outline: none;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="date"]:focus,
input[type="tel"]:focus {
border-color: #007bff;

}

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="date"]::placeholder,
input[type="tel"]::placeholder {
color: #999;
}




</style>
</head>
<body>
     <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#"><span><b>_Surveys</b></span></a></div>
            <ul class="menu">
                <li><a href="home.php" class="menu-btn">FILL OUT SURVEY</a></li>
                <li><a href="viewSurvey.php" class="menu-btn">VIEW SURVEY RESULTS</a></li>
                
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
	<section>
    <br>
	<br>
	<br>
    <br>
	<br>
	<br>
    <?php
    if($totalSurvey == 0)
        {
            ?>
            <script>
                swal({
                title: "Request Failure!",
                text: "No Surveys Available!",
                type: "warning",
                // timer: 6000,
                showConfirmButton: true
                }, function(){
                    window.location.href = "home.php";
                });
            </script>
        <?php
        }
        else
        {
            ?>
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Survey Results</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text"></div>
                    <p> </p>
                    <div class="icons">
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"></div>
                                <div class="sub-title">Total number of surveys :</div>
                            </div>
                        </div>
                        
						<div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"></div>
                                <div class="sub-title">Average Age :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">Oldest person who participated in survery :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">Youngest person who participated in survery :</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">Percentage of people who like Pizza :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">Percentage of people who like Pasta :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">Percentage of people who like Pap and Wors :</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">People who like to watch movies :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">People who like to listen to radio :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">People who like to eat out :</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title">People who like to watch TV :</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    
                <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"></div>
                                <div class="sub-title"><?php echo $totalSurvey; ?></div>
                            </div>
                        </div>
                        
						<div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"></div>
                                <div class="sub-title"> <?php echo  $averageAge; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $oldestAge; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $youngestAge;  ?></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $percentagePizza; ?>%</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $percentagePasta;  ?>%</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $percPap_and_Wors; ?>%</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $moviesAvg; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $radioAvg; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $eatOutAvg; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <i class=""></i>
                            <div class="info">
                                <div class="head"><span class=""></span></div>
                                <div class="sub-title"><?php echo $watchtvAvg; ?></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


    <?php
      }
    ?>
    </body>
</html>

