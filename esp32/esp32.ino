#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "Deco Wifi";
const char* password = "amielBAYAWA!2";

const char* activate = "http://acgg_app/irrigation_control/esp32/command?action=activate";
const char* deactivate = "http://acgg_app/irrigation_control/esp32/command?action=deactivate";

const int PIN_RELAY = 4;
const int PIN_LED = 32;
const int PIN_SENSOR = 35;

const int dryThreshold = 3000;

void setup() {
  Serial.begin(115200);
  
  pinMode(PIN_RELAY, OUTPUT);     
  pinMode(PIN_LED, OUTPUT);

  digitalWrite(PIN_RELAY, LOW);
  
  WiFi.begin(ssid, password);

  Serial.print("Connecting to");
  Serial.println(ssid);

  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(PIN_LED, HIGH);
    delay(500);
    digitalWrite(PIN_LED, LOW);
    Serial.print("Connecting to Wifi...");
    delay(1000);
  }

  digitalWrite(PIN_LED, HIGH);
  
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop(){

  if (WiFi.status() == WL_CONNECTED){
    HTTPClient http;
    http.setTimeout(10000);

    http.begin(activate);

    int httpResponseCode = http.GET(); 

    if (httpResponseCode == HTTP_CODE_OK) {

      String command = http.getString();
      Serial.print("\n HTTP Response Code:" + String(httpResponseCode));
      Serial.println("\n Command received: " + command);

      // if (command == "activate") {

      //   int moistureLevel = analogRead(PIN_SENSOR);
      //   Serial.print("Soil Moisture Level: ");
      //   Serial.println(moistureLevel);

      //   if (moistureLevel > dryThreshold) {

      //     digitalWrite(PIN_RELAY, HIGH);
      //     Serial.println("\n Soil is dry. Activating relay.");

      //     String postData = "data = Soil is dry, watering the plans";

      //     http.addHeader("Content-Type", "application/x-www-form-urlencoded");


      //     int httpResponseCode = http.POST(postData);
      //   }
      //   else{
      //   digitalWrite(PIN_RELAY, LOW);
      //   Serial.println("\n Soil is moist. Relay is off.");
      //   }

      // } else if (command == "deactivate") {
      //   digitalWrite(PIN_RELAY, LOW);
      // }
    }
    else {
      Serial.print("\n Error on sending POST: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else{
    digitalWrite(PIN_LED, LOW);
    delay(500);
    digitalWrite(PIN_LED, HIGH);
    delay(500);
    Serial.println("Wifi Disconnected");
  }  
   delay(10000);
}
