<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$adminDetails = [
    'name' => $_SESSION['user_name'],
	];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRM Admin Panel</title>
   <link rel="stylesheet" href="adminmanager.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script> $(document).ready(function(){
  $('.mobnav h3').click(function(){
  $('.mobnav ul').toggle();
  });
  });
  </script>
  <style>
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
  padding: 25px 40px; /* Increased default padding for larger width */
  text-align: center;
  font-size: 1.5em; /* Slightly larger font size by default */
}
   
	 nav {
      display: flex;
      justify-content: center;
      background: #2c3e50;
      padding: 10px 0;
	  margin-bottom:5%;
    }
    nav ul {
	  display: flex; /* Makes the list items appear in a row */
	  list-style: none; /* Removes the default bullet points */
	  padding: 0; /* Removes default padding */
	  margin: 0; /* Removes default margin */
	}

	nav ul li {
	  margin: 0 15px; /* Adds spacing between list items */
	}

	nav ul li a {
	  text-decoration: none; /* Removes underline from links */
	  color: white; /* Keeps the text color white */
	  font-weight: bold; /* Makes the text bold */
	}

   
	.mobnav {display:none;}
	
	.mobnav ul li {width:100% ; display:block; padding:20px;}
	.mobnav ul li a { width:100%;}
	 footer {
      background: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px 0;
      width: 100%;
      margin-top: auto; /* Ensures footer stays at the bottom */
    }

    footer p {
      margin: 0;
      font-size: 0.9em;
    }

    footer a {
      color: #1abc9c;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

   
    .main-dashboard {
	
      padding: 2rem;
      backdrop-filter:blur(30px);
	  background:rgba(255,255,255,0.2);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
	  height: auto;
    }
    
	/* Stats Section */
.stats {
    display: flex;
    gap: 20px;
    margin: 20px 0;
}

.stat-card {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
	height:200px;
}

.stat-card .icon {
    font-size: 40px;
    color: #2a9d8f;
    margin-bottom: 10px;
}

.stat-card h3 {
    color: #444;
    margin-bottom: 10px;
}

.stat-card p {
    font-size: 24px;
    color: #2a9d8f;
    font-weight: bold;
}
		.frame{
		width:100px;
		height:100px;
		}
		video { 
			width: 100%; 
			 height: auto;
			}
		   
	 /* Media Queries */
    @media (max-width: 768px) {
      .main-dashboard {
        padding: 1rem;
      }
}
     @media screen and (max-width:600px){
	 
	 .mobnav {display:block }
	 nav ul{display:none;}
	 .stats {
    flex-direction: column;
    gap: 10px;
  }

  .stat-card {
    width: 100%;  /* Ensure each card takes full width */
    height: auto;  /* Allow height to adjust */
    padding: 10px;  /* Adjust padding for smaller screens */
  }

  .stat-card .icon {
    font-size: 20px;  /* Smaller icon size for mobile */
  }

  .stat-card h3 {
    font-size: 1em;  /* Slightly smaller heading */
  }

  .stat-card p {
    font-size: 0.8em;  /* Adjust font size for better readability */
  }
  .frame{
		width:50px;
		height:50px;
		}
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
    <h1>Welcome to the Admin Dashboard, <?php echo htmlspecialchars($adminDetails['name']); ?>!</h1>
  </header>
  
  <nav>   
    <ul>
      <li><a href="admin_dashboard.php">Dashboard</a></li>
      <li><a href="empdetails.php">Employees</a></li>
      <li><a href="viewreports.php">View Reports</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
	<div class="mobnav">
	<h3>Menu</h3>
	<ul>
      <li><a href="admin_dashboard.php">Dashboard</a></li>
      <li><a href="empdetails.php">Employees</a></li>
      <li><a href="viewreports.php">View Reports</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
	</div>
  </nav>

  
  
    <div class="main-dashboard">
      <!-- Stats -->
            <section class="stats">
                <div class="stat-card">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Total Employees</h3>
                    <p>150</p>
					<div class="frame"> 
    <video autoplay muted loop>
      <source src="customer.mp4" type="video/mp4"></video>
 </div>
                </div>
                <div class="stat-card">
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <h3>Attendance Rate</h3>
                    <p>90%</p>
					<div class="frame"> 
    <video autoplay muted loop>
      <source src="chart.mp4" type="video/mp4"></video>
 </div>
                </div>
                <div class="stat-card">
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Pending Tasks</h3>
                    <p>12</p>
					<div class="frame"> 
    <video autoplay muted loop>
      <source src="task.mp4" type="video/mp4"></video>
 </div>
                </div>
				<div class="stat-card">
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Pending Reviews</h3>
                    <p>5</p>
					<div class="frame"> 
    <video autoplay muted loop>
      <source src="rating.mp4" type="video/mp4"></video>
 </div>
                </div>
            </section>
    </div>
 <footer>
    <p>HRM System &copy; 2025</p>
    <p>
      <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="#">Support</a>
    </p>
  </footer>

</body>
</html>
