<?php
if(isset($_POST['controlnum'])){
    echo "<br><br>";
    echo "<legend></legend>";
    $search = $_POST['controlnum'];
    include('connection-db.php');
    $record = array();
    $query = "SELECT * FROM person_record WHERE controlNum='$search'";
    $result=  mysqli_query($con, $query);
       while($row=  mysqli_fetch_assoc($result)){
           $record[$row['ID']]=array(
                    "ID"=>$row['ID'],
                   "controlNum"=>$row['controlNum'],
                   "residence"=>$row['residence'],
                   "respCenter"=>$row['respCenter'],
                   "company"=>$row['company'],
                   "startDate"=>$row['startDate'],
                   "endDate"=>$row['endDate'],
                   "period"=>$row['period'],
                   "note"=>$row['note'],
                   "username"=>$row['username'],
                   "postDate"=>$row['postDate'],
                   );
        }
?>
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>رقم الضبط</th>
            <th>رقم الاقامة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>ملاحظات</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
            <th>خيارات الادارية</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($record as $i){ ?>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['residence']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['note'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td>
            <td class="bg-warning">
                <button class='btn-lg btn-danger' data-toggle="modal" data-target="#<?php echo 'deletemodalperson'.$i['ID']; ?>" type="submit" style='float:right'>حذف</button>
            </td>     
        </tr>
        
        <?php } ?>
    </tbody>
</table>

   <?php foreach($record as $i){ ?>     
          <!-- Modal -->
  <div class="modal fade" id="<?php echo 'deletemodalperson'.$i['ID']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">رسالة تأكد</h4>
        </div>
        <div class="modal-body">
          <p>هل انتَ متأكد من حذف هذا السجل؟</p>
            
            <table class="table">
    <thead>
        <tr>
            <th>رقم الضبط</th>
            <th>رقم الاقامة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['residence']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td> 
        </tr>
    </tbody>
</table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='delete_record(<?php echo $i['ID'] ?>,"person")'>نعم, انا متأكد</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">اريد المراجعة</button>
        </div>
      </div>
      
    </div>
      
  </div>
<?php } ?>

<?php
  $record = array();
    $query = "SELECT * FROM car_record WHERE controlNum='$search'";
    $result=  mysqli_query($con, $query);
            while($row=  mysqli_fetch_assoc($result)){
           $record[$row['ID']]=array(
                    "ID"=>$row['ID'],
                   "controlNum"=>$row['controlNum'],
                   "carNum"=>$row['carNum'],
                   "respCenter"=>$row['respCenter'],
                   "company"=>$row['company'],
                   "startDate"=>$row['startDate'],
                   "endDate"=>$row['endDate'],
                   "period"=>$row['period'],
                   "note"=>$row['note'],
                   "username"=>$row['username'],
                   "postDate"=>$row['postDate'],
                   );
        }
?>
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>رقم الضبط</th>
            <th>رقم السيارة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>ملاحظات</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
            <th>خيارات الادارية</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($record as $i){ ?>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['carNum']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['note'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td>
            <td class="bg-warning">
                <button class='btn-lg btn-danger' data-toggle="modal" data-target="#<?php echo 'deletemodalcar'.$i['ID']; ?>" type="submit" style='float:right'>حذف</button>
            </td>            
        </tr>
        <?php } ?>
    </tbody>
</table>


   <?php foreach($record as $i){ ?>     
          <!-- Modal -->
  <div class="modal fade" id="<?php echo 'deletemodalcar'.$i['ID']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">رسالة تأكد</h4>
        </div>
        <div class="modal-body">
          <p>هل انتَ متأكد من حذف هذا السجل؟</p>
            
            <table class="table">
    <thead>
        <tr>
            <th>رقم الضبط</th>
            <th>رقم السيارة</th>
            <th>مركز المسؤولية</th>
            <th>الشركة</th>
            <th>تاريخ البدء</th>
            <th>تاريخ الانتهاء</th>
            <th>الفترة (بالايام)</th>
            <th>مدخل التصريح</th>
            <th>تاريخ الإدخال</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $i['controlNum']; ?></td>
            <td><?php echo $i['carNum']; ?></td>
            <td><?php echo $i['respCenter']; ?></td>
            <td><?php echo str_replace('"','', json_encode($i['company'], JSON_UNESCAPED_UNICODE)); ?></td>
            <td><?php echo $i['startDate']; ?></td>
            <td><?php echo $i['endDate']; ?></td>
            <td><?php echo $i['period']; ?></td>
            <td><?php echo $i['username']; ?></td>
            <td><?php echo $i['postDate']; ?></td> 
        </tr>
    </tbody>
</table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='delete_record(<?php echo $i['ID'] ?>,"car")'>نعم, انا متأكد</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">اريد المراجعة</button>
        </div>
      </div>
      
    </div>
      
  </div>
<?php } ?>

<?php } ?>