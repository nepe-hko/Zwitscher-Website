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
