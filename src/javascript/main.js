
function startPolling() {
  if(window.organizer.Timer != null)
    stopPolling();

  var timer = window.setInterval(function(){
    window.organizer.loadTweets();
  },1000);
  window.organizer.Timer = timer;
}

function stopPolling()
{
  window.clearInterval(window.organizer.Timer);
  window.organizer.Timer = undefined;
}

class TweetOrganizer{
  constructor()
  {
    this.NewestDate = new Date(2000,1,1,0,0,0);
    this.isLoading = false;
  }

  addTweet(tweet)
  {
    var tweetDate = new Date(tweet.Date);

    if(this.NewestDate < tweetDate)
      this.NewestDate = tweetDate;

    if(this.Timeline === undefined)
      this.Timeline = document.getElementById("timeline");

    this.Timeline.innerHTML = this.getHtmlForTweet(tweet) + this.Timeline.innerHTML;
  }

  getHtmlForTweet(tweet)
  {
    return '<article class="tweet"><div class="tweet-header"><img src="media/user.png" /><p class="tweet-username">' + tweet.Username + '</p><p class="tweet-date">' + tweet.Date + '</p> </div> <div class="tweet-content"><p>' + tweet.Content + '</p></div></article>';
  }

  loadTweets(){
      if(this.isLoading)
        return;

      this.isLoading = true;
      let that = this;

      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
          let tweets = JSON.parse(this.responseText.substr(1));
          for(let i = tweets.length -1; i >= 0; i--)
          {
            that.addTweet(tweets[i]);
          }
          that.isLoading = false;
        }
      };

      let start = formatDate(this.NewestDate);
      let uri = "allTweets.php?start=" + encodeURIComponent(start);
      xhttp.open("GET",uri,true);
      xhttp.send();
  }
}

function formatDate(date)
{
  let month = date.getMonth() + 1;
  let day = date.getDate();
  let hours = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();

  if(month < 10)
    month = "0" + month;

  if(day < 10)
    day = "0" + day;

  if(hours < 10)
    hours = "0" + hours;
  if(minutes < 10)
    minutes = "0" + minutes;
  if(seconds < 10)
    seconds = "0" + seconds;


    let dateString = date.getFullYear() + "-" +  month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
    return dateString;
}

var organizer = new TweetOrganizer();
