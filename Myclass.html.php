<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Write a story</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="write.css">
  <link rel="stylesheet" href="Myclass.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  (function ($) {
  var FakePoller = function(options, callback){
    var defaults = {
      frequency: 60,
      limit: 10
    };
    this.callback = callback;
    this.config = $.extend(defaults, options);
    this.list = [
      'Survivor',
      'Firefly',
      'Dexter',
      'Rick Astley'
    ];
  }
  FakePoller.prototype.getData = function() {
    var results = [];
    for (var i = 0, len = this.list.length; i < len; i++) {
      results.push({
        name: this.list[i],
        count: rnd(0, 2000)
      });
    }
    return results;
  };
  FakePoller.prototype.processData = function() {
    return this.sortData(this.getData()).slice(0, this.config.limit);
  };

  FakePoller.prototype.sortData = function(data) {
    return data.sort(function(a, b) {
      return b.count - a.count;
    });
  };
  FakePoller.prototype.start = function() {
    var _this = this;
    this.interval = setInterval((function() {
      _this.callback(_this.processData());
    }), this.config.frequency * 1000);
    this.callback(this.processData());
    return this;
  };
  FakePoller.prototype.stop = function() {
    clearInterval(this.interval);
    return this;
  };
  window.FakePoller = FakePoller;

  var Leaderboard = function (elemId, options) {
    var _this = this;
    var defaults = {
      limit:10,
      frequency:15
    };
    this.currentItem = 0;
    this.currentCount = 0;
    this.config = $.extend(defaults,options);

    this.$elem = $(elemId);
    if (!this.$elem.length)
      this.$elem = $('<div>').appendTo($('body'));

    this.list = [];
    this.$content = $('<ul>');
    this.$elem.append(this.$content);

    this.poller = new FakePoller({frequency: this.config.frequency, limit: this.config.limit}, function (data) {
      if (data) {
        if(_this.currentCount != data.length){
          _this.buildElements(_this.$content,data.length);
        }
        _this.currentCount = data.length;
        _this.data = data;
        _this.list[0].$item.addClass('animate');
      }
    });

    this.poller.start();
  };

  Leaderboard.prototype.buildElements = function($ul,elemSize){
    var _this = this;
    $ul.empty();
    this.list = [];

    for (var i = 0; i < elemSize; i++) {
      var item = $('<li>')
        .on("animationend webkitAnimationEnd oAnimationEnd",eventAnimationEnd.bind(this) )
        .appendTo($ul);
      this.list.push({
               $item: item,
               $name: $('<span class="name">Loading...</span>').appendTo(item),
               $count: $('<span class="count">Loading...</span>').appendTo(item)
           });
    }

    function eventAnimationEnd (evt){
      this.list[this.currentItem].$name.text(_this.data[this.currentItem].name);
      this.list[this.currentItem].$count.text(_this.data[this.currentItem].count);
      this.list[this.currentItem].$item.removeClass('animate');
      this.currentItem = this.currentItem >= this.currentCount - 1 ? 0 : this.currentItem + 1;
      if (this.currentItem != 0) {
        this.list[this.currentItem].$item.addClass('animate');
      }
    }
  };

  Function.prototype.bind = function(){
    var fn = this, args = Array.prototype.slice.call(arguments),
      object = args.shift();
    return function(){
      return fn.apply(object,args.concat(Array.prototype.slice.call(arguments)));
    };
  };

  window.Leaderboard = Leaderboard;
  //Helper
  function rnd (min,max){
    min = min || 100;
    if (!max){
      max = min;
      min = 1;
    }
    return  Math.floor(Math.random() * (max-min+1) + min);
  }

  function numberFormat(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
})(jQuery);

$(document).ready(function ($) {
  var myLeaderboard = new Leaderboard(".content", {limit:8,frequency:8});
});

</script>

</head>


<body background ="http://7-themes.com/data_images/collection/9/4506641-orange-wallpapers.png">
<div class="container-fluid">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Read a story!</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="write.html.php">Write</a></li>
        <li><a href="profile.html.php">My Profile</a></li>
        <li class="active"><a href="Myclass.html.php">My Class</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.html.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </nav>
<div class='leaderboard'>
    <h1><span>Leader Board</span></h1>
    <div class="content"></div>
</div>
  

  </body>
</html>