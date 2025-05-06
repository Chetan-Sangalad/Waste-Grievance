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
<?php
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    $sql = "SELECT * FROM garbageinfo";
    $result = mysqli_query($con, $sql);
    $n = $k = $u = $b =$p= 0; // Initializing variables
    while ($row = mysqli_fetch_array($result)) {
        $t = $row['location'];
        if ($t == 'nitte') {
            $n++;
        } elseif ($t == 'karkala') {
            $k++;
        } elseif ($t == 'udupi') {
            $u++;
        } elseif($t == 'belman'){
            $b++;
        }
        else {
            $p++;
        }
    }
    $location = ['nitte', 'belman', 'karkala', 'udupi','padubidri']; // Define as a simple array
    $complaint = [$n, $b, $k, $u,$p]; // Define as a simple array
    $max=max($n, $b, $k, $u,$p);
    if($max==$n){
        $loc="nitte";
    }
    if($max==$b){
        $loc="belman";
    }
    if($max==$k){
        $loc="karkala";
    }
    if($max==$u){
        $loc="udupi";
    }
    if($max==$p){
        $loc="padubidri";
    }
    
   
}
?>
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
<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    // Query to get complaints per month
    $sql = "SELECT * FROM garbageinfo";
    $user= " SELECT count(*) from garbageinfo group by name";
    $u="SELECT * from garbageinfo group by location";
    $result1 = mysqli_query($con, $user);
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $u);
    $tcount=$count1=$count2=0;
    $ccount=$pcount=0;
    while ($ro1 = mysqli_fetch_array($result2)) {
        $count2++;
    }
    while ($ro = mysqli_fetch_array($result1)) {
        $count1++;
    }
    while ($row = mysqli_fetch_array($result)) {
            $tcount++;
            if($row['status']=='Completed'){
                $ccount++;
            }
            else $pcount++;
    }
}
?>
<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'testing');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    // Query to fetch review counts for each user rating
    $sql_review_counts = "SELECT user_rating, COUNT(*) AS count FROM review_table WHERE user_rating BETWEEN 1 AND 5 GROUP BY user_rating";
    $result_review_counts = mysqli_query($con, $sql_review_counts);
    
    // Initialize an array to hold review counts
    $review_counts = array_fill(1, 5, 0); // Initialize counts for ratings 1 to 5
    
    // Fetch review counts from the database and store them in the array
    while ($row_review_count = mysqli_fetch_assoc($result_review_counts)) {
        $user_rating = $row_review_count['user_rating'];
        $count = $row_review_count['count'];
        $review_counts[$user_rating] = $count;
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
            background-color: skyblue;
            background-image: url('your-image-path.jpg'); /* #343a40 #007bff Add your image path here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .navbar {
            background-color: skyblue;
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .sidebar {
            background-color: #343a40;
            color: black;
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
            background-color: #fff;
            color: #000; /* Changed text color to black */
            border-radius: 50px; /* Oval shape */
            padding: 20px;
        }
        canvas {
            border-radius: 30px; /* Oval shape for graph */
            width: 400px; /* Set the width */
            height: 200px; /* Set the height */
        }
        .graph-card canvas {
    width: 100% !important;
    height: auto !important;
    max-width: 400px;
    max-height: 200px;
}

   
    
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
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
        <li><a href="http://localhost/cscorner/waste-management-system-main/waste-management-system-main/index.html"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="index.php"><i class="fas fa-chart-bar"></i> total complaint</a></li>
        <li><a href="complete.php"><i class="fas fa-chart-bar"></i>completed complaint</a></li>
        <li><a href="pending.php"><i class="fas fa-chart-bar"></i>pending complaint</a></li>
        <li><a href="userinfo.php"><i class="fas fa-chart-bar"></i>total user</a></li>
        <li><a href="location.php"><i class="fas fa-chart-bar"></i>total locations</a></li>
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
                            <h4><?php echo $tcount ?></h4>
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
    <!-- Graphs -->
    <div class="row">
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">Complaints per Month</h5>
                <canvas id="complaintsPerMonthChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">Complaint Graph</h5>
                <canvas id="complaintsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">complaint per month</h5>
                <canvas id="complaintsPieChart1"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">pending vs completed</h5>
                <canvas id="complaintsPieChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">Complaints vs Location</h5>
                <canvas id="chartjs_bar"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card graph-card">
            <div class="card-body">
                <h5 class="card-title">Users review</h5>
                <canvas id="pieChart"></canvas>
            </div>
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
                backgroundColor: '#007bff', // Changed graph background color to match statistics card
                borderColor: 'gray',
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

    var pieData = {
        labels: ["Pending Complaints", "Completed Complaints"],
        datasets: [{
            label: 'Complaints Status',
            data: [<?php echo json_encode($pcount); ?>, <?php echo json_encode($ccount); ?>],
            backgroundColor: [
                '#626fe6',
                '#8aacff'
            ],
            borderColor: [
                'gray',
                'gray'
            ],
            borderWidth: 1
        }]
    };

    var ctx2 = document.getElementById('complaintsPieChart').getContext('2d');
    var myPieChart = new Chart(ctx2, {
        type: 'pie',
        data: pieData
    });
</script>
<script>
        var ctx = document.getElementById('complaintsChart').getContext('2d');
        var complaintsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($username); ?>,
                datasets: [{
                    label: 'Pending Complaints',
                    data: <?php echo json_encode($pending_complaints); ?>,
                    backgroundColor: '#007bff', // Changed graph color
                    borderColor: '#007bff',
                    borderWidth: 1
                },
                {
                    label: 'Completed Complaints',
                    data: <?php echo json_encode($completed_complaints); ?>,
                    backgroundColor: 'violet', // Changed graph color
                    borderColor: 'gray',
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

    // Pie Chart
    var pieData = {
        labels: months,
        datasets: [{
            label: 'Complaints per Month',
            data: complaintCounts,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray',
                'gray'
               
            ],
            borderWidth: 1
        }]
    };

    var ctx = document.getElementById('complaintsPieChart1').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: pieData
    });
</script>
 
<!-- Debugging output -->
<script>
    console.log(<?php echo json_encode($review_counts); ?>);
</script>

<!-- Chart initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ratings = ["1 ⭐", "2 ⭐", "3 ⭐", "4 ⭐", "5 ⭐"];
    var reviewCounts = <?php echo json_encode(array_values($review_counts)); ?>;
    var colors = [
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 159, 64, 0.5)',
        'rgba(255, 205, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(54, 162, 235, 0.5)'
    ];

    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ratings,
            datasets: [{
                label: 'Number of Reviews',
                data: reviewCounts,
                backgroundColor: colors,
                borderColor: 'gray',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 12
                }
            }
        }
    });
});
</script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($location); ?>,
            datasets: [{
                backgroundColor: [
                    "#ffd322",
                    "#5945fd",
                    "#25d5f2",
                    "#2ec551",
                    "#ff344e",
                ],
                data: <?php echo json_encode($complaint); ?>
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
        }
    });
</script>

</body>
</html>
