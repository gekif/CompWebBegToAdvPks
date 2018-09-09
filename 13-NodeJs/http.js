/*
    http
    url
    path
    querystring
    fs
    util
*/

const http = require('http');
const fs = require('fs');

function response_404(response) {
    response.writeHead(404, {'Content-Type': 'text/plain'});
    response.write('Sorry, your page is not available');
    response.end();
}

function onRequest(request, response) {
    console.log('We got request from client');

    if (request.method === 'GET' && request.url === '/') {
        response.writeHead(200, {'Content-Type' : 'text/html'});
        fs.createReadStream('./index.html').pipe(response);
    } else {
        response_404(response);
    }
}

http.createServer(onRequest).listen(8081);
console.log('The server is working successfully');