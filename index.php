<?php 

include "header.php";
include "top_body.php";
$page_title = "Dashboard";
?>




    <!--main content start-->
    
       
         		
        <!--overview start-->
        
        <div class="row">	
          <div class="col-lg-offset-2 col-lg-4 col-md-3 col-sm-12 col-xs-12">
		  <a class="" href="add_user.php">
            <div class="info-box blue-bg">
              <i class="fa fa-user" ></i>
              <div class="title"><h2 style="font-weight: bold;">USER ADD</h2> </div>			  		  
            </div>
            <!--/.info-box-->
			 </a>			 
		</div>	 
		
			  <div class="col-lg-offset-0 col-lg-4 col-md-3 col-sm-12 col-xs-12">
		  	<a class="" href="add_tank.php">
            <div class="info-box brown-bg">
              <i class="fa fa-truck"></i>
               <div class="title"><h2 style="font-weight: bold;" >TANK ADD</h2></div> 
            </div>
            <!--/.info-box-->
				</a>
          </div>
          </div>
		
          <!--/.col-->

		<div>
         <div class="row">	
	
          <!--/.col-->
		
          <div class="col-lg-offset-2 col-lg-4 col-md-3 col-sm-12 col-xs-12">
		  <a class="" href="chart.php">
            <div class="info-box dark-bg">
              <i class="icon_piechart"></i>
               <div class="title"><h2 style="font-weight: bold;">CHART</h2><h6 style="color:transparent">ADD</h6></div>
            </div>
            <!--/.info-box-->
			</a>
          </div>
		
          <!--/.col-->
		
          <div class="col-lg-offset-0  col-lg-4 col-md-3 col-sm-12 col-xs-12">
		  <a class="" href="https://www.mepsan.com.tr/en/" target="_blank"> 
            <div class="info-box green-bg">
              <i class="fa fa-phone"></i>
               <div class="title"><h3 style="font-weight: bold;color:">CONTACT</h3></div>
            </div>
            <!--/.info-box-->
				</a>
				
          </div>
		</div>
          <!--/.col-->

        </div>
        <!--/.row-->


        <div class="row" >
          <div class="col-lg-12 col-md-12" >

            <div class="panel panel-default" >
              <div class="panel-heading">
                <h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map"  >
                <div id="map" style="height:380px; "></div>
              </div>

            </div>
          </div>
        
        </div>


        <!-- Today status end -->
		 
		 
        
        <!-- statics end -->   
		
    
  
<?php include "footer.php"; ?>
 
		
    <script>
  

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
	  
	  //marker
	   var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 59.325, lng: 18.070}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: 59.327, lng: 18.067}
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }


    </script>

	
 