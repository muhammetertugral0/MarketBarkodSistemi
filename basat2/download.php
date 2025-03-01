<?php
// Hata raporlamayı aç (geliştirme sırasında faydalı)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantısı
$host = 'localhost';
$dbname = 'basat_db';
$user = 'root';  // Kendi veritabanı kullanıcı adınızla değiştirin
$pass = '';      // Kendi veritabanı şifrenizle değiştirin

try {
    // PDO bağlantısı oluştur (daha güvenli ve hata yönetimi daha iyi)
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Bağlantı hatası durumunda
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Dosya istendi mi kontrol et
if (isset($_GET['file'])) {
    $dosya_adi = basename($_GET['file']); // Güvenlik için dosya adını temizle
    
    // İndirme klasörünün yolu (bu klasörü oluşturduğunuzdan emin olun)
    $dosya_yolu = __DIR__ . '/dosyalar/' . $dosya_adi;
    
    // Dosya var mı kontrol et
    if (file_exists($dosya_yolu)) {
        // Sayacı güncelle
        try {
            $stmt = $db->prepare("UPDATE indirmeler SET sayac = sayac + 1 WHERE dosya_adi = ?");
            $stmt->execute([$dosya_adi]);
        } catch(PDOException $e) {
            // Hata olursa görmezden gel ve dosyayı indirmeye devam et
            error_log("Sayaç güncelleme hatası: " . $e->getMessage());
        }
        
        // Dosyayı indir
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $dosya_adi . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dosya_yolu));
        flush(); // PHP çıktı tamponlarını temizle
        
        readfile($dosya_yolu);
        exit;
    } else {
        echo "<h2>Hata: Dosya bulunamadı!</h2>";
        echo "<p>İndirmek istediğiniz dosya sunucuda mevcut değil.</p>";
        echo "<p><a href='index.php'>Ana sayfaya dön</a></p>";
    }
} else {
    echo "<h2>Hata: Geçersiz indirme isteği!</h2>";
    echo "<p><a href='index.php'>Ana sayfaya dön</a></p>";
}
?>