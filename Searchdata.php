<?php
$host = "localhost";
$userName = "root";
$userPass = "";
$database = "nettest";

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
  $selectQuery = "SELECT * FROM `nettestform` WHERE `reportengineername` LIKE '%$_POST[SCENGNAME]%' 
  and `reportpartname` LIKE '%$_POST[SCPTNAME]%' 
  and `reportissuetype` LIKE '%$_POST[SCISTYPE]%' 
  and `reportdescription` LIKE '%$_POST[SCDESCRIP]%' 
  ORDER BY `itemid` DESC";




  
    $result = mysqli_query($connectQuery,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}
?>





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






















<!DOCTYPE html>

<html>
    <head>
    
    <meta charset="utf-8">
     
   
    <!--标题栏和网页Logi ico -->

    <link rel="shortcut icon" href="/HXICO.png" type="image/png" />

    <title>Database Search Result </title>

</head>

<body>


  <style type = "text/css">
    body{
    background-image: url(background.png);
    background-repeat: no-repeat;
    background-attachment:fixed;
    }

</style>

<!-- 上部蓝色 Data base display from search result -->
<div 
style="color: rgb(255, 255, 255); background: rgb(36, 148, 242); border: 0px dashed currentcolor; text-align:left">
<p>
  <vi style="color:rgb(255, 255, 255);font-size:25px;font-weight:bold;"> Search result from Database</vi>
  <vi style="color:rgb(31, 24, 222);font-size:15px;font-weight:bold;"> </vi>
</p>
</div>

<input type="button" value = "Back to Main Page " onclick= "window.location.href = 'http://localhost/Mainpage.php'"></button>

<br>
<br>

<script languate=”javascript”>
window.addEventListener('load', function () {
})
</script>



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


</body>
</html>
