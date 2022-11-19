var userIdHttp;
var emailHttp;

try
    {
    // Firefox, Opera 8.0+, Safari
    userIdHttp=new XMLHttpRequest();
    emailHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
        userIdHttp=new ActiveXObject("Msxml2.XMLHTTP");
        emailHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
          userIdHttp=new ActiveXObject("Msxml2.XMLHTTP");
          emailHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        }
      }

    }

  var JSONrequest = {

    function: "",

    value: ""

    }


// proverava promenu userID http odgovora
    userIdHttp.onreadystatechange=function(){
      if(userIdHttp.readyState ==4)
        {
          if(userIdHttp.responseText == "notok"){
            $("#userexists").css("display","block");
            $("#submit").prop('disabled', true);
          }
          else{
            $("#userexists").css("display", "none");
            $("#submit").prop('disabled', false);
          }
        }
      }

      // proverava promenu email http odgovora
      emailHttp.onreadystatechange=function(){
      if(emailHttp.readyState ==4)
        {
          if(emailHttp.responseText == "notok"){
            $("#emailexists").css("display","block");
            $("#submit").prop('disabled', true);
          }
          else{
            $("#emailexists").css("display", "none");
            $("#submit").prop('disabled', false);
          }
        }
      }



    $("#usernameRegister").on('input',
      function(){
        JSONrequest.function = "checkUsername()";
        JSONrequest.value = $("#usernameRegister").val();
        userIdHttp.open("POST", "registerajax.php",false);
        userIdHttp.send(JSON.stringify(JSONrequest));
       }
    )

    $("#emailRegister").on('input', 
      function(){
        JSONrequest.function = "checkEmail()";
        JSONrequest.value = $("#emailRegister").val();
        emailHttp.open("POST", "registerajax.php",false);
        emailHttp.send(JSON.stringify(JSONrequest));
       }
    )
      