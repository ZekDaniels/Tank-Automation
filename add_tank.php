<?php 

include "header.php";

$page_title = "Add Tank";
include "in_top_body.php";
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
					
					 <div class="col-lg-6">
                      <label for="plate" class="col-lg-2">License Plate*</label>
                        <input class=" form-control" type="text" id="plate" name="plate" style="text-transform:uppercase;" maxlength="10"  required />
                      </div>					 
					<div class="col-lg-6">
                      <label for="personname" class=" col-lg-2">Person Name*</label>
                      <input class="form-control " id="personname" name="personname" style="text-transform:capitalize;" type="text" required  />
					</div>
					 </div>
										
                    <div class="row form-group ">
					
					  <div class="col-lg-6">
                        <label for="telno" class=" col-lg-2">Phone Number*</label>   
                        <input class=" form-control" id="telno" name="telno" type="text" maxlength="10"  required />
                      </div>
					  
						<div class="col-lg-6">
					 <label class="control-label col-lg-2" for="product" >Product Type*</label>
                    <div class="col-lg-12">
                      <select class="form-control m-bot15" id="product" name="product">
                                              <option value="LPG">LPG</option>
                                              <option value="Gasoline">Gasoline</option>
                                              <option value="Diesel">Diesel</option>
                                           
                                          </select>
                      </div>   
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
                Tanks
              </header>
              <div class="table-responsive">
                <table class="table" id="datatable" name="datatable" width="90%">
                  <thead>
                    <tr>  
					 <th>ID</th>
					  <th>License Plate</th>
                      <th>Person Name</th>
                      <th>Product Type</th>
                      <th>Phone Number</th>  
					  <th>Add Sensor</th>  
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
        <!--Table end -->
        <!-- statics end -->   
		
    
  
<?php include "footer.php"; 
/*
}
else {

header('Location: login.php');

}*/
$page_title = "Add Members";
  ?>
  
  <script src="Datatables/datatables.js"></script>
   <script src=" Datatables/datatables.min.js"></script>
    <script  type="text/javascript">
		
	 jQuery(function ($){
		
	 var table;   //fill datatable
	  	
	  $( document ).ready(function() {
		 
    });
 
    $( window ).on( "load", function() {		      
	table =	$('#datatable').DataTable( {
			
				"columns": [
		{ "data": "id" },				
		{ "data": "plate" },
		{ "data": "personname" },
		{ "data": "product" },	
		{ "data": "telno" },
		{ "data": null, "defaultContent": "" }
		],	
		"columnDefs": [ {
    "targets": -1,
    "createdCell": function(td, cellData, rowData, row, col) {
           $(td).prepend(
             "<button class='col-lg-offset-4' style='border-radius:50%; background-color:#008CBA; border-color:#008CBA; color:white;' >+</button>"
           );
         }
     } ],	
		 "ajax": {  
		"url": "tank_database.php?islem=filltank",
       " type": "POST",  
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
			window.location = "edit_tank.php?ID="+id;
		}						
    } );
	
	 $('tbody').on( 'click', 'button', function () {
        var id = table.row( $(this).parents('tr')).data().id;
		var plate = table.row( $(this).parents('tr')).data().plate;
			  
		window.location = "add_sensor.php?&ID="+id+"&Plate="+plate;
			 
    } );
/*
	$("#plate").keyup(function(){
    this.value = this.value.toUpperCase();
	});*/
	$("#telno").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
	
	 $("#save").on("click", function (event) {//save
     event.preventDefault();		 
	
    var plate = $('input[name="plate"]').val();//input
	var product = $('select[name="product"]').children("option:selected").val();	
	var personname = $('input[name="personname"]').val();				
	var telno=$('input[name="telno"]').val();

	
	//Boş mu?
if((typeof(plate) == 'undefined' || plate == null ||plate.trim() == "")||(typeof(product) == 'undefined' || product == null ||product.trim() == "") ||
(typeof(personname) == 'undefined' || personname == null ||personname.trim() == "")||(typeof(telno) == 'undefined' || telno == null ||telno.trim() == ""))
{	
		alert("Please do not leave empty input.");
		return false;
}
else
{
	
	if(telno.length!=10)//telefon numarası kontrolü
	{		
	alert("You entered a missing or incorrect character in the phone number. Please put 0 per character and try with 10 characters.");	
	die();
	return false;
	}

	//jsona dönüştürme
	 var JSON_Data = "{"+'"'+"plate"+'"'+":"+'"'+plate+'"'+","+'"'+"product"+'"'+":"+'"'+product+'"'+
	 ","+'"'+"personname"+'"'+":"+'"'+personname+'"'+ ","+'"'+"telno"+'"'+":"+'"'+telno+'"'+"}";
	 
    $.ajax({//ajax işlemleri
        url: "save.php?islem=ekletank",
        type: "POST",//post tipinde
        data: "deger="+JSON_Data,	//yukarıda oluşturdğumuz json dosyasını atıyoruz		
        success: function (cevap) {//sonuc döndürür php dosyasında bastığımız echo gibi işlemleri cevaba atar
			alert(cevap);  		
		$('#datatable').DataTable().ajax.reload();//sayfayı yenilemeden tabloya eklesin diye
        }		
		
    });
	
}	
});

	 }	); 
    </script>

	
 