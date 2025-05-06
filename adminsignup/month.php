<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    // Query to get complaints per month
    $sql = "SELECT date, COUNT(*) AS total_complaints 
            FROM garbageinfo 
            GROUP BY date";
    $result = mysqli_query($con, $sql);
    $complaint_count = array();

    // Initialize an array to hold month-wise complaint counts
    $monthComplaints = array(
        "January" => 0,
        "February" => 0,
        "March" => 0,
        "April" => 0,
        "May" => 0,
        "June" => 0,
        "July" => 0,
        "August" => 0,
        "September" => 0,
        "October" => 0,
        "November" => 0,
        "December" => 0
    );

    // Fetch data from the database and populate month-wise complaint counts
    while ($row = mysqli_fetch_assoc($result)) {
        $date_string = $row['date'];
        $pattern = '/\b(?:January|February|March|April|May|June|July|August|September|October|November|December)\b/';
        if (preg_match($pattern, $date_string, $matches)) {
            $month_name = $matches[0];
            $monthComplaints[$month_name] += $row['total_complaints'];
        }
    }

    // Extract month names and complaint counts
    foreach ($monthComplaints as $month => $complaints) {
        $months[] = $month;
        $complaint_count[] = $complaints;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('your-image-path.jpg'); /* Add your image path here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .navbar {
            background-color: #007bff;
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: all 0.3s;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #4e5256;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .statistics-card, .graph-card {
            background-color: #007bff;
            color: #000; /* Changed text color to black */
            border-radius: 50px; /* Oval shape */
            padding: 20px;
        }
        canvas {
            border-radius: 50px; /* Oval shape for graph */
        }
    </style>
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
</nav>
<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fas fa-chart-bar"></i> Reports</a></li>
        <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
        <!-- Add more links as needed -->
    </ul>
</div>
<!-- Content -->
<div class="content">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <!-- Statistics -->
    <div class="card statistics-card">
        <div class="card-body">
            <h5 class="card-title">Statistics</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6>Total Complaints</h6>
                            <h4><?php echo isset($count) ? $count : 0; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6>Completed Complaints</h6>
                            <h4><?php echo isset($ccount) ? $ccount : 0; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6>Pending Complaints</h6>
                            <h4><?php echo isset($pcount) ? $pcount : 0; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Graph -->
    <div class="card graph-card">
        <div class="card-body">
            <h5 class="card-title">Complaints per Month</h5>
            <canvas id="complaintsPerMonthChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var months = <?php echo json_encode($months); ?>;
    var complaintCounts = <?php echo json_encode($complaint_count); ?>;
    
    var ctx = document.getElementById('complaintsPerMonthChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Number of Complaints',
                data: complaintCounts,
                backgroundColor: '#f8f9fa', // Changed graph background color to match statistics card
                borderColor: '#007bff',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
