var io = require('socket.io-client');
var socket = io.connect('http://localhost:3000', {reconnect: true});
var endOfLine = require('os').EOL;
process.stdin.resume();
process.stdin.setEncoding('utf8');

socket.on('connect', function (socket) {
    console.log('Connected!');
});

process.stdin.on('data', function (chunk) {
  socket.emit('message', chunk.replace(endOfLine, ''));
});

socket.on('newEvent', function (message) {
    console.log('message sented!');
});