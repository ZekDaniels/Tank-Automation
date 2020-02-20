<?php include "header.php";
?>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method = "post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input id="email" name="email" type="text" class="form-control" placeholder="xyz@mail.com" >
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input id="pass" name="pass" type="password" class="form-control" placeholder="Password" >
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        <button id="formbtn" name="formbtn" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


<?php include "footer.php"; ?>


 <script type = "text/javascript" >
 
 $("#formbtn").on("click", function (event) {
	 
     event.preventDefault();
	
    var email = $('input[name="email"]').val();
	var pass = $('input[name="pass"]').val();
	console.log(email);
	console.log(pass);
  var JSON_Data = "{"+'"'+"email"+'"'+":"+'"'+email+'"'+","+'"'+"pass"+'"'+":"+'"'+pass+'"'+"}";
    $.ajax({		
        url: "kurulum.php?islem=giris",
        type: "POST",
        data:"deger="+JSON_Data,		
        success: function (cevap) {
			//alert(cevap);
           /* $("#kategoriEkleAlert").html(cevap).hide().fadeIn(700);
            $("#AboneOl").addClass("btn btn-danger");
           // $("#email").hide(1000).fadeIn(3000);
			//$("#pass").hide(1000).fadeIn(3000);
            $("#AboneOl").hide(1000).fadeIn(3000);*/
			
			if(cevap==true)
			{
			window.location = "index.php";
			}
			else alert("Bilgiler Yanlış");
        }
    });
});
  </script>

