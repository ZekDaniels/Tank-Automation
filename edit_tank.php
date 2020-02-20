<?php 

include "header.php";
include "ayar.php";

$id=$_GET['ID'];		
$page_title = "Edit Tank";
$query = "Select * from Tank where id='$id'";
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
                  <?php echo $page_title;?>
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal " action="#">
                      <!--date picker start-->

                      <div class="form-group">
                        <label class="control-label col-sm-4">Licence Plate</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['plate'];?>" type="text" id="plate" name="plate"   style="text-transform:uppercase;" maxlength="10" required  >
                        </div>
                      </div>
                      
					  
                      <div class="form-group">
                        <label class="control-label col-sm-4">Person Name*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['personname'];?>"id="personname" name="personname"  style="text-transform:capitalize;" type="text"   maxlength="12" required >
                        </div>
                      </div>
                      
					  
                      <div class="form-group" >
                        <label class="control-label col-sm-4">Phone Number*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['telno'];?>" id="telno" name="telno"  maxlength="10" type="text"  required  >
                        </div>
                      </div>
                      
					  <div class="form-group">
					
					 <label class="control-label col-sm-4" for="product" >Product Type*</label>
                    <div class="col-sm-6">
                      <select class="form-control " id="product" name="product" >
                                              <option id="LPG" value="LPG" >LPG</option>
                                              <option id="Gasoline" value="Gasoline">Gasoline</option>
                                              <option id="Diesel" value="Diesel">Diesel</option>
                              </select>
                      </div>   
				                    
					</div>
                     
                <a href="#myModal" data-toggle="modal" id="update" name="update" class="btn btn-primary col-lg-1 ">
								Update
                              </a>
                  <a href="#myModal-2" data-toggle="modal" id="delete" name="delete" class="btn  btn-danger col-lg-1 ">
                                 Delete
                              </a>
					</div>			  
			</form>
		  </section>	
		  </div>
		  </div>
		   </body>

	
<?php include "footer.php"; 
 ?>
 
   <script type="text/javascript">
   
   jQuery(function ($){

	 
	$( document ).ready(function (){
		
		});
		 
		 $("#personname").keyup(function (){		
	if (this.value.match(/[^a-zA-Z]/g)){
		this.value = this.value.replace(/[^a-zA-Z]/g,'');
		}
		});	
		
		$("#telno").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});		
		 
	$("#update").on("click", function (event) {//update
		event.preventDefault();
	var plate = $('input[name="plate"]').val();//input	
	var personname=$('input[name="personname"]').val();
	var telno=$('input[name="telno"]').val();
var product = $('select[name="product"]').children("option:selected").val();	
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
	 var JSON_Data = "{"+'"'+"id"+'"'+":"+'"'+<?php echo $id ?>+'"'+","+'"'+"plate"+'"'+":"+'"'+plate+'"'+","+'"'+"product"+'"'+":"+'"'+product+'"'+
	 ","+'"'+"personname"+'"'+":"+'"'+personname+'"'+ ","+'"'+"telno"+'"'+":"+'"'+telno+'"'+"}";	
				$.ajax({
        url: "update.php?islem=guncelletank",
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
        url: "delete.php?islem=siltank",
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
  