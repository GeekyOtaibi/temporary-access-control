<form autocomplete="off" class='form-horizontal' name="add" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th> رقم السيارة</th>  
                <th> مركز المسؤولية </th> 
                <th>  الشركة</th>
                <th>  موقع العمل</th>
                <th> من </th>  
                <th> إلى </th> 
                <th>  الفترة</th>
                <th>مجموع الفترات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:190px"><input   class='form-control' id='carNum' name="carNum"></td> 
                <td style="width:150px"><input   class='form-control' id='respCenter' name="respCenter" type='number'></td>
                <td style="width:250px"><input   class='form-control' id='company' name="company" type='text'  ></td> 
                <td style="width:250px"><input   class='form-control' id='location' name="location" type='text'  ></td> 
                <td style="width:160px"><input class='form-control' id='startDate' name="startDate" type='date'  ></td>  
                <td style="width:160px"><input class='form-control ' id='endDate' name="endDate" type='date'  ></td> 
                <td style="width:70px"><input readonly class='form-control' id='period' name="period"></td>
                <td style="width:100px"><input  readonly class='form-control' id='total-period' name="total-period"></td>
            </tr>
        </tbody>
    </table>
    <label for="notes">ملاحظات</label>
    <textarea class="form-control" id="notes"></textarea>
    <input id="access" value="0" style="display:none">
</form><legend></legend>