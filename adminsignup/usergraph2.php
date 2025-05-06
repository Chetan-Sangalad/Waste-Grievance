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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center"> <!-- Center align title -->
                <h3>Complaints per month</h3> <!-- Updated title -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <canvas id="complaintsChart"></canvas>
            </div>
        </div>
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
