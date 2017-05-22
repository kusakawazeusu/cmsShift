var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
var mysql = require('mysql');
var port = 3000;

//database setting
var connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'gamelab',
    password: 'gamelab!@#$',
    database: 'lara53'
});

server.listen(port, function(){
  console.log('listening on *:' + port);
});

connection.connect();
  connection.query('SELECT 1 + 1 AS solution',function(error, rows, fields){
      //error check
      if(error){
          throw error;
      }
  });

io.on('connection', function (socket) {
  console.log("new client connected");
  var redisClient = redis.createClient();
redisClient.subscribe('message');


  //message in
  redisClient.on("message", function(channel, message) {
    var currenttime = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
    console.log( currenttime + " new message in :"+ message);
    socket.emit(channel,message);

    var data = {
      PlayerId: message,
      EventTime: currenttime
    };

    connection.query('INSERT INTO `machine_event` SET ?', data, function(error){
        if(error){
            console.log('INSERT ERROR!');
            throw error;
        }
    });
  });

  socket.on('disconnect', function() {
    console.log("client disconnect");
    redisClient.quit();
  });

});

