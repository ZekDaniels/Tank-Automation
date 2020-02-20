<?php 

include "header.php";
include "ayar.php";


$id=$_GET['ID'];		
$page_title = "Edit User";
$query = "Select * from Uyeler where id='$id'";
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
                        <label class="control-label col-sm-4">Email*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['email'];?>"  id="email" name="email" type="email" required disabled  >
                        </div>
                      </div>
                      
					  
                      <div class="form-group">
                        <label class="control-label col-sm-4">Password*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['password'];?>"id="pass" name="pass" type="text"   maxlength="12" required >
                        </div>
                      </div>
                      
					  
                      <div class="form-group" >
                        <label class="control-label col-sm-4">Confirm Password*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['password'];?>" id="confirm_pass" name="confirm_pass" type="text"  required  >
                        </div>
                      </div>
                      
					  
                      <div class="form-group">
                        <label class="control-label col-sm-4">Person Name*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['personname'];?>" id="personname" name="personname" "type="text" style="text-transform:capitalize;" required >
                        </div>
                      </div>
					  
					    <div class="form-group">
                        <label class="control-label col-sm-4">Person TC Number*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['persontc'];?>" id="persontc" name="persontc" type="text" pattern="\d{11}"  maxlength="11" required  disabled>
                        </div>
                      </div>
					  
					    <div class="form-group">
                        <label class="control-label col-sm-4">Phone Number*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['telno'];?>" id="telno" name="telno" type="text" pattern="\d{11}" maxlength="10" required >
                        </div>
                      </div>
					  
					    <div class="form-group">
                        <label class="control-label col-sm-4">Address*</label>
                        <div class="col-sm-6">
                          <input class="form-control" value="<?php echo $rows['adress'];?>" id="adress" name="adress" type="text" style="text-transform:capitalize;" required >
                        </div>
                      </div>
                     
                <a href="#myModal" data-toggle="modal" id="update" name="update" class="btn btn-primary col-lg-1 ">
								Update
                              </a>
                  <a href="#myModal-2" data-toggle="modal" id="delete" name="delete" class="btn  btn-danger col-lg-1 ">
                                  Delete
                              </a>
			</form>
		  </section>	
		  </div>
		  </div>
		  </div>
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
		
		
	$("#persontc").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});	
		$("#telno").keyup(function (){		
	if (this.value.match(/[^0-9]/g)){
		this.value = this.value.replace(/[^0-9]/g,'');
		}
		});		
		 
	$("#update").on("click", function (event) {//update
		event.preventDefault();
		var email = $('input[name="email"]').val();//input
	var pass = $('input[name="pass"]').val();		
	var confirm_pass=$('input[name="confirm_pass"]').val();		
	var personname=$('input[name="personname"]').val();
	var persontc=$('input[name="persontc"]').val();
	var telno=$('input[name="telno"]').val();
	var adress=$('input[name="adress"]').val();
if((typeof(email) == 'undefined' || email == null ||email.trim() == "") ||(typeof(pass) == 'undefined' || pass == null ||pass.trim() == "")
||(typeof(confirm_pass) == 'undefined' || confirm_pass == null ||confirm_pass.trim() == "") ||(typeof(personname) == 'undefined' || personname == null ||personname.trim() == "")
||(typeof(persontc) == 'undefined' || persontc == null ||persontc.trim() == "")||(typeof(telno) == 'undefined' || telno == null ||telno.trim() == "")||(typeof(adress) == 'undefined' || adress == null ||adress.trim() == ""))
{	
		alert("Please do not leave empty input.");
		return false;
}
else
{
		
	if(email.indexOf("@") == -1)//email kontrolü
	{
		alert("You entered a missing or incorrect character in the mail adress. Please enter a proper email address.");
		die();
		return false;
	}
	if(pass.length<6)//sifre kontrolü
	{		
	alert("please enter 6 or more characters in your password.");	
	die();
	return false;
	}
	if( pass != confirm_pass)//şifre ve doğrulama kontrolü
	{
	alert("Please enter the same password.");	
	die();
	return false;
	}
	if(persontc.length!=11)//TC kontrolü
	{		
	alert("You entered a missing or incorrect character in the persontc. Please put try with 11 characters.");	
	die();
	return false;
	}
	if(telno.length!=10)//telefon numarası kontrolü
	{		
	alert("You entered a missing or incorrect character in the phone number. Please put 0 per character and try with 10 characters.");	
	die();
	return false;
	}
		var JSON_Data = "{"+'"'+"id"+'"'+":"+'"'+<?php echo $id ?>+'"'+","+'"'+"email"+'"'+":"+'"'+email+'"'+","+'"'+"pass"+'"'+":"+'"'+pass+'"'+","+'"'+"confirm_pass"+'"'+":"+'"'+confirm_pass+'"'+
	 ","+'"'+"personname"+'"'+":"+'"'+personname+'"'+","+'"'+"persontc"+'"'+":"+'"'+persontc+'"'+","+'"'+"telno"+'"'+":"+'"'+telno+'"'+
	 ","+'"'+"adress"+'"'+":"+'"'+adress+'"'+"}";		
				$.ajax({
        url: "update.php?islem=guncelleuser",
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
        url: "delete.php?islem=siluser",
        type: "POST",
        data: "deger="+JSON_Data,	
        success: function (cevap) {
			alert(cevap);  		
			window.location = "add_user.php";
		
			}			
    });
		
	   });
});		 

	  
   </script>
  