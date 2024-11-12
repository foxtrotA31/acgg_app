import './bootstrap';


const mqtt = require('mqtt');
// const mysql = require('mysql');
const http = require('http');
const url = require('url');



// const options = {
//     hostname: 'localhost',
//     port: 80, // or the port your server is running on
//     path: '/your/path', // the path you want to request
//     method: 'GET',
// };

var moisture = 0;

// MQTT settings
const mqttBrokerUrl = 'mqtt://122.3.114.27'; // Change this to your MQTT broker URL
const emon = 'emon/0/'; // Change this to your MQTT topic

// MySQL settings
// const mysqlHost = 'localhost'; // Change this to your MySQL host
// const mysqlUser = 'demo1'; // Change this to your MySQL user
// const mysqlPassword = 'demo1'; // Change this to your MySQL password
// const mysqlDatabase = 'demo1'; // Change this to your MySQL database

// // Create a MySQL connection
// const connection = mysql.createConnection({
//     host: mysqlHost,
//     user: mysqlUser,
//     password: mysqlPassword,
//     database: mysqlDatabase,
// });

// // Connect to MySQL
// connection.connect((err) => {
//     if (err) {
//         console.error('Error connecting to MySQL: ' + err.stack);
//         return;
//     }
//     console.log('Connected to MySQL as id ' + connection.threadId);
// });

// Create an MQTT client
const client = mqtt.connect(mqttBrokerUrl, {
    username: 'user2024',
    password: 'user2024%$#@!'
});

// Subscribe to the MQTT topic
client.on('connect', () => {
    console.log('Connected to MQTT broker');
    client.subscribe('smartgarden/data');
});

// Process incoming MQTT messages
client.on('message', (topic, message) => {
    console.log('Received message:', message.toString());

    if (topic === 'smartgarden/data') {
        const data = JSON.parse(message.toString());
        moisture = data.moisture; // Get moisture level
        const sensorID = data.id; // Get sensor ID
        console.log(`Sensor ID: ${sensorID}, Moisture Level: ${moisture}`);
    }
});

client.on('error', (err) => {
    console.error('Error connecting to MQTT broker: ' + err);
    process.exit(1);
});

// Close MySQL connection on process exit
// process.on('exit', () => {
//     connection.end();
// });

function httpGet(urlString) {
    const url = new URL(urlString);

    const options = {
        hostname: url.hostname,
        port: url.port || 80,
        path: url.pathname + url.search,
        method: 'GET',
    };

    const req = http.request(options, (res) => {
        let data = '';

        res.on('data', (chunk) => {
            data += chunk;
        });

        res.on('end', () => {
            console.log(data); // the response data
        });
    });

    req.on('error', (error) => {
        console.error(error);
    });

    req.end();
}

// Create an HTTP server
const server = http.createServer((req, res) => {
    // Set the response HTTP header with HTTP status and Content type
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Content-Type', 'text/plain');
    res.writeHead(200, { 'Content-Type': 'text/plain' });
    const reqUrl = url.parse(req.url, true);
    const topic = reqUrl.query.topic;
    const value = reqUrl.query.value;
    const retain = reqUrl.query.retain;
    if (topic == "smartgarden/" || topic == "smartgarden/data") {
        if (topic == "smartgarden/") {
            if (retain == 'true') {
                client.publish(topic, value, { retain: true });
                console.log(topic, value);
            } else {
                client.publish(topic, value);
                console.log(topic, value);
            }
            res.end('Server is Active!\n');
        } else if (topic == "smartgarden/data") {
            res.end(moisture + '\n');
        } else {
            res.end('Server is Active!\n');
        }
    } else {
        res.end('Error Request\n');
    }
});

// Server listens on port 3000
server.listen(3000, '0.0.0.0', () => {
    console.log('#Server running at http://0.0.0.0:3000/');
});
