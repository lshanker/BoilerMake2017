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
    var LeaderName = function(options,callback){
        var defaults = {
            frequency: 1,
            limit: 5
        };
        this.callback = callback;
        this.config = $.extend(defaults, options);
        this.list = [
            'Bob',
            'Jane',
            'more names',
            'names',
            'NAMES',
            'no show'
        ];
    }
    /* Points are set to random for now, create a new list of just the points that correspond to the name*/
    LeaderName.prototype.getData = function() {
        var studentNames = [];
        for (var i = 0, len = this.list.length; i < len; i++) {
            studentNames.push({
                name: this.list[i],
                count: rnd(0,1)
            });
        }
        return studentNames;
    };
    LeaderName.prototype.processData = function() {
        return this.sortData(this.getData()).slice(0, this.config.limit);
    };

    LeaderName.prototype.sortData = function(data) {
        return data.sort(function(a, b) {
            return b.count - a.count;
        });
    };
    LeaderName.prototype.start = function() {
        var _this = this;
        this.interval = setInterval((function() {
            _this.callback(_this.processData());
        }), this.config.frequency * 1000);
        this.callback(this.processData());
        return this;
    };

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

        this.leaderBoard = new LeaderName({frequency: this.config.frequency, limit: this.config.limit}, function (data) {
            if (data) {
                if(_this.currentPoints != data.length){
                    _this.buildElements(_this.$content,data.length);
                }
                _this.currentPoints = data.length;
                _this.data = data;
                _this.list[0].$item.addClass('animate');
            }
        });

        this.leaderBoard.start();
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
            this.list[this.currentStudent].$name.text(_this.data[this.currentStudent].name);
            this.list[this.currentStudent].$count.text(_this.data[this.currentStudent].count);
            this.list[this.currentStudent].$item.removeClass('animate');
            this.currentStudent = this.currentStudent >= this.currentPoints - 1 ? 0 : this.currentStudent + 1;
            if (this.currentStudent != 0) {
                this.list[this.currentStudent].$item.addClass('animate');
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

    /* for random number generator, can be deleted after we have actual points of students */
    function rnd (min,max){
        min = min || 100;
        if (!max){
            max = min;
            min = 1;
        }
        return  Math.floor(Math.random() * (max-min+1) + min);
    }
})(jQuery);
/* set limit to how many student scores are displayed, and frequency of update */
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
        <li><a href="Profile.html.php">My Profile</a></li>
        <li class="active"><a href="Myclass.html.php">My Class</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="Signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </nav>

  <div class='leaderboard'>
    <h1><span>Leaderboard</span></h1>
    <div class="content"></div>
</div>

  </body>
  </html>