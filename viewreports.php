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
  <title>View Reports - HRM Admin Panel</title>
   <link rel="stylesheet" href="adminmanager.css"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script> $(document).ready(function(){
  $('.mobnav h3').click(function(){
  $('.mobnav ul').toggle();
  });
  });
  </script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
	
	.container {
      width: 1000px;
      margin: 5px auto;
      padding: 20px;
     backdrop-filter:blur(30px);
	  background:rgba(255,255,255,0.2);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;

    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header h1 {
      color: #2a9d8f;
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
      font-size: 16px;
    }

    table thead {
      background: #2a9d8f;
      color: #ffffff;
    }

    table th, table td {
      text-align: left;
      padding: 12px 15px;
      border: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #f1f1f1;
      cursor: pointer;
    }

    .search-bar {
      margin-bottom: 10px;
      display: flex;
      justify-content: flex-end;
    }

    .search-bar input {
      padding: 8px 12px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .popup {
      display: none;
      position: absolute;
      background-color: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      padding: 10px;
      border-radius: 5px;
      z-index: 1000;
      font-size: 14px;
      color: #333;
    }
    
	@media (max-width: 1000px) {
  .container {
    width: 90%;
    padding: 20px;
  }

  nav ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  table th, table td {
    font-size: 15px;
    padding: 10px;
  }

  .search-bar input {
    width: 80%;
    font-size: 14px;
  }

  .mobnav {
    display: none; /* Keep hidden for medium screens */
  }

  footer p {
    font-size: 14px;
  }
}

	/* Media Queries */
@media (max-width: 768px) {
  nav ul {
    display: none;
    flex-direction: column;
  }

  .mobnav {
    display: block;
    text-align: center;
  }

  .container {
    width: 95%;
    padding: 15px;
  }

  .table-container {
    overflow-x: auto;
  }
}

@media (max-width: 600px) {
  nav ul li {
    flex: 1;
    text-align: left;
  }

  table th, table td {
    font-size: 14px;
    padding: 10px;
  }

  .search-bar input {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
  }

  .mobnav h3 {
    font-size: 18px;
   
  }

  footer p {
    font-size: 12px;
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
  
   <div class="container">
   
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterTable()">
    </div>

    <div class="table-container">
      <table id="reportTable">
        <thead>
          <tr>
            <th>Department</th>
            <th>Attendance (%)</th>
            <th>Performance</th>
            <th>Average Salary</th>
          </tr>
        </thead>
        <tbody>
          <tr data-popup="HR Department: High attendance rate with consistent performance.">
            <td>HR</td>
            <td>92%</td>
            <td>8.0</td>
            <td>$50,000</td>
          </tr>
          <tr data-popup="Finance Department: Balanced performance and salary distribution.">
            <td>Finance</td>
            <td>90%</td>
            <td>8.5</td>
            <td>$65,000</td>
          </tr>
          <tr data-popup="Engineering Department: Excellent performance metrics.">
            <td>Engineering</td>
            <td>85%</td>
            <td>9.0</td>
            <td>$75,000</td>
          </tr>
          <tr data-popup="Sales Department: Focus on improving performance.">
            <td>Sales</td>
            <td>88%</td>
            <td>7.5</td>
            <td>$45,000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="popup" id="popup"></div>
  </div>

  <script>
    function filterTable() {
      const input = document.getElementById('searchInput');
      const filter = input.value.toLowerCase();
      const table = document.getElementById('reportTable');
      const rows = table.getElementsByTagName('tr');

      for (let i = 1; i < rows.length; i++) { // Skip the header row
        const cells = rows[i].getElementsByTagName('td');
        let match = false;
        for (let j = 0; j < cells.length; j++) {
          if (cells[j].innerText.toLowerCase().includes(filter)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? '' : 'none';
      }
    }

    const rows = document.querySelectorAll('#reportTable tbody tr');
   
  </script>
  <footer>
    <p>HRM System &copy; 2025</p>
    <p>
      <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="#">Support</a>
    </p>
  </footer>
	 
</body>
</html>
