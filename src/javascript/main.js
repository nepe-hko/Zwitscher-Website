
function loadTweets(){
  console.log("hit");
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      console.log("ReadyState" + this.readyState);
      console.log("Status" + this.status);

      if(this.readyState == 4 && this.status == 200)
        console.log(this.responseText);
    };

    let startDate = "2017-05-31 12:00:23";
    let uri = "allTweets.php?start=" + encodeURIComponent(startDate);
    console.log(uri);
    xhttp.open("GET",uri,true);
    xhttp.send();
}
