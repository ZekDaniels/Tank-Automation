<?php 
include "header.php";

$page_title = "Add Sensor";
include "in_top_body.php";
$tankid=$_GET['ID'];	
$plate=$_GET['Plate'];

?>    
	<!-- Form validations -->
	<div class="row">
         <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              <?php echo $page_title ?>
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form">
				  <div class="row col-lg-12 ">
                    <div class="row form-group ">
					
					 <div class="col-lg-offset-1 col-lg-1">
                      <label for="mintemp" class="col-lg-1">Min Temperature*</label>
                        <input class=" form-control" t id="mintemp" name="mintemp" type="text" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxtemp" class="col-lg-1">Max Temperature*</label>
                      <input class="form-control " id="maxtemp" name="maxtemp" type="text" required  />
					</div>
					
					 <div class="col-lg-offset-2 col-lg-1">
                      <label for="minpress" class="col-lg-1">Min Pressure*</label>
                        <input class=" form-control"  id="minpress" name="minpress"  type="text" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxpress" class=" col-lg-1">Max Pressure*</label>
                      <input class="form-control " id="maxpress" name="maxpress"  type="text" required  />
					</div>
					
					<div class="col-lg-offset-2 col-lg-1">
                      <label for="minkm" class="col-lg-1">Min Speed*</label>
                        <input class=" form-control" id="minsp" name="minsp"  type="text" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxsp" class=" col-lg-1">Max Speed*</label>
                      <input class="form-control " id="maxsp" name="maxsp" type="text" required  />
					</div>
					
					
					 </div>                                               
                    <div class="form-group">
                      <div class="col-lg-offset-0 col-lg-12">
                        <button class="btn btn-primary col-lg-offset-5 col-lg-2" type="button" id ="save" name="save">Save</button> 				
                      </div>
                    </div>
                  </form>
                </div>
              </div>            
			</div>
		  </section>
		 </div>
	</div>
	    <!-- Form validations end -->
	   
		<!--Table start -->
            <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Responsive tables
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
<?php 
include "footer.php";
?>
<script src="Datatables/datatables.js"></script>
   <script src=" Datatables/datatables.min.js"></script>
   
<script type="text/javascript">
jQuery(function ($){
		
	 var table;   //fill datatable
	  var tankid;
	  $( document ).ready(function() {
	tankid = <?php echo $tankid; ?>;
	plate = "<?php echo $plate; ?>";//text olduğu için bu şekilde olması gerekiyor

    });
 /*
	$("#mintemp").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#minpress").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#minsp").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#maxtemp").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#maxpress").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#maxsp").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
*/

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
        "type": "POST",
		    
		"dataSrc": "",	
		
		 }
	});
		   
			});
		
	//double click	
   $('#tbody').on( 'dblclick', 'tr', function () {
       if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
			var id = table.row('.selected').data().id ;	
			window.location = "edit_sensor.php?&ID="+id+"&Plate="+plate;
		}						
    } );
	
	 

	
	
	 $("#save").on("click", function (event) {//save
     event.preventDefault();		 
	
    var mintemp = $('input[name="mintemp"]').val();//input	
	var maxtemp = $('input[name="maxtemp"]').val();		
	var minpress = $('input[name="minpress"]').val();
	var maxpress = $('input[name="maxpress"]').val();		
	var minsp = $('input[name="minsp"]').val();
	var maxsp = $('input[name="maxsp"]').val();			


	
	//Boş mu?
if((typeof(mintemp) == 'undefined' || mintemp == null ||mintemp.trim() == "")||(typeof(maxtemp) == 'undefined' || maxtemp == null ||maxtemp.trim() == "") ||
(typeof(minpress) == 'undefined' || minpress == null ||minpress.trim() == "")||(typeof(maxpress) == 'undefined' || maxpress == null ||maxpress.trim() == "")||
(typeof(minsp) == 'undefined' || minsp == null ||minsp.trim() == "")||(typeof(maxsp) == 'undefined' || maxsp == null ||maxsp.trim() == ""))
{	
		alert("Please do not leave empty input.");
		return false;
}
else
{
	
	//jsona dönüştürme
	 var JSON_Data = "{"+'"'+"plate"+'"'+":"+'"'+plate+'"'+","+'"'+"tankid"+'"'+":"+'"'+tankid+'"'+","+'"'+"mintemp"+'"'+":"+'"'+mintemp+'"'+","+'"'+"maxtemp"+'"'+":"+'"'+maxtemp+'"'+
	 ","+'"'+"minpress"+'"'+":"+'"'+minpress+'"'+ ","+'"'+"maxpress"+'"'+":"+'"'+maxpress+'"'+","+'"'+"minsp"+'"'+":"+'"'+minsp+'"'+
	 ","+'"'+"maxsp"+'"'+":"+'"'+maxsp+'"'+"}";
	 
    $.ajax({//ajax işlemleri
        url: "save.php?islem=eklesensor",
        type: "POST",//post tipinde
        data: "deger="+JSON_Data,	//yukarıda oluşturdğumuz json dosyasını atıyoruz		
        success: function (cevap) {//sonuc döndürür php dosyasında bastığımız echo gibi işlemleri cevaba atar
			alert(cevap);  		
		$('#datatable').DataTable().ajax.reload();//sayfayı yenilemeden tabloya eklesin diye
        }		
		
    });
	
}	
});

	 } );
</script>
