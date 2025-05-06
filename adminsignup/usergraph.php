<?php
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    $sql = "SELECT name, COUNT(*) AS total_complaints FROM garbageinfo GROUP BY name";
    $result = mysqli_query($con, $sql);
    $username = array();
    $complaint_count = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $username[] = $row['name'];
        $complaint_count[] = $row['total_complaints'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Compaint vs Location</title>
    <link rel="stylesheet" href="adminsignup/assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet"> <!-- Add your custom CSS file here -->
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admindash.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="">
    <h2>Number of complaints for each user</h2><br><br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg">
                    <h1>Complaint vs user</h1>
                </div>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
                
            </div>
           
        </div>
    </div><br><br>
     

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 
<script>
        var ctx = document.getElementById('chartjs_bar').getContext('2d');
        var chartjs_bar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($username); ?>,
                datasets: [{ 
                    label: 'total compaint',
                    data: <?php echo json_encode($complaint_count); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Changed graph color
                    borderColor: 'rgba(255, 99, 132, 1)',
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
                },
                // Centering the graph
                layout: {
                    padding: {
                        left: 50,
                        right: 50,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    </script>

</body>
</html>
<?php
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    $sql = "SELECT name,
            SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS pending_complaints,
            SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) AS completed_complaints
            FROM garbageinfo
            GROUP BY name";
    $result = mysqli_query($con, $sql);
    $username = array();
    $pending_complaints = array();
    $completed_complaints = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $username[] = $row['name'];
        $pending_complaints[] = $row['pending_complaints'];
        $completed_complaints[] = $row['completed_complaints'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Complaints Overview</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="">
    <h2>Number of completed and pending complaints for each user</h2><br><br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg">
                    <h1>Complaint vs user</h1>
                </div>
                <div class="card-body">
                    <canvas id="complaintsChart"></canvas>
                </div>
                
            </div>
           
        </div>
    </div><br><br>
     

</div>

    <script>
        var ctx = document.getElementById('complaintsChart').getContext('2d');
        var complaintsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($username); ?>,
                datasets: [{
                    label: 'Pending Complaints',
                    data: <?php echo json_encode($pending_complaints); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Changed graph color
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Completed Complaints',
                    data: <?php echo json_encode($completed_complaints); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Changed graph color
                    borderColor: 'rgba(54, 162, 235, 1)',
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
                },
                // Centering the graph
                layout: {
                    padding: {
                        left: 50,
                        right: 50,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    </script>
</body>
</html>

