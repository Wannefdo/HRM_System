<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$managerDetails = [
    'name' => $_SESSION['user_name'],
	];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRM manager</title>
   <link rel="stylesheet" href="adminmanager.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script> $(document).ready(function(){
  $('.mobnav h3').click(function(){
  $('.mobnav ul').toggle();
  });
  });
  </script>
  <style>
  
  
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

table thead {
    background-color: #2a9d8f;
    color: white;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table tr:hover {
    background-color: #f4f4f9;
}

.edit-btn, .delete-btn , .add-btn{
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

.edit-btn {
    background-color: #f4a261;
    color: white;
}

.edit-btn:hover {
    background-color: #e76f51;
}

.delete-btn {
    background-color: #e63946;
    color: white;
}

.delete-btn:hover {
    background-color: #c92536;
}

	 .task-manager {
      padding: 2rem;
      backdrop-filter:blur(20px);
	  background:rgba(255,255,255,0.2);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      margin-bottom: 2rem;
	  width: 100%; /* Make it responsive */
	  box-sizing: border-box; /* Include padding in the width */
    }
	/* General Form Styling */





/* Submit Button Styling */
.add-btn {
    padding: 10px 15px;
    background-color: #2a9d8f;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-btn:hover {
    background-color: #21867a;
}


/* Responsive Design */
@media (max-width: 768px) {
    .employee-form {
        width: 90%;
        padding: 15px;
    }
}

   
	/* Media Queries */
    @media (max-width: 768px) {
      .main-dashboard {
        padding: 1rem;
      }

     @media screen and (max-width:600px){
	 .container {width :100%;}
	 .mobnav {display:block }
	  nav ul{display:none;}
	 }
	 @media (max-width: 540px) {
     .task-manager {
      padding: 1rem; 
      margin-bottom: 1rem; 
     }

	  table {
		font-size: 0.8rem; 
	  }
	}
	@media (max-width: 450px) {
      .task-manager {
			padding: 0.8rem; /* Reduce padding */
			margin-bottom: 0.8rem; /* Reduce margin */
		  }

	  table {
		font-size: 0.5rem; /* Smaller font size for smaller screens */
	  }
    }
	 @media (max-width: 350px) {
	  .task-manager {
		padding: 0.5rem; 
		margin-bottom: 0.5rem; 
	  }

		  table {
			font-size: 0.4rem; 
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
    <h1>Welcome to the Manager Dashboard, <?php echo htmlspecialchars($managerDetails['name']); ?>!</h1>
  </header>
  
  <nav>   
    <ul>
      <li><a href="manager_dashboard.php">Tasks</a></li>
      <li><a href="emp.php">Employees Profile</a></li>     
      <li><a href="logout.php">Logout</a></li>
    </ul>
	<div class="mobnav">
	<h3>Menu</h3>
	<ul>
      <li><a href="manager_dashboard.php">Tasks</a></li>
      <li><a href="emp.php">Employees Profile</a></li>     
      <li><a href="logout.php">Logout</a></li>
    </ul>
	</div>
  </nav>
   
     <div class="task-manager">
        
          <section id="adding">
            
          <form>
            <input type="text" id="name" name="name" placeholder="Task Title" aria-label="Employee Name" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);" required />
            <input type="email" id="email" name="email" placeholder="Assignee Name" aria-label="Employee Email" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);"  required />
            <input type="Date" id="department" name="department" placeholder="Due Date" aria-label="Department" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);" required />
          
            <button class="add-btn">Assign Task</button>
          </form>
       </section>
  
      
        <section id="employees">
               
                <table>
                    <thead>
                        <tr>
                         <th>Task</th>
						<th>Assignee</th>
						<th>Due Date</th>
						<th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>Prepare Monthly Report</td>
            <td>John Doe</td>
            <td>2024-12-31</td>
            <td>In Progress</td>
                        </tr>
                        <tr>
                           <td>Organize Team Meeting</td>
            <td>Jane Smith</td>
            <td>2024-12-25</td>
            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
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
