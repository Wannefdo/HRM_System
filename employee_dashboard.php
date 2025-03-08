<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

// Mock example: Replace this with a database query to fetch employee details
$employeeDetails = [
    'name' => $_SESSION['user_name'],
    'position' => 'Software Engineer', // Replace with actual data from the database
    'attendance' => ['presentDays' => 25, 'leaves' => 1], // Example values
    'payroll' => ['monthlySalary' => 5000, 'bonus' => 300], // Example values
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script> $(document).ready(function(){
  $('.mobnav h3').click(function(){
  $('.mobnav ul').toggle();
  });
  });
  </script>
   <link rel="stylesheet" href="adminmanager.css">
  <style>
    /* General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background-size: cover;
    }
	
	.video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .video-background video {
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      object-fit: cover;
	 
    }
	.video-background::after {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Adjust opacity (0.5) for desired darkness */
  z-index: 0; /* Ensure it stays above the video but below content */
}
	

    header {
      background: #34495e;
      color: #fff;
      padding: 25px;
      text-align: center;
      font-size: 1.5em;
    }

    

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }

   .card {
  backdrop-filter: blur(30px);
  background: rgba(255, 255, 255, 0.5); 
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  margin: 10px;
  padding: 20px;
  width: 300px;
  text-align: center;
  color:black;
}


    footer {
      background: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px 0;
      width: 100%;
      margin-top: auto;
    }

    footer a {
      color: #1abc9c;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
	 @media screen and (max-width:600px){
	 .container {width :100%;}
	 .mobnav {display:block }
	  nav ul{display:none;}
	 }
	  @media (max-width: 450px) {

    header h1 {
        font-size: 2rem;
    }
}

	@media (max-width: 350px) {
   
    header h1 {
        font-size: 1.5rem;
    }
}
  </style>
</head>
<body>

<div class="video-background">
 
    <video autoplay muted loop>
      <source src="emp.mp4" type="video/mp4">

      Your browser does not support the video tag.
    </video>

 </div>

  <header>
    <h1>Welcome to the Employee Dashboard, <?php echo htmlspecialchars($employeeDetails['name']); ?>!</h1>
  </header>

 <nav>   
    <ul>
      <li><a href="employee_dashboard.php">Profile</a></li>
      <li><a href="#">Contact</a></li>     
      <li><a href="logout.php">Logout</a></li>
    </ul>
	<div class="mobnav">
	<h3>Menu</h3>
	<ul>
      <li><a href="employee_dashboard.php">Profile</a></li>
      <li><a href="#">Contact</a></li>     
      <li><a href="logout.php">Logout</a></li>
    </ul>
	</div>
  </nav>


  <div class="container">
    <div class="card">
      <h2 style="color:white;">Profile</h2><br>
      <p>Name: <?php echo htmlspecialchars($employeeDetails['name']); ?></p>
      <p>Position: <?php echo htmlspecialchars($employeeDetails['position']); ?></p>
    </div>
    <div class="card">
      <h2 style="color:white;">Attendance</h2><br>
      <p>Present Days: <?php echo htmlspecialchars($employeeDetails['attendance']['presentDays']); ?></p>
      <p>Leaves: <?php echo htmlspecialchars($employeeDetails['attendance']['leaves']); ?></p>
    </div>
    <div class="card">
      <h2 style="color:white;">Payroll</h2><br>
      <p>Monthly Salary: $<?php echo htmlspecialchars($employeeDetails['payroll']['monthlySalary']); ?></p>
      <p>Bonus: $<?php echo htmlspecialchars($employeeDetails['payroll']['bonus']); ?></p>
    </div>
  </div>

  <footer>
    <p>HRM System &copy; 2025</p>
    <p>
      <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="#">Support</a>
    </p>
  </footer>
</body>
</html>
