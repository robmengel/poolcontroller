poolcontroller
==============

Open Source Swimming Pool Chemical Controller


This is a simple controller for swimming pools and it is currently a partially-working work in progress.

The premise is simple: I run a server whose address is hard coded into the firmware. Your arduino
will log pH and ORP values every few seconds to the server, where all values are indexed by serial
number. The server code is still in early alpha (basic logging works, but filtering and prettyness are not done yet).
The server uses the Laravel PHP framework with a MySQL or MariaDB database.

Again, this is a work in progress and it will get better. If anyone could contribute some Android or
iOS expertise to the project (for mobile control apps) it would be much appreciated!

Feature requests are always welcome and encouraged.
This code requires an Arduino UNO (or compatible board) with the standard Arduino Ethernet Shield (or compatible knockoff)
as well as Phidgets ORP/pH sensors.
