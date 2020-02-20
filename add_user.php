<?php 

include "header.php";

$page_title = "Add User";
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
				  <div class="row col-lg-12">
                    <div class="row form-group ">
					
					 <div class="col-lg-6">
                      <label for="email" class="col-lg-2">Email *</label>
                        <input class=" form-control" type="email" id="email" name="email"required />
                      </div>
					
					<div class="col-lg-6">
                      <label for="pass" class=" col-lg-2">Password*</label>
                      <input class="form-control " id="pass" name="pass" type="password" pattern=".{6,}" maxlength="12" required  />
					</div>
					 </div>
					
                    <div class="row form-group ">
					  <div class="col-lg-6">
                      <label for="personname" class=" col-lg-2">Person Name*</label>                     
                        <input class=" form-control" id="personname" name="personname" "type="text" style="text-transform:capitalize;" required />
                      </div>
					   
					  <div class="col-lg-6">
                      <label for="confirm_pass" class=" col-lg-2">Confirm Password*</label>                    
                        <input class="form-control " id="confirm_pass" name="confirm_pass" type="password" required />
                      </div>   
                    </div>        
					
                    <div class="row form-group ">
					
					  <div class="col-lg-6">
                      <label for="persontc" class=" col-lg-2">Person TC Number*</label>                    
                        <input class="form-control " id="persontc" name="persontc" type="text" pattern="\d{11}"  maxlength="11" required />
                      </div>
					  				  
					<div class=" col-lg-6">
                      <label for="telno" class=" col-lg-2">Phone Number*</label>                   
                        <input class=" form-control" id="telno" name="telno" type="text" pattern="\d{11}" maxlength="10" required />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="adress" class=" col-lg-2">Address*</label>
                      <div class="col-lg-12">
                        <input class=" form-control" id="adress" name="adress" type="text" style="text-transform:capitalize;" required />
                      </div>
                    </div>                
                    <div class="form-group">
                      <div class="col-lg-offset-0 col-lg-12">
                        <button class="btn btn-primary col-lg-offset-4 col-lg-4" type="button" id ="save" name="save" =>Add</button> 				
                      </div>					    
                    </div>
                  </form>
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
                      <th>Person Name</th>
                      <th>Person TC</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Adress</th>
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
		
    </body>
  
<?php include "footer.php"; 
  ?>
  
  <script src="Datatables/datatables.js"></script>
   <script src=" Datatables/datatables.min.js"></script>
    <script type="text/javascript">
	jQuery(function($) {	
	
		
	 var table;  
	  			

  //fill datatable
	  $( document ).ready(function() {
		 table =	$('#datatable').DataTable( {
				"columns": [
		{ "data": "id" },
		{ "data": "personname" },
		{ "data": "persontc" },
		{ "data": "email" },
		{ "data": "telno" },
		{ "data": "adress" },
		],
		 "ajax": {  
		"url": "user_database.php?islem=filluser",
       " type": "POST",  
		"dataSrc": "",			 
		 }
	});
    });
	
    $( window ).on( "load", function() {	
		
			
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
			window.location = "edit_user.php?ID="+id;
		}						
    } );
		
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
	
	
	
	
	 $("#save").on("click", function (event) {//save
     event.preventDefault();		 
	
    var email = $('input[name="email"]').val();//input
	var pass = $('input[name="pass"]').val();		
	var confirm_pass=$('input[name="confirm_pass"]').val();		
	var personname=$('input[name="personname"]').val();
	var persontc=$('input[name="persontc"]').val();
	var telno=$('input[name="telno"]').val();
	var adress=$('input[name="adress"]').val();
	


	//Boş mu?
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

	//jsona dönüştürme
	 var JSON_Data = "{"+'"'+"email"+'"'+":"+'"'+email+'"'+","+'"'+"pass"+'"'+":"+'"'+pass+'"'+","+'"'+"confirm_pass"+'"'+":"+'"'+confirm_pass+'"'+
	 ","+'"'+"personname"+'"'+":"+'"'+personname+'"'+","+'"'+"persontc"+'"'+":"+'"'+persontc+'"'+","+'"'+"telno"+'"'+":"+'"'+telno+'"'+
	 ","+'"'+"adress"+'"'+":"+'"'+adress+'"'+"}";
	 
    $.ajax({//ajax işlemleri
        url: "save.php?islem=ekleuser",//save_fill.php dosyasındaki ekle metodu
        type: "POST",//post tipinde
        data: "deger="+JSON_Data,	//yukarıda oluşturdğumuz json dosyasını atıyoruz		
        success: function (cevap) {//sonuc döndürür php dosyasında bastığımız echo gibi işlemleri cevaba atar
			alert(cevap);  		
		$('#datatable').DataTable().ajax.reload();//sayfayı yenilemeden tabloya eklesin diye
        }		
		
    });
	
}	
});
	});
	  
    </script>

	
 