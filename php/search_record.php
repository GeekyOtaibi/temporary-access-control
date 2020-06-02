<?php
echo "<br><br>";
echo "<legend></legend>";
$search = $_POST['search'];
$type = $_POST['type'];
$usertype = $_POST['usertype'];

include('connection-db.php');
if($type == 'visitor'){
    $query = "SELECT * FROM person_record WHERE residence='$search'";
    }else{
    $query = "SELECT * FROM car_record WHERE carNum='$search'";
    }

$result=  mysqli_query($con, $query);

$numRecord = mysqli_num_rows($result);

$record = array();
if($type == 'visitor'){
       while($row=  mysqli_fetch_assoc($result)){
           $record[$row['ID']]=array(
                    "ID"=>$row['ID'],
                   "controlNum"=>$row['controlNum'],
                   "residence"=>$row['residence'],
                   "respCenter"=>$row['respCenter'],
                   "company"=>$row['company'],
                   "location"=>$row['location'],
                   "startDate"=>$row['startDate'],
                   "endDate"=>$row['endDate'],
                   "period"=>$row['period'],
                   "note"=>$row['note'],
                   "username"=>$row['username'],
                   "postDate"=>$row['postDate'],
                   );
        }
}
else{
        while($row=  mysqli_fetch_assoc($result)){
           $record[$row['ID']]=array(
                    "ID"=>$row['ID'],
                   "controlNum"=>$row['controlNum'],
                   "carNum"=>$row['carNum'],
                   "respCenter"=>$row['respCenter'],
                   "company"=>$row['company'],
                   "location"=>$row['location'],
                   "startDate"=>$row['startDate'],
                   "endDate"=>$row['endDate'],
                   "period"=>$row['period'],
                   "note"=>$row['note'],
                   "username"=>$row['username'],
                   "postDate"=>$row['postDate'],
                   );
        }
}
//------------------------------------------------
if($type == 'visitor'){
    $query = "SELECT sum(period) FROM person_record WHERE residence='$search'";
    }else{
    $query = "SELECT sum(period) FROM car_record WHERE carNum='$search'";
    }

$result=  mysqli_query($con, $query);
$row=mysqli_fetch_assoc($result);
$sumPeriod = $row['sum(period)'];

?>
<div class="form-group">
    <p>مجموع الزيارات: <?php echo $numRecord; ?> &nbsp;&nbsp;&nbsp; مجموع الفترات: <?php echo $sumPeriod; ?></p>
    <legend></legend>
</div>
<?php if($usertype=="admin" && $type == 'visitor'){ ?>
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>رقم الضبط</th>
            <th>رقم الاقامة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>موقع العمل</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>ملاحظات</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($record as $i){ ?>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['residence']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo str_replace('"','', json_encode($i['location'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['note'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>
<?php if($usertype=="admin" && $type == 'car'){ ?>
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>رقم الضبط</th>
            <th>رقم الاقامة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>موقع العمل</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>ملاحظات</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($record as $i){ ?>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['carNum']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo str_replace('"','', json_encode($i['location'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['note'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td>         
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>