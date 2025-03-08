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
  <title>Employee Details - HRM Admin Panel</title>
   <link rel="stylesheet" href="adminmanager.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script> $(document).ready(function(){
  $('.mobnav h3').click(function(){
  $('.mobnav ul').toggle();
  });
  });
  </script>
  <style>
  
   /* Employee Table */
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
	  height:auto;
    }
	




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
	 @media (max-width: 620px) {
     .task-manager {
      padding: 1rem; 
      margin-bottom: 1rem; 
     }

	  table {
		font-size: 0.8rem; 
	  }
	}
	@media (max-width: 505px) {
      .task-manager {
			padding: 0.8rem; /* Reduce padding */
			margin-bottom: 0.8rem; /* Reduce margin */
		  }

	  table {
		font-size: 0.5rem; /* Smaller font size for smaller screens */
	  }
    }
	@media (max-width: 380px) {
    .task-manager {
        padding: 0.4rem; /* Reduce padding further */
        margin-bottom: 0.4rem; /* Reduce margin further */
    }

    table {
        font-size: 0.3rem; /* Reduce font size for better readability */
    }

    input[type="text"], input[type="email"], input[type="text"] {
        width: 100%; /* Make input fields take full width */
        height: 28px; /* Adjust height to fit smaller screens */
        margin-bottom: 10px; /* Add space between inputs */
    }

    .add-btn {
        width: 100%; /* Make the button full width */
        padding: 12px; /* Increase padding for easier clicking */
    }

    .mobnav ul {
        padding-left: 10px; /* Add some padding */
    }

    nav ul {
        display: none; /* Hide the navigation menu on very small screens */
    }

    .mobnav h3 {
        font-size: 18px; /* Make the mobile navigation heading larger */
    }

    .edit-btn, .delete-btn {
        font-size: 0.7rem; /* Reduce the size of the buttons */
        padding: 4px 8px; /* Make buttons smaller */
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
   
     <div class="task-manager">
        
          <section id="adding">
            
          <form>
            <input type="text" id="name" name="name" placeholder="Employee Name" aria-label="Employee Name" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);" required />
            <input type="email" id="email" name="email" placeholder="Employee Email" aria-label="Employee Email" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);"  required />
            <input type="text" id="department" name="department" placeholder="Department" aria-label="Department" style="height:30Px;border-radius:5px;width:250px;text-align:center;border: 1px solid #2a9d8f;box-shadow: 0 0 4px rgba(42, 157, 143, 0.5);" required />
            <button class="add-btn">Add Employee</button>
          </form>
       </section>
  
      
        <section id="employees">
               
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>EMP001</td>
                            <td>Jane Doe</td>
                            <td>jane.doe@example.com</td>
                            <td>HR</td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>EMP002</td>
                            <td>John Smith</td>
                            <td>john.smith@example.com</td>
                            <td>IT</td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
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
