/*
    http
    url
    path
    querystring
    fs
    util
*/

var http = require('http');
var fs = require('fs');

function onRequest(request, response) {
    console.log('We got request from client');
    response.writeHead(200, {'Content-Type' : 'text/html'});
    fs.createReadStream('./index.html').pipe(response);
}

http.createServer(onRequest).listen(8081);
console.log('The server is working successfully');