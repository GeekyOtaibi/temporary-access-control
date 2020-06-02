<div class='panel panel-default dialog-panel'>
    <div class='panel-heading'>
    <h5>عدد الزيارات</h5>
    </div>       
    <div class='panel-body'>
        <div class="form-group">
            <div class="col-md-8">
                <div class="col-md-3 col-md-offset-4">
                    <button class="btn btn-primary" onclick="temporary_search();">بحث</button>
                </div>
                <div class="col-md-5">
                    <input id="seach-bar" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">
                    <select id="type-selector" class="form-control">
                        <option value="visitor">زائر</option>
                        <option value="car">سيارة</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="type-selector">نوع البحث</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div id="temporary-container">
            
            </div>
        </div>
    </div>
</div>