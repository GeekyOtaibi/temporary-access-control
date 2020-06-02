<?php
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

include('connection-db.php');
$query = "SELECT DISTINCT respCenter FROM person_record WHERE startDate>='$startDate' AND endDate<='$endDate';";
$result=  mysqli_query($con, $query);
$array1 = array();
$counter = 0;
    while($row=  mysqli_fetch_assoc($result)){
        $array1[$counter]=$row['respCenter'];
        $counter++;
    }
$query = "SELECT DISTINCT respCenter FROM car_record WHERE startDate>='$startDate' AND endDate<='$endDate';";
$result=  mysqli_query($con, $query);
$array2 = array();
$counter = 0;
    while($row=  mysqli_fetch_assoc($result)){
        $array2[$counter]=$row['respCenter'];
        $counter++;
    }
$respCenter = array();
$respCenter = array_unique(array_merge($array1,$array2), SORT_REGULAR);
?>

<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>مركز المسؤولية</th>
            <th>عدد زيارات الاشخاص</th>
            <th>مجموع فترات الاشخاص</th>
            <th>عدد زيارات السيارات</th>
            <th>مجموع فترات السيارات</th>
            <th>عدد زيارات للكل</th>
            <th>مجموع فترات للكل</th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($respCenter as $a => $i){
    
    $query = "SELECT period FROM person_record where respCenter =$i AND startDate>='$startDate' AND endDate<='$endDate';";
    $result=  mysqli_query($con, $query);    
    $person_rows= mysqli_num_rows($result);
    
    $query = "SELECT sum(period) FROM person_record where respCenter =$i AND startDate>='$startDate' AND endDate<='$endDate';";
    $result=  mysqli_query($con, $query);
    $row= mysqli_fetch_assoc($result);
    $person_sum= $row['sum(period)'];

    $query = "SELECT period FROM car_record where respCenter =$i AND startDate>='$startDate' AND endDate<='$endDate';";
    $result=  mysqli_query($con, $query);    
    $car_rows= mysqli_num_rows($result);
    
    $query = "SELECT sum(period) FROM car_record where respCenter =$i AND startDate>='$startDate' AND endDate<='$endDate';";
    $result=  mysqli_query($con, $query);
    $row= mysqli_fetch_assoc($result);
    $car_sum= $row['sum(period)'];
    
echo "<tr>"
        ."<td>$i</td>"
        ."<td>$person_rows</td>"
        ."<td>$person_sum</td>"
        ."<td>$car_rows</td>"
        ."<td>$car_sum</td>"
        ."<td>".($person_rows+$car_rows)."</td>"
        ."<td>".($person_sum+$car_sum)."</td>"
    ."</tr>";

}
?>
    </tbody>
</table>