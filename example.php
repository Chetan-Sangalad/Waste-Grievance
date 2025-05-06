<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', 'Rootroot', 'wms');
if (!$con) {
    echo "Problem in database connection..." . mysqli_error();
} else {
    // Query to get complaints per month
    $sql = "SELECT * FROM garbageinfo";
    $result = mysqli_query($con, $sql);
    $count=0;
    $ccount=$pcount=0;
    while ($row = mysqli_fetch_array($result)) {
            $count++;
            if($row['status']=='Completed'){
                $ccount++;
            }
            else $pcount++;
    }
}
?>