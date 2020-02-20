
<?php 

include "header.php";
$page_title = "Chart";
include "in_top_body.php";
include "ayar.php";
$count = $db->querySingle("SELECT Count(*) FROM Sensor ");
$id=$_GET['ID'];	
$plate=$_GET['Plate'];


/*
//id
$queryid = "Select id FROM Sensor;";
$result = $db->query($queryid);

for($j= 0;$j <= $count;$j++)
	{
	
		if($j>0)
		{
			$rowsid[$j] = $result->fetchArray();
		foreach($rowsid as $rowid)
			{
		
		$id[$j-1]= $rowid['id'];
		
		
		//echo $id[$j-1];echo "id";
		//echo "<br> <br>";
		//$trueid[$j] = $id[$j-1];
		//echo $trueid[$j];echo "id";
		//echo "<br> <br>";
		
		}		
		}
	}	
//echo $id[0];
*/	

//main

	
	
$querydata = "Select mintemp,maxtemp,minpress,maxpress,minsp,maxsp FROM Sensor  WHERE id='$id';";
$result = $db->query($querydata);
$rowsdata = $result->fetchArray();

	

				
		$mintemp= $rowsdata['mintemp'];
		$maxtemp= $rowsdata['maxtemp'];
		$minpress= $rowsdata['minpress'];
		$maxpress= $rowsdata['maxpress'];
		$minkm= $rowsdata['minsp'];
		$maxkm= $rowsdata['maxsp'];
		
		//var_dump($mintemp[$i-1]);echo "mintemp";
				
	//echo $maxkm;
?>
 
 <div class="row">
            <!-- chart morris start -->
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  <h3>Gauge Chart</Char>
                      </header>
                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->
                         <!-- Bar -->
                          <div class="col-lg-12">
                              <section class="panel">
                                  <header class="panel-heading">
                                      <?php echo $plate ?>
                                  </header>
								  <div class ="table-responsive">
								   <div class="row col-lg-12">
                                  <div id="chart_div" class ="table-responsive col-lg-offset-3" > </div>
								  </div>
								  
								  <div class="row col-lg-12">
								  <div class="fa fa-check fa-3x col-lg-offset-4" style="color:#7cfc00;" id="temp" > </div>
								  <div class="fa fa-check fa-3x" style=" color:#7cfc00; margin-left:14%;" id="press"> </div> 
								  <div class="fa fa-check fa-3x" style="color:#7cfc00; margin-left:15.5%;" id="speed"> </div>
								  </div>
                                  </div>
								  
								  </div>
								
                              </section>
                          </div>
                      </div>
                                          
                      </div>
                      </div>
                    </section>
              </div>
 </div>

 <script type="text/javascript" src="js/loader.js"></script>
 <script type="text/javascript">
 
google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temprature', 80],
          ['Pressure', 55],
          ['Speed', 68]
        ]);

        var options = {
          width: 800, height: 200,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
		var random;
        chart.draw(data, options);
	
        setInterval(function() {
		  var random = Math.floor((Math.random() * 100) + 1);
          data.setValue(0, 1, random);
          chart.draw(data, options);
		 
		 if(random > <?php echo $maxtemp ?> || random < <?php echo $mintemp ?>)
		  {
		  $("#temp").addClass("fa fa-exclamation-triangle fa-3x col-lg-offset-4");
		  $('#temp').css({'color':'red'});
		  }
		  else
		  {
		  $("#temp").removeClass("fa fa-exclamation-triangle fa-3x col-lg-offset-4");
		  $("#temp").addClass("fa fa-check fa-3x col-lg-offset-4");
		  $('#temp').css({'color':'#7cfc00'});
		  }
        }, 2000);
		
        setInterval(function() {
		  var random = Math.floor((Math.random() * 100) + 1);
          data.setValue(1, 1, random);
          chart.draw(data, options);
		 if(random > <?php echo $maxpress ?> || random < <?php echo $minpress ?>)
		 {
		  $("#press").addClass("fa fa-exclamation-triangle fa-3x");
		  $('#press').css({'color':'red'});
		 }
		 else
		 {
		  $("#press").removeClass("fa fa-exclamation-triangle fa-3x");
		  $("#press").addClass("fa fa-check fa-3x");
		  $('#press').css({'color':'#7cfc00'});
		 }
        }, 1321);		 
        setInterval(function() {
		  var random = Math.floor((Math.random() * 100) + 1);
          data.setValue(2, 1, random);
          chart.draw(data, options);
		   if(random > <?php echo $maxkm ?> || random < <?php echo $minkm ?>)
		   {
		   $("#speed").addClass("fa fa-exclamation-triangle fa-3x");
		   $('#speed').css({'color':'red'});
		   }
		   
		    else
		 {
		  $("#speed").removeClass("fa fa-exclamation-triangle fa-3x");
		  $("#speed").addClass("fa fa-check fa-3x");
		  $('#speed').css({'color':'#7cfc00'});
		 }
        }, 989);
		
		
      }
</script>



<?php include "footer.php"; ?>