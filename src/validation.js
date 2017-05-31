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
