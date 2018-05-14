# Attendance - CTU Science Research of Student (TSV2017-12)
My project for student science research topic

## Installation Web App
- Go to /application/config/database.php
- Edit field: hostname - username - password - database (from line 78 to line 81)
- Go to /application/config/config.php
- Edit field: $config['base_url'] (line 27) as localhost/host ip or address
- View at address/ip like base_url 

## Technology
### WebApp
* PHP 7.1.10
* MySQL/MariaDB 4.7.4
* HTML 5
* CSS
* Bootstrap 3.3.7
* Javascript
* AJAX
* Jquery 3.2.1
* JSTree 3.3.4
* DataTables 1.10.16
* DataTables Vietnamese language of Trinh Phuoc Thai
* Code Igniter 3.1.6 (PHP Web Framework)
* Coming soon: Google Chart
### IoT
* Java for Raspberry Pi (Pi4J package)
* Wiring for Arduino (using C)
* Json simple 1.1.1- java
* ArduinoJson 5.11
* JRE 1.8
* JDK 8
* rdm630 - RFID Reader Libraries

## Hardware
* Raspberry Pi 3
* NodeMCU ESP8266
* Arduino Nano
* 125kHz RFID Scanner as a board

## Text Editor
* Atom
* Notepad++
* PHPStorm (Web IDE)
* Arduino IDE
* Netbeans

## Attendance_IoT - Branch for Hardware

### Libraries
* ArduinoJson 5.11
* rdm630
* Serial command
* Json simple 1.1.1- java

### API Queue sync - get
* Event
* rfid
* student
* staff

### API - post
#### rfid (non register row)
*	new RFID
* personalID = "new"+ random string length (7)
* isStudent = 2
#### attendance

## Link reference(s)
* Atom: https://atom.io/
* Notepad++: https://notepad-plus-plus.org/download/v7.5.1.html
* Arduino IDE: https://www.arduino.cc/en/Main/Software
* Netbeans: https://netbeans.org/
* Github Project IoT: https://github.com/sj96/Attendance_IoT
* Demo: https://demo.ngthuc.com/project/nckh (coming soon)
* Google Chart - https://developers.google.com/chart/interactive/docs/quick_start (coming soon)
* DataTables language plugin: https://datatables.net/plug-ins/i18n/Vietnamese
* ArduinoJson 5.11 - https://arduinojson.org/
* https://www.arduino.cc/reference/en/
* https://arduinojson.org/doc/
* https://techtutorialsx.com/2016/07/21/esp8266-post-requests/
* http://www.esp8266.com/viewtopic.php?f=29&t=14528
* http://pi4j.com/example/
* https://code.google.com/archive/p/json-simple/
* https://www.mkyong.com/java/json-simple-example-read-and-write-json/

## My Team
* Mentor: Dr.Le Van Lam
* Leader: Mr.Le Nguyen Thuc
* Technician: Mr.Nguyen Thien Minh
* Documents Writer: Mr.Phuong Buu Minh
* Documents Partner: Mr.Le Minh Luan
* Hardware Partner: Hshop.vn

# Thanks for follow!
