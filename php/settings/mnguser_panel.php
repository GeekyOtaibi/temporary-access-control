    <div class='panel panel-default dialog-panel'>
      <div class='panel-heading'>
        <h5>إدارة المستخدمين</h5>
      </div>
      <div class='panel-body'>
                <div id="mng-message">
                    
                </div>
          <br><br>
        نوع الإدارة
        <select id="mng-type" onchange="javascript:show_mng(this.value);">
            <option selected disabled>اختار هنا</option>
            <option value="add">اضافة</option>
            <option value="update">تعديل</option>
        </select>

          <br><br>
          <legend></legend>
<div id="mng-container" style="visibility:hidden" >
          <button class="btn btn-md btn-primary col-md-1 col-md-offset-3" id="search-btn" style="visibility:hidden" onclick="search_user()">بحث</button>
            <div class='col-md-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='username'>
                </div>
            </div>
          <label class='control-label col-md-2'> رقم المستخدم </label>
          <br><br>
    
            <div class='col-md-4 col-md-offset-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='name'>
                </div>
            </div>
            <label class='control-label col-md-2'> الاسم </label>
            <br><br>
    
            <div class='col-md-4 col-md-offset-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='password1' type='password'>
                </div>
            </div>
            <label class='control-label col-md-2'> كلمة المرور </label>
            <br><br>
    
            <div class='col-md-4 col-md-offset-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='password2' type='password'>
                </div>
            </div>
            <label class='control-label col-md-2'> اعد كلمة المرور </label>
            <br><br>
    
            <div class='col-md-4 col-md-offset-4'>
                <div class='form-group internal'>
                  <select class='form-control' id='type'>
                      <option disabled selected>اختار هنا</option>
                      <option value="admin">مدير</option>
                      <option value="staff">مشرف</option>
                      <option value="end">مستخدم عادي</option>
                  </select>
                </div>
            </div>
            <label class='control-label col-md-2'> نوع المستخدم </label>
                <br><br>
    
            <div class='col-md-4 col-md-offset-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='unit'>
                </div>
            </div>
            <label class='control-label col-md-2'> الوحدة </label>
    
            <br><br><br><br>
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-3'>
              <button class='btn-lg btn-success' onclick="submit_mng();"> تطبيق التغييرات </button>
            </div>
          </div>
        </div>
      </div>
    </div>