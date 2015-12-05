(document).ready(function() {
  $("#register").submit(function(e){
	  if($("#register").find("input[name='password1']").val().length==0 || $("#register").find("input[name='email']").val().length==0 || $("#register").find("input[name='password2']").val().length==0){
	  	 e.preventDefault();
		  alert("Check All Fields are filled!");
	  }else if($("#register").find("input[name='password1']").val()!=$("#register").find("input[name='password2']").val()){
		  e.preventDefault();
		  alert("Check Passwords Match!");
	  }else{
		  return true;
	  }
  });
  $("#login").submit(function(e){
	  if($("#login").find("input[name='email']").val().length==0 || $("#login").find("input[name='password']").val().length==0){
	  	 e.preventDefault();
		  alert("Check All Fields are filled!");
	  }else{
		  return true;
	  }
  });

});