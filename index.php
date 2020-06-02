<!DOCTYPE html>
<?php session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>
<html dir="rtl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>إدخال السجلات المؤقتة</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/png" href="img/icon1.png" />
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="bower_components/jquery/jquery.js"></script>

    <style>
        body {
            background: #0080ff;
            background: linear-gradient(to bottom right, rgba(255,204,102,0.5) 50%, rgba(0,102,204,0.70) 100%) no-repeat center center fixed
                , url('img/bg.jpeg') no-repeat center center fixed;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default" style="height:80px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
          <img alt="Brand" src="img/topimg1.png" width="150px">
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    
      <li><a><span class="glyphicon glyphicon-user"></span> المستخدم: <?php echo str_replace('"','', json_encode($_SESSION['name'], JSON_UNESCAPED_UNICODE)); ?></a></li>
      <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> الإعدادات</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> تسجيل الخروج</a></li>
    </ul>
  </div>
</nav>

<div class="col-xs-10" id="main">
    <div style="font-size:70px;color:white">برنامج الامن الصناعي السجلات المؤقتة</div>
    <div style="font-size:30px;color:white">الرجاء اختيار احدى خيارات التنقل يمين الشاشة</div>
</div>
<div class="col-xs-2">
  <div class="panel panel-default">
  <div class="panel-heading"><strong>خيارات التنقل</strong></div>
  <div class="list-group">
    <a onclick="panel_selector('php/temporary_permits.php');" class="list-group-item">إدخال السجلات المؤقتة</a>
    <a onclick="panel_selector('php/respcenter_panel.php');" class="list-group-item">عدد الزيارات لمركز المسؤولية</a>
    <a onclick="panel_selector('php/visitorpanel.php');" class="list-group-item">عدد الزيارات للزائر</a>
    <?php if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){ ?>
    <a onclick="panel_selector('php/user_panel.php');" class="list-group-item list-group-item-warning">عدد الإدخالات للمستخدم</a>
    <?php } ?>
  </div>
</div>
</div>
    
<?php include('modals.php'); ?>
    
<script src="js/moment.js"></script>
<script src="node_modules/chart.js/dist/Chart.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery/jquery.js"></script>
    
<!---<script>----------------------------------------<script>-----------------------------------------------<script>--------->
<script>
var record_counter = 0;
var car_counter = 0;
//------------------------------------------------------------------>
    function panel_selector(filename) {
    var target = document.getElementById("main");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', filename , true);
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;
          }
        }
        xhr.send();
      }
//------------------------------------------------------------------>
    function record_selector(i) {
    record_counter = i;
    document.getElementById('message-container').innerHTML = '';
    var target = document.getElementById("record-container");
        target.innerHTML='';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/record.php', true);
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 2) {
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
              for(var x=1; x<=i ; x++){
            target.innerHTML += xhr.responseText;
              }
          }
        }
        xhr.send();
    setTimeout(personPeriodFunc, 2000);
    //setTimeout(carPeriodFunc, 2000);
    setTimeout(calculateDays, 2000);
    }
//------------------------------------------------------------------>
    function car_selector(i) {
    car_counter = i;
    document.getElementById('message-container').innerHTML = '';
    var target = document.getElementById("car-container");
        target.innerHTML='';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/carrecord.php', true);
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 2) {
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
              for(var x=1; x<=car_counter ; x++){
            target.innerHTML += xhr.responseText;
            }
          }
        }
        xhr.send();
    //setTimeout(personPeriodFunc, 2000);
    setTimeout(carPeriodFunc, 2000);
    setTimeout(calculateDays, 2000);
    }
//------------------------------------------------------------------>
    function validatrecord(x,id){
        document.forms[x]['respCenter'].style = "border:1px solid #aaaaaa";
        document.forms[x]['company'].style = "border:1px solid #aaaaaa";
        document.forms[x]['location'].style = "border:1px solid #aaaaaa";
        document.forms[x]['startDate'].style = "border:1px solid #aaaaaa";
        document.forms[x]['endDate'].style = "border:1px solid #aaaaaa";
        document.forms[x]['period'].style = "border:1px solid #aaaaaa";
        document.forms[x]['total-period'].style = "border:1px solid #aaaaaa";
        id.style = "border:1px solid #aaaaaa";
        var pass = true;
        
        if(document.forms[x]['respCenter'].value == ''){
           document.forms[x]['respCenter'].style = "border:1px solid #ff0000";
            pass = false;
           }
        if(document.forms[x]['company'].value == ''){
           document.forms[x]['company'].style = "border:1px solid #ff0000";
            pass = false;
           }
        if(document.forms[x]['location'].value == ''){
           document.forms[x]['location'].style = "border:1px solid #ff0000";
            pass = false;
           }
        //-----------------------------date validate----------------------------
        if(document.forms[x]['startDate'].value != '' && document.forms[x]['endDate'].value != ''){
            var startDate = document.forms[x]['startDate'].value;
            var endDate = document.forms[x]['endDate'].value;
            var startDate = new Date(startDate);
            var endDate = new Date(endDate);
            var todaysDate = new Date();
            if(startDate.setHours(0,0,0,0) >= todaysDate.setHours(0,0,0,0) || endDate.setHours(0,0,0,0) >= todaysDate.setHours(0,0,0,0)) {
                if(startDate.setHours(0,0,0,0) > endDate.setHours(0,0,0,0)){
                    document.forms[x]['startDate'].style = "border:1px solid #ff0000"; document.forms[x]['endDate'].style = "border:1px solid #ff0000";
                    pass = false;
                }
            }
            else{
                    document.forms[x]['startDate'].style = "border:1px solid #ff0000"; document.forms[x]['endDate'].style = "border:1px solid #ff0000";
                    pass = false;
                }
           }
            else{
                document.forms[x]['startDate'].style = "border:1px solid #ff0000"; document.forms[x]['endDate'].style = "border:1px solid #ff0000";
                pass = false;
            }
        //-----------------------------date validate----------------------------
        if(id.value != ""){
            if(document.forms[x]['total-period'].style.color == "rgb(255, 0, 0)"){
                pass = false;
                document.forms[x]['total-period'].style = "border:1px solid #ff0000";
            }
            var total = (document.forms[x]['total-period'].value *1)+(document.forms[x]['period'].value *1);
            var access = document.forms[x]['access'].value;
            if(total >15 && access == 0){
                document.forms[x]['period'].style = "border:1px solid #FF0000";
                document.forms[x]['total-period'].style = "border:1px solid #FF0000";
               pass = false;
               }
        }
        else{id.style = "border:1px solid #ff0000"; pass = false;}
        return pass;
        }
//------------------------------------------------------------------>
    function submitrecord(){
        record_counter = record_counter * 1;
        car_counter = car_counter * 1;
        var pass = true;
        var controlnum;
        var executed = false;
        
        for(var x=0 ; x<record_counter ; x++){
            if(validatrecord(x,document.forms[x]['residence']) == false){
                if (!executed) {
                executed = true;
                pass = false;
                }
            }
        }
        for(var x=record_counter ; x<(record_counter+car_counter) ; x++){
            if(validatrecord(x,document.forms[x]['carNum']) == false){
                if (!executed) {
                executed = true;
                pass = false;
                }
            }
        }
        console.log(pass);
        if(pass && (record_counter > 0 || car_counter > 0)){
        $.post('php/generate.php',{'unit' : '<?php echo $_SESSION['unit']; ?>'}, function(data){controlnum = data});
        setTimeout(submit, 1000);
        
        function submit(){
        for(var x=0 ; x<record_counter ; x++){
            
                $.post('php/submit_record.php'
                       ,{
                        'residence' : document.forms[x]['residence'].value,
                        'respCenter' : document.forms[x]['respCenter'].value,
                        'company' : document.forms[x]['company'].value,
                        'location' : document.forms[x]['location'].value,
                        'startDate' : document.forms[x]['startDate'].value,
                        'endDate' : document.forms[x]['endDate'].value,
                        'period' : document.forms[x]['period'].value,
                        'notes' : document.forms[x]['notes'].value,
                        'username' : '<?php echo $_SESSION['username']; ?>'
                        }
                      );
        }
        for(var x=record_counter ; x<(record_counter+car_counter) ; x++){
                $.post('php/submit_record.php'
                       ,{
                        'carNum' : document.forms[x]['carNum'].value,
                        'respCenter' : document.forms[x]['respCenter'].value,
                        'company' : document.forms[x]['company'].value,
                        'location' : document.forms[x]['location'].value,
                        'startDate' : document.forms[x]['startDate'].value,
                        'endDate' : document.forms[x]['endDate'].value,
                        'period' : document.forms[x]['period'].value,
                        'notes' : document.forms[x]['notes'].value,
                        'username' : '<?php echo $_SESSION['username']; ?>'
                        }
                      );
            }
            
        document.getElementById('record-container').innerHTML = "";
        document.getElementById('car-container').innerHTML = "";
        document.getElementById('message-container').innerHTML = `
    <div class="panel panel-success">
      <div class="panel-heading">رسالة</div>
      <div class="panel-body">
    <p>تمت اضافة التصاريح بنجاح</p>
    <p>رقم الضبط `+controlnum+`</p>
    </div>
    </div>`;
    }
    }
    else{
            document.getElementById('message-container').innerHTML = `
    <div class="panel panel-danger">
      <div class="panel-heading">رسالة</div>
      <div class="panel-body">تاكد من المدخلات</div>
    </div>`; 
            }
}
//------------------------------------------------------------------>
    function personPeriodFunc(){
        var funcs = [];
        
        function sendPeriod(residence,personPeriod,access){
            return function(){
            $.post(
                'php/period.php',
                {
                    'residence' : residence.value
                },
                function( person ) { personPeriod.value = person.period;
                                    access.value = person.access;
                                    if((person.period * 1) > 15 && person.access == '0'){
                                        personPeriod.style.color = "#ff0000";
                                        
                                    }
                                    else{
                                         personPeriod.style.color = "#555555";
                                    }
                                    
                                 }
            );};
        }
        
        for(var x=0 ; x<record_counter ; x++){
            funcs[x] = sendPeriod(document.forms[x]['residence'],document.forms[x]['total-period'],document.forms[x]['access']);
        }
        for(var x=0 ; x<record_counter ; x++){
            document.forms[x]['residence'].onchange = funcs[x];
        }
    }
//------------------------------------------------------------------>
    function carPeriodFunc(){
        var funcs = [];
        
        function sendPeriod(carNum,carPeriod){
            return function(){
            $.post(
                'php/period.php',
                {
                    'carNum' : carNum.value
                },
                function( car ) { carPeriod.value = car.period;
                                 access.value = car.access;
                                    if((car.period * 1) > 15 && car.access == '0'){
                                        carPeriod.style.color = "#ff0000";
                                    }
                                    else{
                                         carPeriod.style.color = "#555555";
                                    }
                                    
                                 }
            );};
        }
        record_counter = record_counter * 1;
        car_counter = car_counter * 1;
        for(var x=record_counter ; x<(record_counter+car_counter) ; x++){
            funcs[x] = sendPeriod(document.forms[x]['carNum'],document.forms[x]['total-period'],document.forms[x]['access']);
        }
        
        for(var x=record_counter ; x<(record_counter+car_counter) ; x++){
            document.forms[x]['carNum'].onchange = funcs[x];
        }
        
    }
//------------------------------------------------------------------>
    function calculateDays(){
        var funcs = [];
        
        function sendDays(startDate,endDate,period){
            return function(){
                startDate.style = "border:1px solid #aaaaaa";
                endDate.style = "border:1px solid #aaaaaa";
                var date1 = startDate.value;
                var date2 = endDate.value;
                    if(date1 != "" && date2 != ""){
                  //Get 1 day in milliseconds
                  var one_day=1000*60*60*24;
                  // Convert both dates to milliseconds
                  var date1Parts = new Date((Number(date1.split("-")[0])), (Number(date1.split("-")[1]) - 1), (Number(date1.split("-")[2])));
                  var date1_ms = date1Parts.getTime();
                  var date2Parts = new Date((Number(date2.split("-")[0])), (Number(date2.split("-")[1]) - 1), (Number(date2.split("-")[2])));
                  var date2_ms = date2Parts.getTime();
                  // Calculate the difference in milliseconds
                  if(date2_ms >= date1_ms){
                  var difference_ms = date2_ms - date1_ms;
                  // Convert back to days and return
                  var result = Math.round(difference_ms/one_day) + 1;
                  period.value = result;
                    }
                    else{
                        startDate.style = "border:1px solid #ff0000";
                        endDate.style = "border:1px solid #ff0000";
                        }
        }};}
        
        record_counter = record_counter * 1;
        car_counter = car_counter * 1;
        
        for(var x=0 ; x<record_counter+car_counter ; x++){
            funcs[x] = sendDays( document.forms[x]['startDate'] , document.forms[x]['endDate'] , document.forms[x]['period'] );
        }
        for(var x=0 ; x<record_counter+car_counter ; x++){
            document.forms[x]['startDate'].oninput = funcs[x];
            document.forms[x]['endDate'].oninput = funcs[x];
        }
    }
//------------------------------------------------------------------>
    function temporary_search(){
        document.getElementById('seach-bar').style = "border: 1px solid #aaaaaa"
        if(document.getElementById('seach-bar').value != ""){
        $.post('php/search_record.php'
            ,{
                'search' : document.getElementById('seach-bar').value,
                'type' : document.getElementById('type-selector').value,
                'usertype' : "<?php echo $_SESSION['type']; ?>"
            },
        function( data ) { document.getElementById('temporary-container').innerHTML = data; } );
            }
        else{
            document.getElementById('seach-bar').style = "border: 1px solid #ff0000"
        }
    }
//------------------------------------------------------------------>
    function user_search(){
        document.getElementById('seach-bar').style = "border: 1px solid #aaaaaa"
        if(document.getElementById('seach-bar').value != ""){
        $.post('php/show_user.php'
            ,{
                'search' : document.getElementById('seach-bar').value
            },
        function( data ) { document.getElementById('user-container').innerHTML = data; } );
            }
        else{
            document.getElementById('seach-bar').style = "border: 1px solid #ff0000"
        }
    }
//------------------------------------------------------------------>
    function respcenter_search(){
        document.getElementById('startDate').style = "border: 1px solid #aaaaaa";
        document.getElementById('endDate').style = "border: 1px solid #aaaaaa";
        if(document.getElementById('startDate').value != "" && document.getElementById('endDate').value != "" ){
        $.post('php/show_respcenter.php'
            ,{
                'startDate' : document.getElementById('startDate').value,
                'endDate' : document.getElementById('endDate').value
            },
        function( data ) { document.getElementById('respcenter-container').innerHTML = data; } );
            }
        else{
            document.getElementById('startDate').style = "border: 1px solid #ff0000";
            document.getElementById('endDate').style = "border: 1px solid #ff0000";
        }
    }
</script>
</body>
</html>