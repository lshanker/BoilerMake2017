<?php

include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";

$result = MySQLi_query($link, "SELECT name, points FROM authors");

if(!$result){
  $output = "Error fetching stories: " . MySQLi_error($link);
  include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
  exit();
}

while($row = mysqli_fetch_array($result)){
  $authors[] = array("name" => $row['name'], "points" => $row['points']);
}


function cmp($a, $b)
{
  if($a['points']>$b['points']){
    return -1;
  }
  if($a['points']<$b['points']){
    return 1;
  }
  if($a['points']<$b['points']){
    return 0;
  }
}


usort($authors, "cmp");

 ?>


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
  var studentPoints = function(options, callback){
    var defaults = {
      frequency: 60,
      limit: 10
    };
    this.callback = callback;
    this.config = $.extend(defaults, options);
    this.list = [
      <?php foreach($authors as $author):?> 
        "<?php echo $author['name']; ?>"
        ,
        <?php endforeach; ?>  ];
    this.listPoints = [
//get points and put it here
    ]
  }
  studentPoints.prototype.getData = function() {
    var results = [];
    for (var i = 0, len = this.list.length; i < len; i++) {
      results.push({
        name: this.list[i],
        points: this.listPoints[i]
      });
    }
    return results;
  };
  studentPoints.prototype.processData = function() {
    return this.sortData(this.getData()).slice(0, this.config.limit);
  };

  studentPoints.prototype.sortData = function(data) {
    return data.sort(function(a, b) {
      return b.points - a.points;
    });
  };
  studentPoints.prototype.start = function() {
    var _this = this;
    this.interval = setInterval((function() {
      _this.callback(_this.processData());
    }), this.config.frequency * 1000);
    this.callback(this.processData());
    return this;
  };
  studentPoints.prototype.stop = function() {
    clearInterval(this.interval);
    return this;
  };
  window.studentPoints = studentPoints;

  var Leaderboard = function (elemId, options) {
    var _this = this;
    var defaults = {
      limit:10,
      frequency:15
    };
    this.currentStudent = 0;
    this.currentPoints = 0;
    this.config = $.extend(defaults,options);

    this.$elem = $(elemId);
    if (!this.$elem.length)
      this.$elem = $('<div>').appendTo($('body'));

    this.list = [];
    this.$content = $('<ul>');
    this.$elem.append(this.$content);

    this.poller = new studentPoints({frequency: this.config.frequency, limit: this.config.limit}, function (data) {
      if (data) {
        if(_this.currentPoints != data.length){
          _this.buildElements(_this.$content,data.length);
        }
        _this.currentPoints = data.length;
        _this.data = data;
        _this.list[0].$student.addClass('animate');
      }
    });

    this.poller.start();
  };

  Leaderboard.prototype.buildElements = function($ul,elemSize){
    var _this = this;
    $ul.empty();
    this.list = [];
    this.listPoints = [];

    for (var i = 0; i < elemSize; i++) {
      var student = $('<li>')
        .on("animationend webkitAnimationEnd oAnimationEnd",eventAnimationEnd.bind(this) )
        .appendTo($ul);
      this.list.push({
               $student: student,
               $name: $('<span class="name">Loading...</span>').appendTo(student),
               $points: $('<span class="points">Loading...</span>').appendTo(student)
           });
    }

    function eventAnimationEnd (evt){
      this.list[this.currentStudent].$name.text(_this.data[this.currentStudent].name);
      this.list[this.currentStudent].$points.text(_this.data[this.currentStudent].points);
      this.list[this.currentStudent].$student.removeClass('animate');
      this.currentStudent = this.currentStudent >= this.currentPoints - 1 ? 0 : this.currentStudent + 1;
      if (this.currentStudent != 0) {
        this.list[this.currentStudent].$student.addClass('animate');
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
//random number generator
/*
  function rnd (min,max){
    min = min || 100;
    if (!max){
      max = min;
      min = 1;
    }
    return  Math.floor(Math.random() * (max-min+1) + min);
  }
  */
//attaches the random number to a string
  function numberFormat(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
})(jQuery);

$(document).ready(function ($) {
  var myLeaderboard = new Leaderboard(".content", {limit:5,frequency:4});
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
      <form action = "index.php" method = "post">
        <button type="submit" class="btn btn-default">Logout</button>
        <input type = "hidden" name = "action" value = "logout"/>
        <input type = "hidden" name = "goto" value = "index.php"/>
    </form>
    </ul>
    </div>
  </nav>
<div class='leaderboard'>
    <h1><span>Leader Board</span></h1>
    <div class="content"></div>
</div>


  </body>
</html>
