<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        margin-top: 100px;
        margin-left: 150px;
        margin-right : 350px;
    }
    .first{
        width: 680px;
        display: flex;
        margin-bottom: 20px;
    }
    .first .container:first-child{
        margin-right: 15px;
    }
    .first .container:last-child{
        margin-left: 15px;
    }
    .foodSelect1{
        margin-right: 20px;
        height: 35px;
        padding-left: 5px;
    }
    .foodSelect2{
        margin-right: 20px;
        height: 35px;
        padding-left: 5px;
    }
    .foodSelect3{
        margin-right: 20px;
        height: 35px;
        padding-left: 5px;
    }
    .card-header{
        display: flex;
        height: 40px;
    }
    #firstCard{
        display: flex;
        width: 500px;
    }
    #secondCard{
        width: 500px;
        height: 180px;
    }
    .done{
        width: 400px;
        height: 35px;
    }
    .second{
        width: 850px;
        display: flex;
    }
    .second .container:first-child{
        margin-right: 10px;
    }
    .second .container:last-child{
        margin-right: 10px;
    }
    .table{
        width: 350px;
    }
</style>
<body>
 
<div class="first">
    <div class="container" id="foodLog">
        <div class="card">
          <div class="card-header">Select food to add to the Food Log</div>
          <form action="#" method="post">
          <?php
              session_start();
              include_once "php/config.php";
              $sql1 = "SELECT Item FROM meals";
              $opt = "";
              $result1 = mysqli_query($conn, $sql1);
              while($row1 = mysqli_fetch_array($result1)){
                foreach($row1 as $item){
                  if(strpos($opt, $item)){
                    $opt = $opt;
                  }
                  else{
                    $opt = $opt."<option value=$item >$item</option>";
                  }
                }
              }
              
            ?>
          <div class="card-body" id="firstCard">
            <h5 style="margin-right: 10px">Breakfast: </h5>
            <select name="foodSelect1" id="foodSelect1" class="foodSelect1" style="width: 300px;">
                <?php echo $opt; ?>
            </select>
          </div> 
          <div class="card-body" id="firstCard">
          <h5 style="margin-right: 30px">Lunch: </h5>
            <select name='foodSelect2' class='foodSelect2' style='width: 300px;'>
                <?php echo $opt; ?>
            </select>
          </div> 
          <div class="card-body" id="firstCard">
          <h5 style="margin-right: 27px">Dinner: </h5>
            <select name="foodSelect3" class="foodSelect3" style="width: 300px;">
                <?php echo $opt; ?>
            </select>
            <button name="submit" class="select3" style="background-color: blue; color: white;">Add Food</button>
          </div>
  </form> 
        </div>
    </div>
    <?php
              include_once "php/config.php";
              $opt1 = "";
              $opt2 = "";
              $opt3 = "";
              $calorie = 0;
              $carbs = 0;
              $protein = 0;
              $fat = 0;
              if(isset($_POST['submit'])){
                $temp1 = $_POST['foodSelect1'];
                $sql2 = "SELECT Item,Calorie,Protein,Carbs,Fat FROM meals WHERE Item = '{$temp1}'";
                
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_array($result2)){
                  $calorie += $row2[1];
                  $protein += $row2[2];
                  $carbs += $row2[3];
                  $fat += $row2[4];
                  foreach($row2 as $item1){
                    if(!strpos($opt1, $item1)){
                      $opt1 = $opt1."<td>$item1</td>";
                    }  
                  }
                  $opt1 = $opt1."<td>Breakfast</td>";
                }
                $temp2 = $_POST['foodSelect2'];
                $sql3 = "SELECT Item,Calorie,Protein,Carbs,Fat FROM meals WHERE Item = '{$temp2}'";
                $result3 = mysqli_query($conn, $sql3);
                while($row3 = mysqli_fetch_array($result3)){
                  $calorie += $row3[1];
                  $protein += $row3[2];
                  $carbs += $row3[3];
                  $fat += $row3[4];
                  foreach($row3 as $item2){
                    if(strpos($opt2, $item2)){
                      $opt2 = $opt2;
                    }
                    else{
                      $opt2 = $opt2."<td>$item2</td>";
                    }
                  }
                  $opt2 = $opt2."<td>Lunch</td>";
                }
                $temp3 = $_POST['foodSelect3'];
                $sql4 = "SELECT Item,Calorie,Protein,Carbs,Fat FROM meals WHERE Item = '{$temp3}'";
                $result4 = mysqli_query($conn, $sql4);
                while($row4 = mysqli_fetch_array($result4)){
                  $calorie += $row4[1];
                  $protein += $row4[2];
                  $carbs += $row4[3];
                  $fat += $row4[4];
                  foreach($row4 as $item3){
                    if(strpos($opt3, $item3)){
                      $opt3 = $opt3;
                    }
                    else{
                      $opt3 = $opt3."<td>$item3</td>";
                    }
                  }
                  $opt3 = $opt3."<td>Dinner</td>";
                }
              }
            ?>
            
    <div class="container" id="calorie">
          <div class="card">
            <div class="card-header">
                Daily Calorie Goal : <p style="color: blue;">
                <?php
                 $a = intval($_SESSION['unique_id']);
                 $conn = mysqli_connect("localhost","root","","fitness");
                  if(!$conn){
                      echo "Databse connected" . mysqli_connect_error() ;
                  }
                  $link = $_GET['link'];

                 $retval = mysqli_query( $conn, "SELECT Height, Weight, Age, Activity FROM counter WHERE user_id = '$a'");
                 while($row = mysqli_fetch_array($retval)) {
                   $h = intval($row['Height']);
                   $w = intval($row['Weight']);
                   $age = intval($row['Age']);
                   $activity =floatval($row['Activity']);
                   $BMR =  floatval((10*$w) + (6.25*$h) - (5*$age) + 5);
                   $cal = intval($BMR*$activity);
                   $WL = intval(($cal/100)*15);
                   if($link == '1'){
                    $totCal = $cal + $WL;
                   }else{
                    $totCal = $cal - $WL;
                   }
                   echo $totCal;
                 }
                ?></p> 
            </div>
            <div class="card-body" id="secondCard">
                <div class="w3-light-grey" style="margin-top: 45px">
                    <div class="w3-container w3-blue" style="width:
                    <?php
                      if(isset($_POST['submit'])){
                        echo round(($calorie/$totCal)*100);
                      }else{
                        echo 0;
                      } 
                    ?>%"><?php echo round(($calorie/$totCal)*100); ?>%</div>
                  </div>
            </div> 
          </div>
    </div>
</div>

<div class="second">
                            
    <div class="container" id="foodConsumed" style="width: 540px;">
        <div class="card">
          <div class="card-header">
              Daily Calorie Goal - <p style="color: blue;">
            </p> 
          </div>
          <div class="container">       
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Food item</th>
                  <th>Calories</th>
                  <th>Proteins(g) in 100gm</th>
                  <th>Carbs(G) IN 100gm</th>
                  <th>Fats(g) in 100gm</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php echo $opt1; ?>
                </tr>
                <tr>
                  <?php echo $opt2; ?>
                </tr>
                <tr>
                  <?php echo $opt3; ?>
                </tr>
              </tbody>
            </table>
          </div>
       </div>
  </div>
  <div class="container" id="breakDown" style="width: 500px; margin-left: 15px">
    <div class="card">
      <div class="card-header">
          Macronutrients Breakdown  
      </div>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Fat', <?php
                      if(isset($_POST['submit'])){
                        echo $fat;
                      }else{
                        echo 3;
                      } 
                  ?>
        ],
        ['Carb', <?php
                      if(isset($_POST['submit'])){
                        echo $carbs;
                      }else{
                        echo 3;
                      } 
                    ?>
        ],
        ['Protein', <?php
                      if(isset($_POST['submit'])){
                        echo $protein;
                      }else{
                        echo 3;
                      } 
                    ?>
        ],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        </script>
   </div>
</div>
      </div>

</body>
</html>
