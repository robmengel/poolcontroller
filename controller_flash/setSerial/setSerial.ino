// WRITES ARDUINO SERIAL TO EEPROM
//
// do this only once on an Arduino, 
// write the Serial of the Arduino in the 
// first 6 bytes of the EEPROM

#include <EEPROM.h>

void setup()
{
  Serial.begin(9600);
  
  for (int i=0; i<6; i++) {
    EEPROM.write(i,random(0,9));
    EEPROM.write(i,random(0,9));
    EEPROM.write(i,random(0,9));
    EEPROM.write(i,random(0,9));
    EEPROM.write(i,random(0,9));
    EEPROM.write(i,random(0,9));
  }
}

void loop() {
  
}
