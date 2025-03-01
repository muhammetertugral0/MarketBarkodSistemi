<?php
// Hata raporlamayı aç
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantısı
$host = 'localhost';
$dbname = 'basat_db';
$user = 'root';  // Kendi veritabanı kullanıcı adınızla değiştirin
$pass = '';      // Kendi veritabanı şifrenizle değiştirin

try {
    // PDO bağlantısı oluştur
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // İndirme sayısını al
    $stmt = $db->prepare("SELECT sayac FROM indirmeler WHERE dosya_adi = ?");
    $stmt->execute(['basat_market_yonetim.deb']);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $indirme_sayisi = ($result) ? $result['sayac'] : 0;
    
    // Sayacı HTML olarak döndür
    echo '<div class="indirme-sayaci">';
    echo '<span class="sayi">' . number_format($indirme_sayisi, 0, ',', '.') . '</span> kez indirildi';
    echo '</div>';
    
} catch(PDOException $e) {
    // Hata durumunda boş bir sayaç göster
    echo '<div class="indirme-sayaci">';
    echo '<span class="sayi">0</span> kez indirildi';
    echo '</div>';
    
    // Hatayı logla
    error_log("Veritabanı hatası: " . $e->getMessage());
}
?>