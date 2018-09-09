/*
    http
    url
    path
    querystring
    fs
    util
*/

const http = require('http');

function onRequest(request, response) {
    console.log("The request from the client: " + request.url);
    response.writeHead(200, {'Content-Type' : 'text/plain'});
    response.write('Hello World');
    response.end();
}

http.createServer(onRequest).listen(8081);
console.log("This server is working successfully");