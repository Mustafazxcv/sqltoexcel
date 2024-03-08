# MySQL'den Excel'e Veri Aktarımı

Bu PHP betiği, PhpSpreadsheet kütüphanesini kullanarak MySQL veritabanından veri alır ve bu verileri Excel dosyasına aktarır.

## Gereksinimler
- PhpSpreadsheet kütüphanesi (`composer require phpoffice/phpspreadsheet` komutu ile yükleyin)
- Bir MySQL veritabanı

## Kullanım
1. Veritabanı bağlantı bilgilerini uygun şekilde güncelleyin.
2. Veritabanından veri çekmek için gerekli SQL sorgusunu oluşturun ve `$sql` değişkenine atayın.
3. Kodu çalıştırarak veritabanından veri alın ve Excel dosyasına aktarın.
4. Oluşturulan Excel dosyasını indirme bağlantısı ile kullanıcıya sunun.

## Örnek
```php
// Veritabanı bağlantı bilgileri
$servername = "localhost"; // MySQL sunucu adresi
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifre
$database = "veritabani_adı"; // Kullanılacak veritabanı adı

// MySQL sunucusuna bağlanma
$conn = new mysqli($servername, $username, $password, $database);

// Veri çekme sorgusu
$sql = "SELECT * FROM tablo_adi";
$result = $conn->query($sql);

// ... Kodun devamı
// Çıktı output.xlsx şeklinde olacaktır.

