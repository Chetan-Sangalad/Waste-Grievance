<?php
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    $sql = "SELECT * FROM garbageinfo";
    $result = mysqli_query($con, $sql);
    $n = $k = $u = $b =$p= 0; // Initializing variables
    while ($row = mysqli_fetch_array($result)) {
        if($row['status']=='Completed'){
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
    }}
    $location = ['nitte', 'belman', 'karkala', 'udupi','padubidri']; // Define as a simple array
    $complaint = [$n, $b, $k, $u,$p]; // Define as a simple array
    $max=max($n, $b, $k, $u,$p);
    $loc1=$loc2=$loc3=$loc4=$loc5="";
    if($max==$n){
        $loc1="nitte";
    }
    if($max==$b){
        $loc2="belman";
    }
    if($max==$k){
        $loc3="karkala";
    }
    if($max==$u){
        $loc4="udupi";
    }
    if($max==$p){
        $loc5="padubidri";
    }
    
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Compaint vs Location</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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

<div class="container mt-4">
    <h3>Number of complaints for each location</h3><br><br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg">
                    <h1>Complaint vs Location</h1>
                </div>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
                
            </div>
           
        </div>
    </div><br><br>
    <div>
                    <h3><?php echo "$loc1 $loc2 $loc3 $loc4 $loc5 completed highest complaint" ?> </h3>
                </div>

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
