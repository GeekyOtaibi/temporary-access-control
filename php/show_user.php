<?php
echo "<br><br>";
echo "<legend></legend>";
$search = $_POST['search'];

    include('connection-db.php');

    $query = "SELECT * FROM person_record WHERE username='$search'";
    $result=  mysqli_query($con, $query);
    $person_record = array();
    while($row=  mysqli_fetch_assoc($result)){
        $person_record[$row['ID']]=array(
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
            "postDate"=>$row['postDate']
        );
    }

    $query = "SELECT * FROM car_record WHERE username='$search'";
    $result=  mysqli_query($con, $query);
    $car_record = array();

        while($row=  mysqli_fetch_assoc($result)){
           $car_record[$row['ID']]=array(
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

//------------------------------------------------
$sum = count($person_record) + count($car_record);
?>
<div class="form-group">
    <?php echo "<p>مجموع مدخلات المستخدم: $sum</p>"; ?>
    <legend></legend>
</div>
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
        <?php foreach($person_record as $i){ ?>
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
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>رقم الضبط</th>
            <th>رقم السيارة</th>
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
        <?php foreach($car_record as $i){ ?>
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