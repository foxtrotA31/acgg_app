#include <WiFi.h>
#include <PubSubClient.h>

const char* ssid = "ADMIN";
const char* password = "admin54321";

const char* mqttServer = "122.3.114.27";
const int mqttPort = 1883;
const char* mqttUser = "user2024"; // Leave empty if broker doesn't require authentication
const char* mqttPassword = "user2024%$#@!"; // Leave empty if broker doesn't require authentication
char clientId[23];

const int PIN_RELAY = 4;
const int PIN_LED = 32;
const int PIN_SENSOR = 35;

const char* sensorID = "82640";

uint32_t timer = 0;

WiFiClient espClient;
PubSubClient client(espClient);

void setup_wifi() {
  delay(10);
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message received on topic: ");
  Serial.println(topic);
  Serial.print("Payload: ");
  for (int i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
  }
  bool is_on = (char)payload[0] == '1';
  digitalWrite(PIN_RELAY, is_on);
  Serial.println();
}

void setup() {
  Serial.begin(115200);
  pinMode(PIN_RELAY, OUTPUT);
  pinMode(PIN_LED, OUTPUT);
  pinMode(PIN_SENSOR, INPUT);
  setup_wifi();
  client.setServer(mqttServer, mqttPort);
  client.setCallback(callback);
  uint8_t mac[6];
  WiFi.macAddress(mac);
  sprintf(clientId, "esp32Client-%02X%02X%02X", mac[3], mac[4], mac[5]);
}

void reconnect() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    if (client.connect(clientId, mqttUser, mqttPassword)) {
      Serial.println("connected");
      client.subscribe("smartgarden/");
      digitalWrite(PIN_LED, HIGH);
    } else {
      digitalWrite(PIN_LED, LOW);
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
    }
  }
}

void loop() {
  if (timer != round(millis()/1000)){
    timer = round(millis()/1000);
    int moistureLevel = analogRead(PIN_SENSOR);
    int moisturePercent = map(moistureLevel, 0, 4095, 100, 0);
    // Publish the moisture level with sensorID to the MQTT topic
    char moistureStr[32];
    snprintf(moistureStr, sizeof(moistureStr),  "{\"id\":\"%s\", \"moisture\":%d}", sensorID, moisturePercent);
    client.publish("smartgarden/data", moistureStr);
  }
  
  if (!client.connected()) {
    reconnect();
  }
  client.loop();
}
