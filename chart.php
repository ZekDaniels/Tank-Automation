
<?php 

include "header.php";
$page_title = "Chart";
include "in_top_body.php";
include "ayar.php";

?>
 
 <div class="row">
            <!-- chart morris start -->
            <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Tanks Chart
              </header>
              <div class="table-responsive">
                <table class="table" id="datatable" name="datatable" width="90%">
                  <thead>
                    <tr>  
					<th>ID</th>
					  <th>TankID</th>
					   <th>Plate</th>
					 <th>Min Temperature</th>
					  <th>Max Temperature</th>
                      <th>Min Pressure</th>
                      <th>Max Pressure</th>
                      <th>Min Speed</th>  
					  <th>Max Speed</th>  					
                    </tr>
                  </thead>
                  <tbody id="tbody">  
                  </tbody>
                </table>											
							 			               
              </div>		  
            </section>			
          </div>
        </div>
                    </section>
              </div>
 </div>
 
  <script src="Datatables/datatables.js"></script>
   <script src=" Datatables/datatables.min.js"></script>
 <script type="text/javascript">
 
 jQuery(function ($){
	 
	     $( window ).on( "load", function() {		      
	table =	$('#datatable').DataTable( {
			
				"columns": [
		{ "data": "id" },	
		{ "data": "tankid" },	
		{ "data": "plate" },		
		{ "data": "mintemp" },
		{ "data": "maxtemp" },
		{ "data": "minpress" },
		{ "data": "maxpress" },
		{ "data": "minsp" },
		{ "data": "maxsp" }	
		],	
		 "ajax": {  
		"url": "sensor_database.php?islem=fillsensor",
       " type": "POST",  
		"dataSrc": "",
				
		 }
	});
		   
			});
			
	 $('#tbody').on( 'dblclick', 'tr', function () {
       if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
			var id = table.row('.selected').data().id ;
			var plate = table.row('.selected').data().plate;			
			window.location = "gauge.php?&ID="+id+"&Plate="+plate;
		}						
    } );		
 });
</script>



<?php include "footer.php"; ?>