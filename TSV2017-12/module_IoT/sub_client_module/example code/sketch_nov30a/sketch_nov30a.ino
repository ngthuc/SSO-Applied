#include <SerialCommand.h> // Thêm vào sketch thư viện Serial Command
 
SerialCommand sCmd; // Khai báo biến sử dụng thư viện Serial Command
 
int red = 13;
 
void setup() {
  //Khởi tạo Serial ở baudrate 9600 (trùng với HOST)
  Serial.begin(9600);
  
  //pinMode 2 đèn LED là OUTPUT
  pinMode(red,OUTPUT);
  
  
  // Một số hàm trong thư viện Serial Command
  
  sCmd.addCommand("LED",   led);
  
}
 
void loop() {
  sCmd.readSerial();
  //Bạn không cần phải thêm bất kỳ dòng code nào trong hàm loop này cả
}
 
// hàm led_red sẽ được thực thi khi gửi hàm LED_RED
void led() {
  //Đoạn code này dùng để đọc TỪNG tham số. Các tham số mặc định có kiểu dữ liệu là "chuỗi"
  char *arg;
  arg = sCmd.next();
  
  int value = atoi(arg); // Chuyển chuỗi thành số
  digitalWrite(red,value);
  Serial.println(value);
}
