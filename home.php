<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
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
    <form action="home.php" method="POST">
	 <div class="contact" id="contact">
	 <p>Personal Details: </p>
       <div class="max-width">
         <div class="contact-content">
		 
	      <div class="column right">
						<label for="fullname">Full Names</label>
                        <div class="field">
                            <input type="text" name="fullname" required>
                        </div>
						<br>
						<label for="email">Email</label>
						<div class="field">
                            <input type="email" name="email" required>
                        </div>
						<br>
						<label for="dob">Date of Birth</label>
						<div class="field">
                            <input type="date" name="dob" required>
                        </div>
						<br>
                        <div class="field">
						<label for="cell_no">Contact Number</label>
						<br>
                            <input type="text" name="cell_no" required>
                        </div>
                        
                    </div>
                </div>
			   </div>
			</div>
	  <br>
	  <br>
	  <br>
	    What is your favorite food? 
		<input type="checkbox" name="food" value="Pizza"> Pizza
		<input type="checkbox" name="food" value="Pasta"> Pasta
		<input type="checkbox" name="food" value="Pap_and_Wors"> Pap and Wors
		<input type="checkbox" name="food" value="Other"> Other
		
		<br>
	   <br>
        <br>
		<br>
       <h4>Please rate your level of agreement on a scale from 1 to 5, with being "strongly agree" and 5 being "strongly disagree"</h4>
        <br>
		<table>
            <tr>
                <th></th>
                <th>Strongly Agree</th>
                <th>Agree</th>
                <th>Neutral</th>
                <th>Disagree</th>
                <th>Strongly Disagree</th>
            </tr>
            <tr>
                <td>I like to watch movies</td>
                <td><input type="radio" name="movies" value="Strongly Agree"></td>
                <td><input type="radio" name="movies" value="Agree"></td>
                <td><input type="radio" name="movies" value="Neutral"></td>
                <td><input type="radio" name="movies" value="Disagree"></td>
                <td><input type="radio" name="movies" value="Strongly Disagree"></td>
            </tr>
            <tr>
                <td>I like to listen to radio</td>
                <td><input type="radio" name="radio" value="Strongly Agree"></td>
                <td><input type="radio" name="radio" value="Agree"></td>
                <td><input type="radio" name="radio" value="Neutral"></td>
                <td><input type="radio" name="radio" value="Disagree"></td>
                <td><input type="radio" name="radio" value="Strongly Disagree"></td>
            </tr>
            <tr>
                <td>I like to eat out</td>
                <td><input type="radio" name="eat_out" value="Strongly Agree"></td>
                <td><input type="radio" name="eat_out" value="Agree"></td>
                <td><input type="radio" name="eat_out" value="Neutral"></td>
                <td><input type="radio" name="eat_out" value="Disagree"></td>
                <td><input type="radio" name="eat_out" value="Strongly Disagree"></td>
            </tr>
            <tr>
                <td>I like to watch TV</td>
                <td><input type="radio" name="watch_tv" value="Strongly Agree"></td>
                <td><input type="radio" name="watch_tv" value="Agree"></td>
                <td><input type="radio" name="watch_tv" value="Neutral"></td>
                <td><input type="radio" name="watch_tv" value="Disagree"></td>
                <td><input type="radio" name="watch_tv" value="Strongly Disagree"></td>
            </tr>
        </table>
		<br>
		<br>
        <div class="button-area">
          <button type="submit" name="submit">SUBMIT</button>
       </div>
	   
    </form>
  </section>
</body>
</html>


<?php
$servername = "localhost";
$username = "root"; // Change these to your MySQL credentials
$password = "";
$dbname = "survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(isset($_POST['submit'])) //if register button is clicked
{
	
	
		
		if(!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty($_POST['cell_no']) && !empty($_POST['food']) && !empty($_POST['movies']) && !empty($_POST['radio']) && !empty($_POST['eat_out']) && !empty($_POST['watch_tv']))
		{
            //grab info from the fields
            $fullname = $_POST['fullname'];
            $email = $_POST['email'] ;
            $dob =  $_POST['dob'];
            $cell_no = $_POST['cell_no'];
            $food =   $_POST['food'];
            $movies =  $_POST['movies'];
            $radio = $_POST['radio'];
            $eatout =  $_POST['eat_out'];
            $watch_tv =  $_POST['watch_tv'];

            // Calculate the difference between the birth date and the current date
            $diff = date_diff(date_create($dob), date_create());

            // Get the year difference
            $age = $diff->format('%y');
            if($age < 5 || $age > 120)
            {
				 ?>
					<script>
						swal({
						  title: "Request Failure!",
						  text: "Your age must not be less than 5 and should not be more than 120.",
						  type: "warning",
						 // timer: 6000,
						  showConfirmButton: true
						}, function(){
							  window.location.href = "home.php";
						});
					</script>
				<?php					 
  
            }else
            {
                $sql="INSERT INTO survey (fullnames, email, dob, cell_no, favoriteFood, watchMovies,listenRadio, eatOut, watchTV) VALUES ('$fullname','$email','$dob','$cell_no','$food','$movies','$radio','$eatout','$watch_tv')"; //insert a record to db
                $result=mysqli_query($conn, $sql);
                
                   if($result){
                     ?>
                     <script>
                         swal({
                           title: "Survey Success!",
                           text: "Thank you for submitting your survey.",
                           type: "success",
                          // timer: 6000,
                           showConfirmButton: true
                         }, function(){
                               window.location.href = "home.php";
                         });
                         
                     
                     </script>
                     <?php
                     
                   }
                   else{
                     
                     ?>
					<script>
						swal({
						  title: "Request Failure!",
						  text: "Something went wrong, please try again.",
						  type: "warning",
						 // timer: 6000,
						  showConfirmButton: true
						}, function(){
							  window.location.href = "home.php";
						});
					</script>
				    <?php					 
                }
            }      					
        
		}
        else
        {
			
			 ?>
					<script>
						swal({
						  title: "Request Failure!",
						  text: "Please fill or select all the fields",
						  type: "warning",
						 // timer: 6000,
						  showConfirmButton: true
						}, function(){
							  window.location.href = "home.php";
						});
					</script>
				    <?php
        }
	}
	

?>



