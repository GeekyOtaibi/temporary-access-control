<?php
echo "<br><br>";
echo "<legend></legend>";
$search = $_POST['search'];
$type = $_POST['type'];

include('connection-db.php');
if($type == 'visitor'){
    $query = "SELECT residence, sum(period) FROM person_record WHERE residence='$search'";
    $result=  mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if($row['sum(period)'] < 1){
        echo "لايوجد زائر بهذا الرقم الرجاء التأكد";
        die();
    }
    
    $period = array("ID"=>$row['residence'],"period"=>$row['sum(period)']);

    }else{
    $query = "SELECT carNum,sum(period) FROM car_record WHERE carNum='$search'";
    $result=  mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if($row['sum(period)'] < 1){
        echo "لايوجد زائر بهذا الرقم الرجاء التأكد";
        die();
    }
    
    $period = array("ID"=>$row['carNum'],"period"=>$row['sum(period)']);
    }

//------------------------------------------------
$query = "SELECT access,grantedBy FROM access WHERE ID='$search'";

$result=  mysqli_query($con, $query);
$row=mysqli_fetch_assoc($result);
$access = $row['access'];
$grant = $row['grantedBy'];
?>
<table class="table table-bordered">
    <thead>
        <tr class="bg-primary">
        <?php
            if($type == 'visitor'){
            echo "<th>رقم الاقامة</th>";
            }else{
            echo "<th>رقم السيارة</th>";
            }
        ?>
        <th>مجموع الفترات</th>
        <th>رخصة تمديد</th>
        <th>المرخِص</th>
        <th>إدارة</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $period['ID']; ?></td>
            <td><?php echo $period['period']; ?></td>
            <?php
                if($access == 1){
                echo "<td>يوجد</td>";
                }else{
                echo "<td>لايوجد</td>";
                }
            ?>
            <?php
                if($grant == 0){
                echo "<td>لايوجد</td>";
                }else{
                echo "<td>$grant</td>";
                }
            ?>
    <td class="bg-warning">
        <?php if($access == 0){ ?>
        <button class="btn btn-success" value="<?php echo $period['ID']; ?>" onclick="edit_access(this.value,'add');">منح رخصة تمديد</button>
        <?php }else{ ?>
        <button class="btn btn-danger" value="<?php echo $period['ID']; ?>" onclick="edit_access(this.value,'remove');">سلب رخصة تمديد</button>
        <?php } ?>
    </td>     
        </tr>
    </tbody>
</table>