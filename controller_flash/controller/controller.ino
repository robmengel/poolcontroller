#include <SPI.h>
#include <Ethernet.h>
#include <String.h>
#include <EEPROM.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
char server[] = "piemontese.robmengel.com";
IPAddress ip(169,254,0,1);	//use this self-signed IP if things go wrong with DHCP
EthernetClient client;
char sID[7];

void setup()
{
  Serial.begin(9600);
  Serial.println("Rob's Pool Monitor");
  //read serial number:
  for (int i=0; i<6; i++)
  {
    sID[i] = EEPROM.read(i);
  }
  //print serial number to console:
  Serial.println(sID);
  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0)
  {
    Serial.println("Failed to configure Ethernet using DHCP");
    // no point in carrying on, so do nothing forevermore:
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  // give the Ethernet shield a second to initialize:
  delay(1000);
}

void loop()
{
  String pH_final = " ";
  String ORP_final = " ";
  double pH = (0.0178 * analogRead(A0)) - 1.889;
  double orp = ((2.5 - (analogRead(A1) / 200)) / 1.037) * 1000;
  Serial.println();
  Serial.println("Pre adjusted values:");
  Serial.println("pH:");
  Serial.print(pH);
  Serial.println("ORP:");
  Serial.print(orp);
  //correct values:
  pH = pH - 1.0;
  orp = orp + 200.0;
  Serial.println();
  if (client.connect(server, 80))
  {
    Serial.println("connected");
    //cast the float values as strings to prepare for concatenation into the request URI string:
    pH_final = dtostrf(pH, 1, 2, "xxxxxxxx");
    ORP_final = dtostrf(orp, 2, 3, "ssssssss");
    Serial.println("casted values are pH_final = "+pH_final+" and ORP_final = "+ORP_final);
    // Make a HTTP request:
    client.println("GET /api/chems/"+ORP_final+"/"+pH_final+"/"+sID+" HTTP/1.1");
    client.println("Host: piemontese.robmengel.com");
    client.println("Connection: close");
    client.println();
    client.stop();
  } 
  else
  {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  delay(4000);
}
