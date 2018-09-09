const http = require('http');
const connect = require('connect');

const app = connect();
http.createServer(app).listen(8081);
console.log('The server is running using connect framework');
