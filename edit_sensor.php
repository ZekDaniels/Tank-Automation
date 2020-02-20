<?php 

include "header.php";
include "ayar.php";

$id=$_GET['ID'];		
$page_title = "Edit Sensor";
$query = "Select * from Sensor where id='$id'";
$result = $db->query($query);
$rows = $result->fetchArray();
include "in_top_body.php";
 
?>
	
 
		
 <div class="row">
          <div class="col-lg-12">

            <div class="row">
            <div class="col-lg-offset-0 col-lg-12">
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
                        <input class=" form-control"  id="mintemp" name="mintemp" type="text" value="<?php echo $rows['mintemp'];?>" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxtemp" class="col-lg-1">Max Temperature*</label>
                      <input class="form-control" id="maxtemp" name="maxtemp" type="text" value="<?php echo $rows['maxtemp'];?>" required  />
					</div>
					
					 <div class="col-lg-offset-2 col-lg-1">
                      <label for="minpress" class="col-lg-1">Min Pressure*</label>
                        <input class=" form-control"  id="minpress" name="minpress"  type="text" value="<?php echo $rows['minpress'];?>" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxpress" class=" col-lg-1">Max Pressure*</label>
                      <input class="form-control " id="maxpress" name="maxpress"  type="text" value="<?php echo $rows['maxpress'];?>" required  />
					</div>
					
					<div class="col-lg-offset-2 col-lg-1">
                      <label for="minsp" class="col-lg-1">Min Speed*</label>
                        <input class=" form-control" id="minsp" name="minsp"  type="text" value="<?php echo $rows['minsp'];?>" required />
                      </div>					 
					<div class=" col-lg-1">
                      <label for="maxsp" class=" col-lg-1">Max Speed*</label>
                      <input class="form-control " id="maxsp" name="maxsp" type="text" value="<?php echo $rows['maxsp'];?>" required  />
					</div>
					
					
					 </div>                                               
                   <a href="#myModal" data-toggle="modal" id="update" name="update" class="btn btn-primary col-lg-1 ">
								Update
                              </a>
                  <a href="#myModal-2" data-toggle="modal" id="delete" name="delete" class="btn  btn-danger col-lg-1 ">
                                 Delete
                              </a>
                  </form>
                </div>
              </div>            
			</div>
		  </section>
		  </div>
		  </div>
		   </body>
	</div>
	</div>
	
<?php include "footer.php"; 
 ?>
 
   <script type="text/javascript">
   
   jQuery(function ($){

	 
	$( document ).ready(function (){		
		});
		 
				 
	$("#update").on("click", function (event) {//update
		event.preventDefault();
		
	  var mintemp = $('input[name="mintemp"]').val();//input	
	var maxtemp = $('input[name="maxtemp"]').val();		
	var minpress = $('input[name="minpress"]').val();
	var maxpress = $('input[name="maxpress"]').val();		
	var minsp = $('input[name="minsp"]').val();
	var maxsp = $('input[name="maxsp"]').val();			


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
	var JSON_Data = "{"+'"'+"id"+'"'+":"+'"'+<?php echo $id ?>+'"'+","+'"'+"mintemp"+'"'+":"+'"'+mintemp+'"'+","+'"'+"maxtemp"+'"'+":"+'"'+maxtemp+'"'+
	 ","+'"'+"minpress"+'"'+":"+'"'+minpress+'"'+ ","+'"'+"maxpress"+'"'+":"+'"'+maxpress+'"'+","+'"'+"minsp"+'"'+":"+'"'+minsp+'"'+
	 ","+'"'+"maxsp"+'"'+":"+'"'+maxsp+'"'+"}";
				$.ajax({
        url: "update.php?islem=guncellesensor",
        type: "POST",
        data: "deger="+JSON_Data,	
        success: function (cevap) {
			alert(cevap);  		
	
		
        }			
    });			
	}					
	   });
	   
	   
	   var JSON_Data = "{"+'"'+"id"+'"'+":"+'"'+<?php echo $id ?>+'"'+"}";
	   $("#delete").on("click", function (event) {//delete
		event.preventDefault();
		$.ajax({
        url: "delete.php?islem=silsensor",
        type: "POST",
        data: "deger="+JSON_Data,	
        success: function (cevap) {
			alert(cevap);  		
			window.location = "add_tank.php";
		
			}			
    });
		
	   });
});		 

	  
   </script>
  