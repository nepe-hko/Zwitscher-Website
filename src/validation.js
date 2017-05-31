function validateTweet(value)
{
  if(value.length>180 || value.length <= 0 )
  {
    document.getElementById("btn_tweet").disabled = true;
  }
  else
  {
    document.getElementById("btn_tweet").disabled = false;
  }
}

function validateLogin()
{
  if(document.getElementById("in_username").value.length < 1 || document.getElementById("in_password").value.length < 1)
    document.getElementById("btn_submit").disabled = true;
  else {
    document.getElementById("btn_submit").disabled = false;
  }
}


function validateSignup()
{
  var enabled = true;

  if(document.getElementById("in_username").value.length < 1)
    enabled = false;

  if(document.getElementById("in_password").value.length < 1)
    enabled = false;

  if(document.getElementById("in_passwordRepeat").value.length < 1)
    enabled = false;

  if(document.getElementById("in_password"). value !== document.getElementById("in_passwordRepeat").value)
    enabled = false;

  document.getElementById("btn_signup").disabled = !enabled;

}
