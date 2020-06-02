<div class='panel panel-default dialog-panel'>
      <div class='panel-heading'>
        <h5>ادخال السجلات المؤقتة</h5>
      </div>       
      <div class='panel-body'>
          
            عدد الزوار
            <select id='record-selector' name='record-selector' onchange="javascript:record_selector(this.value);">
                <option selected disabled>اختار هنا</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
          عدد السيارات
            <select id='car-selector' name='car-selector' onchange="javascript:car_selector(this.value);">
                <option selected disabled>اختار هنا</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
          <legend></legend>
          <div class='form-group'>
               <div id="message-container">
                   
              </div>
              <legend>تصريحات الاشخاص</legend>
              <div id="record-container">
                  <p style="color:darkgrey"> اختيار عدد التصريحات اعلى الاطار</p>
              </div>
              <legend>تصريحات السيارات</legend>
              <div id="car-container">
                  <p style="color:darkgrey"> اختيار عدد التصريحات اعلى الاطار</p>
              </div>
          </div>
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-1'>
              <button class='btn-lg btn-danger' name="reset">الغاء</button>
            </div>
            <div class='col-md-3'>
                <button class='btn-lg btn-success' data-toggle="modal" data-target="#confirm-record" type="submit" style='float:right'>ادخال</button>
            </div>
          </div>
    </div>
</div>