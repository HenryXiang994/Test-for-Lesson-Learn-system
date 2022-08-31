<!-- Show all search results-->

<?php
$host = "localhost";
$userName = "root";
$userPass = "Bi1OiEIBqEvmQFvS";
$database = "nettest";

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

mysqli_set_charset($connectQuery, "utf8mb4"); 

//选择数据，并输出result给页面列表
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
  exit();
}else{

//所有数据条目，给页面表单显示
$selectQuery = "SELECT * FROM `nettestform` ORDER BY `itemid` DESC";
$result = mysqli_query($connectQuery,$selectQuery);

//按照日期，选择各个日期的数据条目数量,给折线图
$selectQueryechart = "SELECT count(*), reportdate FROM `nettestform` group by reportdate ORDER BY reportdate DESC";
$resultechart = mysqli_query($connectQuery,$selectQueryechart);

//按照issue type，和日期的数据条目数量,给饼图
$selectQuerypie = "SELECT count(*), reportissuetype FROM `nettestform` group by reportissuetype";
$resultpie = mysqli_query($connectQuery,$selectQuerypie);

//所有数据条目，给 Message 内容 表单显示：
$selectQuerymess = "SELECT * FROM `message` ORDER BY `messdate` DESC";
$resultmess = mysqli_query($connectQuery,$selectQuerymess);

}


//按照日期，选择各个日期的数据条目数量,给折线图
$dataname = array();
$datavalue = array();
while($row = mysqli_fetch_array($resultechart,MYSQLI_NUM)){
array_push($dataname,$row[1]);
array_push($datavalue,$row[0]);
}
$BDname = json_encode($dataname); 
$BDvalue = json_encode($datavalue); 
// print_r($datavalue);
// print_r($BDname);



//按照issue type，和日期的数据条目数量,给饼图
$piename = array();
$pievalue = array();
while($row = mysqli_fetch_array($resultpie,MYSQLI_NUM)){
array_push($piename,$row[1]);
array_push($pievalue,$row[0]);
}
$BDpiename = json_encode($piename); 
$BDpievalue = json_encode($pievalue); 
// print_r($pievalue);
// print_r($piename);





mysqli_close($connectQuery)

?>







<!DOCTYPE html>

<!-- 界面普通的网站？？技术网站并不关注界面-->
<!-- 有点像是画图，画图也是几百个特征一点点画，编网页也是几百上千条语句，一条一条写-->

<!-- 上传Excel功能-->
<!--  统计访问量的功能-->
<!--  发表评论的功能-->
<!--  图片上传的功能-->
<!--  -->


<html>
    <head>
    
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="2"> 
    2秒钟网页自动刷新 -->

    <!--jquery-->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="echarts.js"></script>


   
    <!--标题栏和网页Logi ico -->

    <link rel="shortcut icon" href="/HXICO.png" type="image/png" />

    <title>Logitech CP&G ME xxxx Data list</title>





</head>





      

    <!--ID List -->
    <!--Create report engineer name: CTENGNAME >
    <!- Create report Date: CTDATE >
    <!- Create report Part Name: CTPTNAME >
    <!- Create report issue Type: CTISTYPE >
    <!- Create report Description: CTDESCRIP >

    <!- Search report engineer name: SCENGNAME >
    <!- Search report Date: SCDATE >
    <!- Search report Part Name: SCPTNAME >
    <!- Search report issue Type: SCISTYPE >
    <!- Search report Description: SCDESCRIP >



<!- ------------------------------------------------------------------------------------------>

<body id=body  onscroll=SetCookie("scroll",document.body.scrollTop); >



<!-- <body onload="timenow()"> -->

<!--网页点击❤符号效果，不影响网页使用 -->

<script type="text/javascript">
        (function(window, document, undefined) {
            var hearts = [];
            window.requestAnimationFrame = (function() {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
                function(callback) {
                    setTimeout(callback, 1000 / 60);
                }
            })();
            init();
            function init() {
                css(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: absolute;}.heart:after{top: -5px;}.heart:before{left: -5px;}");
                attachEvent();
                gameloop();
            }
            function gameloop() {
                for (var i = 0; i < hearts.length; i++) {
                    if (hearts[i].alpha <= 0) {
                        document.body.removeChild(hearts[i].el);
                        hearts.splice(i, 1);
                        continue;
                    }
                    hearts[i].y--;
                    hearts[i].scale += 0.004;
                    hearts[i].alpha -= 0.013;
                    hearts[i].el.style.cssText = "left:" + hearts[i].x + "px;top:" + hearts[i].y + "px;opacity:" + hearts[i].alpha + ";transform:scale(" + hearts[i].scale + "," + hearts[i].scale + ") rotate(45deg);background:" + hearts[i].color;
                }
                requestAnimationFrame(gameloop);
            }
            function attachEvent() {
                var old = typeof window.onclick === "function" && window.onclick;
                window.onclick = function(event) {
                    old && old();
                    createHeart(event);
                }
            }
            function createHeart(event) {
                var d = document.createElement("div");
                d.className = "heart";
                hearts.push({
                    el: d,
                    x: event.clientX - 5,
                    y: event.clientY - 5,
                    scale: 1,
                    alpha: 1,
                    color: randomColor()
                });
                document.body.appendChild(d);
            }
            function css(css) {
                var style = document.createElement("style");
                style.type = "text/css";
                try {
                    style.appendChild(document.createTextNode(css));
                } catch(ex) {
                    style.styleSheet.cssText = css;
                }
                document.getElementsByTagName('head')[0].appendChild(style);
            }
            function randomColor() {
                return "rgb(" + (~~ (Math.random() * 255)) + "," + (~~ (Math.random() * 255)) + "," + (~~ (Math.random() * 255)) + ")";
            }
        })(window, document);
        </script>























    <!-- 主要内容-->



  <style type = "text/css">
    body{
    background-image: url(background.png);
    background-repeat: no-repeat;
    background-attachment:fixed;
    }

</style>

    <!-- 顶部蓝色标题栏 -->
      <div 
      style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
     <h1><span style="color: #ffffff; font-size: 40px; float:none; ">CP&G ME xxxx Data List</span></h1>
      </div>


<input type="button"  style="background-color:#E6E6E6; border-radius: 5px; color:#5F9EA0; 
font-size: 15px; border-color:#5F9EA0; border-style: ridge;"  
value="《Notes of make this page》" size="25"  onclick = "window.location.href = 'http://localhost/Test Design Note.html'"/>

<!-- 空行 -->
<br>

    <!-- 紫色分割线 -->
      <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>



 <!---- ------------------------------------------------------------------------------------------>

   <!-- 中部蓝色 Create form -->
    <div 
    style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
    <h3><span style="color: #ffffff; font-size: 25px; float:none; ">Create xxxx Data Form</span></h3>
    </div>

  <!-- 为递交数据进数据库做准备-->


    <form action="http://localhost/LinktoDatabase.php" method="post">

     <div>

    <!-- 01-新建 report engineer name -->
      <label for = "CTENGNAME">Report Engineer Name: </label>
      <input type="text" id ="CTENGNAME" name ="CTENGNAME" value="Please add the report engineer name" size="30"   
      onmouseover=this.focus();this.select();   
      onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
      onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />
      &nbsp &nbsp &nbsp &nbsp


     <!-- 02-新建 report Date -->
      <label for = "date">Report Date:</label>
      <input type="date" id ="CTDATE" name ="CTDATE" 
      onmouseover=this.focus();this.select();   
      onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
      onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />
    
    </div>

<!-- 空行 -->
<br>

  <div>
  <!-- 03-新建 report Part Name -->
  <label for = "CTPTNAME">Report Part Name:   &nbsp &nbsp &nbsp &nbsp</label>
  <input type="text" id ="CTPTNAME" name ="CTPTNAME" value="Please add part name,eg. Top case" size="30"   
  onmouseover=this.focus();this.select();   
  onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
  onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />



  <!-- 04-新建 report issue Type -->
  <label for = "CTISTYPE"> &nbsp &nbsp &nbsp &nbsp Report Type: </label>
  <select id ="CTISTYPE" name ="CTISTYPE">
  <option value="" selected >Please select report issue type:  &nbsp &nbsp &nbsp  </option>
  <option value = "Other">Other</option>
  <option value = "Design issue" >Design issue</option>
  <option value= "Assembly issue" >Assembly issue</option>
  <option value= "Measurement issue" >Measurement issue</option>
  <option value= "Test/Validation setup issue" >Test/Validation setup issue</option>
  </select>

  </div>

<!-- 空行 -->
<br>

<div>
 <!-- 05-新建 report Description -->
<label for = "CTDESCRIP" >Report Detail descriptions: </label>
</div>

<div>
<textarea 
id="CTDESCRIP" name ="CTDESCRIP" 
style="min-height: 100px; min-width: 750px;max-height: 100px; max-width: 750px;"
placeholder ="Please add report descriptions here, multi-line free text"
onmouseover=this.focus();this.select();   
onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />
</textarea>
</div>

  <!-- 空行 -->
  <br>




<!-- Create submit button -->

   <input type="submit" value = "Click to add report data into datebase below " name = "submit" style="color:blue" /> &nbsp;

   </form>
   

<!-- 空行 -->
<br>



  <!---- ------------------------------------------------------------------------------------------>

  <!-- 紫色分割线 -->
 <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>


  <!---- ------------------------------------------------------------------------------------------>

<!-- 中下部蓝色 Search form -->
 <div 
  style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
<h3><span style="color: #ffffff; font-size: 25px; float:none; ">Search xxxx Data Form</span></h3>
</div>


<form action="http://localhost/Searchdata.php" method="post">

    <!-- 搜索report engineer name -->
      <div> 
      <label for = "SCENGNAME">Search data by Report Engineer Name: </label>
      <input type="text"  value= ""  name ="SCENGNAME" placeholder ="Input engineer name your want to search or Leave it blank to search all" size="70">
    </div>

<!-- 空行 -->
<br>

    <!-- 搜索 Related Part name -->
    <div>
    <label for = "SCPTNAME">Search data by Related Part name :&nbsp &nbsp &nbsp </label>
    <input type="text"  value= "" name="SCPTNAME" placeholder ="Input part name your want to search or or Leave it blank to search all" size="70" >
    </div>

<!-- 空行 -->
<br>


    <!-- 搜索 report issue Type -->
    <div> 
    <label for = "SCISTYPE">  Search data by Related Issue Type:&nbsp &nbsp &nbsp </label>
  <select name ="SCISTYPE">
  <option value="" selected >Select report issue type for search or or Leave it blank to search all &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp </option>
  <option value = "Other">Other</option>
  <option value = "Design issue" >Design issue</option>
  <option value= "Assembly issue" >Assembly issue</option>
  <option value= "Measurement issue" >Measurement issue</option>
  <option value= "Test/Validation setup issue" >Test/Validation setup issue</option>
      </select>
      </div>

<!-- 空行 -->
<br>

    <div> 
    <label for = "SCDESCRIP"> Search data by Report Description:&nbsp &nbsp &nbsp </label>
    <input type="text" value= "" name="SCDESCRIP" placeholder ="input report descriptions your want to search or Leave it blank to search all" size="70">
  </div>


<!-- 空行 -->
<br>

<!-- Create submit button -->
  <input type="submit" value = "Click to Show Search Result"  name = "submit" style="color:blue" /> &nbsp;

</form>





<!-- 空行 -->
<br>





  <!-- 紫色分割线 -->
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>




<!-- 下部蓝色 data base display form -->
<div 
style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
<p>
  <vi style="color:rgb(255, 255, 255);font-size:25px;font-weight:bold;"> Report in Current Database</vi>
  <vi style="color:aqua;font-size:14px;font-weight:bold;"> &nbsp; &nbsp; Data will refresh automatically during window load, or manually refresh to see latest table</vi>
</p>
</div>


<style type="text/css">
  h1{
    text-align: left;
  }
table{
border-collapse:collapse;border-spacing:0;border-left:1px solid #888;border-top:1px solid #888;background:#ffffff; Opacity: 0.7}

th{border-right:1px solid #888 ;border-bottom:1px solid #888;padding:1px 5px;}
th{font-size: 16px; font-weight:bold; background:rgb(232, 229, 229);}

td{border-right:1px solid #888;border-bottom:1px solid #888;padding:1px 1px; }

</style>


<table border="1px" style=" width: 80%; max-width: 80%; table-layout:fixed ;word-break:normal; word-wrap:break-word;">
  <thead>
      <tr>
<th>Item Index</th>
<th>Report Date</th>
<th>Report Engineer Name</th>
<th>Report Part Name</th>
<th>Report Issue Type</th>
<th>Report Descriptions</th>
      </tr>
  </thead>

<col style="width: 6%" />
<col style="width: 10%" />
<col style="width: 15%" />
<col style="width: 12%" />
<col style="width: 20%" />
<col style="width: 60%" />

  <tbody>
      <?php
          while($row = mysqli_fetch_assoc($result)){?>
          <tr>
              <td><?php echo $row['itemid']; ?></td>
              <td><?php echo $row['reportdate']; ?></td>
              <td><?php echo $row['reportengineername']; ?></td>
              <td><?php echo $row['reportpartname']; ?></td>
              <td><?php echo $row['reportissuetype']; ?></td>
              <td><?php echo $row['reportdescription']; ?></td>
          <tr>
      <?}?>
  </tbody>
</table>


<!-- 空行 -->
<br>





  <!-- 紫色分割线 -->
  <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>

<!-- 最下部蓝色 Echarts area  -->
<div 
style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
<p>
  <vi style="color:rgb(255, 255, 255);font-size:25px;font-weight:bold;"> Below area show the Charts</vi>
</p>
</div>


<div class="row">
    <div class="col-md-6" style="float:left;">

<!-- 折线图图  -->

<div id="main1" style="width: 600px;height:300px; border: 1px solid rgb(127, 127, 127);"></div>
    <script type="text/javascript">

var myChart = echarts.init(document.getElementById('main1'));

var datanamejs = <?php echo $BDname ?>;  
var datavaluejs = <?php echo $BDvalue ?>;  

// console.log(datanamejs);

var option = {
  title: {
    text: 'Issue report QTY per daily'
  },
  tooltip: {
            trigger: 'axis'
        },
        legend: {},
        toolbox: {
            show: true,
            feature: {
                dataZoom: {
                    yAxisIndex: 'none'
                },
                dataView: { readOnly: false },
                magicType: { type: ['line', 'bar'] },
                restore: {},
                saveAsImage: {}
            }
        },

  xAxis: {
    type: 'category',
    data: datanamejs
    // axisLabel: {
    //      interval: 5,
    // }

  },

  grid: {
      x: 25,
      y: 45,
      x2: 5,
      y2: 25,
      borderWidth: 1,
    },


  yAxis: {
    type: 'value'
  },


  series: [
    {
      data:  datavaluejs,
      type: 'bar'
    }
  ]


};

myChart.setOption(option);
    </script>
</div>



<!-- 按照issue type 分的饼图 -->

<div class="col-md-6" style="float:left; position: relative; left: 10px ">

<div id="main2" style="width: 300px;height:300px; border: 1px solid rgb(127, 127, 127);"></div>
    
    <script type="text/javascript">

      var myChart = echarts.init(document.getElementById('main2'));

      var pienamejs = <?php echo $BDpiename ?>;  
      var pievaluejs = <?php echo $BDpievalue ?>;  

      // console.log(pienamejs);
      // console.log(pievaluejs);

      var jsonpie = [];
      var array= {};
      for (var i = 0; i < pienamejs.length; i++) {
      array['value'] = pievaluejs[i];
      array['name'] = pienamejs[i]
      jsonpie.push (array)
      array = {};
      }
      // console.log(jsonpie);




      var option = {

        title: {
    text: 'Issue QTY QTY list'
  },

  legend: {
                        orient: 'vertical',
                        x: 'left',
                        y: 'bottom',
                        textStyle: {
                        fontSize: 10
                        },
                    },


  toolbox: {
    show: true,
    feature: {
      mark: { show: true },
      dataView: { show: true, readOnly: false },
      restore: { show: true },
      saveAsImage: { show: true }
    }
  },
  series: [
    {
      name: 'Nightingale Chart',
      type: 'pie',
      radius: [20, 80],
      center: ['50%', '38%'],
      labelLine:{  
                normal:{  
                    length:3  
                }  
            },  




      roseType: 'area',
      itemStyle: {
        borderRadius: 3
      },
      data: jsonpie
    }
  ]
};
        myChart.setOption(option);
  </script>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


   <!-- 最下方部蓝色 评论区 -->
   <div 
    style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
    <h3><span style="color: #ffffff; font-size: 25px; float:none; "> Below area is for message board </span></h3>
    </div>

  <!-- 为递交数据进数据库做准备-->


    <form action="http://localhost/LinktoMessage.php" method="post"  name='iframeForm'  target="iframeForm">

     <div>

    <!-- 01-新建 Message Engineer Name -->
      <label for = "MESSNAME" style="color: #5F9EA0" >Name: </label>
      <input type="text" id ="MESSNAME" name ="MESSNAME" value="Default (匿名)" size="12"   
      onmouseover=this.focus();this.select();   
      onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
      onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />
      &nbsp &nbsp &nbsp &nbsp



    <!-- 02-新建 Message time -->
 
      <label for = "message date" style="color: #5F9EA0"  >Date (Auto fill in):</label>
      <input type="datetime" id ="MESSDATE" name ="MESSDATE" 
      onmouseover=this.focus();this.select();   
      onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
      onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" readonly />

      </div>


<br>

<div>
 <!-- 03-新建 Message Description -->
<label for = "MESSDESCRIP" style="color: #5F9EA0"> Add Message Board descriptions here: </label>
</div>

<div>
<textarea 
id="MESSDESCRIP" name ="MESSDESCRIP" 
style="min-height: 50px; min-width: 700px;max-height: 50px; max-width: 700px;"
placeholder ="Add message here:"
onmouseover=this.focus();this.select();   
onclick="if(value==defaultValue){value='';this.style.color='#000'}"   
onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:rgb(200, 200, 200)" />
</textarea>
</div>

  <!-- 空行 -->
  <br>


<!-- Create message submit button -->

   <input type="submit" value = "    Submit the message " name = "messsubmit" style="color: #5F9EA0" onclick="javascript:location.reload()" /> &nbsp;

   </form>
   <iframe id="iframeForm" name="iframeForm" style="display:none;"></iframe>

<!-- 空行 -->
<br>

<!-- 空行 -->
<br>




<style type="text/css" name = css1 >
  h1{
    text-align: left;
  }
table{
border-collapse:collapse;border-spacing:0;border-left:0px solid #888;border-top:0px solid #888;background:#ffffff; Opacity: 0.7}

th{border-right:0px solid #888 ;border-bottom:0px solid #888;padding:1px 5px;  }
th{font-size: 14px; font-weight:bold; background:rgb(232, 229, 229);}

td{border-right:0px solid #888;border-bottom:0px solid #888;padding:1px 1px; font-size: 14px; }

</style>


<table border="0px" style=" width: 52%; max-width: 52%; table-layout:fixed ;word-break:normal; word-wrap:break-word; color: #5F9EA0">
  <thead>
      <tr>
<th>Message Date</th>
<th>Sender</th>
<th>Message content</th>
      </tr>
  </thead>

<col style="width: 22%" />
<col style="width: 15%" />
<col style="width: 70%" />


  <tbody>
      <?php
          while($row = mysqli_fetch_assoc($resultmess)){?>
          <tr>
              <td style="color:#9966CC"><?php echo $row['messdate']; ?></td>
              <td style="color:#9966CC"><?php echo $row['messuser']; ?></td>
              <td style="color:#9966CC"><?php echo $row['messdescrip']; ?></td>
          <tr>
      <?}?>
  </tbody>
</table>


<br>
<br>
<div 

<!-- 紫色分割线  -->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color=#987cb9 SIZE=3>
<p>
  <vi style="color:rgb(127, 127, 127);font-size:20px;font-weight:bold; float:left;"> --- The End, Thanks For Review --- </vi>
</p>
</div>
<br>
<br>



</body>


<!-- 增加当前日期到 新建表单 时间栏位，便于 进行 统计计算和输出 Echarts ，不会产生00-00-00-00的日期，-->
<script type="text/javascript">
        var start = document.getElementById("CTDATE");
        var date = new Date();
        var month_t = date.getMonth().toString();
        if (date.getMonth() + 1 < 10)
            month_t = '0' + (date.getMonth() + 1);

        var day_t = date.getDate().toString();
        if (date.getDate() < 10)
            day_t = '0' + (date.getDate() + 1)

        var dateString = date.getFullYear() + "-" + (month_t) + "-" + day_t;
        start.value = dateString;
    </script>


<!-- 增加当前日期到 message board -->
<script type="text/javascript">
        var start = document.getElementById("MESSDATE");
        var date = new Date();
        var month_t = date.getMonth().toString();
        if (date.getMonth() + 1 < 10)
            month_t = '0' + (date.getMonth() + 1);

        var day_t = date.getDate().toString();
        if (date.getDate() < 10)
            day_t = '0' + (date.getDate() + 1)

       var hour_t = date.getHours().toString();
        if (date.getHours() < 10)
        hour_t = '0' + (date.getHours());

        var minute_t = date.getMinutes().toString();
        if (date.getMinutes() < 10)
        minute_t = '0' + (date.getMinutes());

        var second_t = date.getSeconds().toString();
        if (date.getSeconds() < 10)
        second_t = '0' + (date.getSeconds());

    
        var datetime = date.getFullYear() + "-" + (month_t) + "-" +( day_t) + " " +(hour_t) + ":" +(minute_t)  + ":" +(second_t)        ;

        // console.log(datetime);
        
        start.value = datetime;
        
    </script>




<!-- 递交message board 之后，保持屏幕位置不变，滚动条位置不变，只刷新网页 -->
<script type="text/javascript">
            function  Trim(strValue)     
            {     
//return   strValue.replace(/^s*|s*$/g,""); 
return strValue;     
            }
            function SetCookie(sName,sValue)     
            {     
                   document.cookie = sName + "=" + escape(sValue);     
           }   
           function GetCookie(sName)     
           {     
                 var aCookie = document.cookie.split(";");     
               for(var i=0; i < aCookie.length; i++)     
               {     
                     var aCrumb = aCookie[i].split("=");     
                   if(sName == Trim(aCrumb[0]))     
                   {     
                       return unescape(aCrumb[1]);     
                   }     
                  }     
  return null;     
             } 
           function scrollback()     
           {     
                 if(GetCookie("scroll")!=null){document.body.scrollTop=GetCookie("scroll")}     
           }     
     </script>



</html>
