<?php
// PhpSpreadsheet kütüphanesini çağırma
require 'vendor/autoload.php';

// Veritabanı bağlantı bilgileri
$servername = "localhost"; // MySQL sunucu adresi
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifre
$database = "deneme3005"; // Kullanılacak veritabanı adı

// MySQL sunucusuna bağlanma
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Veri çekme sorgusu
$sql = "SELECT * FROM exceltoexcel2";
$result = $conn->query($sql);

// PhpSpreadsheet çalışma kitabı oluşturma
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Sütun başlıklarını yazma
$columnIndex = 1;
foreach ($result->fetch_assoc() as $key => $value) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $key);
    $columnIndex++;
}

// Verileri yazma
$rowIndex = 2;
while ($row = $result->fetch_assoc()) {
    $columnIndex = 1;
    foreach ($row as $value) {
        $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
        $columnIndex++;
    }
    $rowIndex++;
}

// Excel dosyasını oluşturma
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('exceltoexcel2.xlsx');

// MySQL bağlantısını kapatma
$conn->close();

// İndirme bağlantısını oluşturma ve kullanıcıya sunma
echo 'Veriler başarıyla Excel dosyasına aktarıldı. <a href="exceltoexcel2.xlsx">İndirmek için tıklayınız</a>';
?>
