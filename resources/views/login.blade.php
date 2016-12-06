<html style="background-color: #D9D0CB; height:100%;">
<head>
	<title></title>
	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

        
	
</head>
<body style="background-color: #D9D0CB; height:100%;">


@include('alerts.request')

@if(Session::has('message-error'))
<div id="mensajeCreadoActividad" class="alert alert-danger alert-dismissible" role="alert">
    <strong> {{Session::get('message-error')}}</strong>
 </div>
@endif


{!!Form::open(['route'=>'log.store','method'=>'POST','class'=>'login'])!!}
  
  <fieldset>
    
  	<legend class="legend">Ingreso CRM</legend>

    
    <div class="input">
    	
    	{!!Form::text('username',null,['class'=>'form-control','placeholder'=>'Ingresa Usuario'])!!}
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
    	{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa Contraseña'])!!}
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
    
    
  </fieldset>
  
  <div class="feedback">
  	Login Correcto <br />
    Redireccionando...
  </div>
  
{!!Form::close()!!}

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<style type="text/css">
	
	* {
  -ms-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: 0;
}
html,
body {
  width: 100%;
  height: 100%;
  background: url(http://subtlepatterns.com/patterns/sativa.png) repeat fixed;
  font-family: 'Open Sans', sans-serif;
  font-weight: 200;
}
.login {
  position: relative;
  top: 50%;
  width: 333px;
  display: table;
  margin: -150px auto 0 auto;
  background: #fff;
  border-radius: 4px;
}
.legend {
  position: relative;
  width: 100%;
  display: block;
  background: #FF7052;
  padding: 15px;
  color: #fff;
  font-size: 20px;
}
.legend:after {
  content: "";
  background-image: url(http://simpleicon.com/wp-content/uploads/multy-user.png);
  background-size: 100px 100px;
  background-repeat: no-repeat;
  background-position: 152px -16px;
  opacity: 0.06;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
}
.input {
  position: relative;
  width: 90%;
  margin: 15px auto;
}
.input span {
  position: absolute;
  display: block;
  color: #d4d4d4;
  left: 10px;
  top: 8px;
  font-size: 20px;
}
.input input {
  width: 100%;
  padding: 10px 5px 10px 40px;
  display: block;
  border: 1px solid #EDEDED;
  border-radius: 4px;
  transition: 0.2s ease-out;
  color: #a1a1a1;
}
.input input:focus {
  padding: 10px 5px 10px 10px;
  outline: 0;
  border-color: #FF7052;
}
.submit {
  width: 45px;
  height: 45px;
  display: block;
  margin: 0 auto -15px auto;
  background: #fff;
  border-radius: 100%;
  border: 1px solid #FF7052;
  color: #FF7052;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0px 0px 0px 7px #fff;
  transition: 0.2s ease-out;
}
.submit:hover,
.submit:focus {
  background: #FF7052;
  color: #fff;
  outline: 0;
}
.feedback {
  position: absolute;
  bottom: -70px;
  width: 100%;
  text-align: center;
  color: #fff;
  background: #2ecc71;
  padding: 10px 0;
  font-size: 12px;
  display: none;
  opacity: 0;
}
.feedback:before {
  bottom: 100%;
  left: 50%;
  border: solid transparent;
  content: "";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(46, 204, 113, 0);
  border-bottom-color: #2ecc71;
  border-width: 10px;
  margin-left: -10px;
}


</style>

<script type="text/javascript">
	$( ".input" ).focusin(function() {
		  $( this ).find( "span" ).animate({"opacity":"0"}, 200);
		});

		$( ".input" ).focusout(function() {
		  $( this ).find( "span" ).animate({"opacity":"1"}, 300);
		});

		$(".login").submit(function(){
		  $(this).find(".submit i").removeAttr('class').addClass("fa fa-check").css({"color":"#fff"});
		  /*$(".submit").css({"background":"#2ecc71", "border-color":"#2ecc71"});
		  $(".feedback").show().animate({"opacity":"1", "bottom":"-80px"}, 400);
		  $("input").css({"border-color":"#2ecc71"});
		  url = "/cliente";
      		$(location).attr("href", url);

		  return false;*/
		});
</script>



</body>
</html>