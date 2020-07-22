#include "ESP8266WiFi.h"
int data;
const char* ssid = "AleniNikolina2"; // naziv Vaše WiFi mreže AleniNikolina2
const char* password = "tihomir101480"; // lozinka Vaše WiFi mrežu tihomir101480
const char* host = "192.168.1.5"; // stranica koju želimo otvoriti. Ovdje napisite samo domenu, bez path-a
void setup() {
  Serial.begin(115200); // započinjemo serijsku komunikaciju
  delay(10);
  WiFi.begin(ssid, password); // za početak se povezujemo na WiFi mrežu
  while (WiFi.status() != WL_CONNECTED) { // sve dok se NOVA ne poveže na WiFi mrežu
    delay(500); // ispisujemo točkice u Serial monitoru
    Serial.print("."); // čisto zbog nas, da znamo što se događa
  }
  Serial.println("Povezani smo na WiFi! IP adresa je: ");
  Serial.println(WiFi.localIP()); // ispisuje lokalnu WiFi adresu NOVE
  Serial.print("Sada se povezujem na ");
  Serial.println(host); // URL stranice na koju se povezujemo
  WiFiClient client; // kreiramo objekt klase WiFiClient za TCP konekciju
  if (!client.connect(host, 80)) // 80 je port na kojega se povezujemo
  {
    Serial.println("Ne mogu se spojiti na stranicu.."); // ako je spajanje neuspješno
    return; // završi s izvođenjem programa
  }
  String url = "/zavrsni/sendData.php?";
  Serial.print("Povezani smo na stranicu.");
}
void loop() { 
  data = Serial.read();
  Serial.write("Procitao sam:");
  Serial.write(data);
  url += data;
  
  // Ovo salje zahtjev(GET request) stranici. Istu stvar radi browser u pozadini
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
  "Host: " + host + "\r\n" +
  "Connection: close\r\n\r\n");
  delay(10);
  // Čitamo odgovor servera na naš zahtjev te taj isti odgovor printamo u Serial monitor
  while(client.available()){
    String linija = client.readStringUntil('\r'); // printa liniju po liniju
    Serial.print(linija);
  }
  Serial.println("Gotovo. Prekidamo konekciju.");
  
  delay(6000);
}
