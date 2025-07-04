LingoX - PHP Çok Dilli Çeviri Modülü
======================================

Google Translate API tabanlı, modern ve genişletilebilir PHP çeviri sistemi.

Proje Amacı:
-------------
Web uygulamalarınızda veya bağımsız projelerde kullanabileceğiniz, sade ve çok dilli çeviri çözümü sunar.
Türkçe, İngilizce, Almanca, Fransızca gibi tüm diller arasında çeviri yapabilirsiniz.

Özellikler:
------------
✔ Temiz sınıf yapısı (OOP - Nesne Yönelimli Kodlama)<br>
✔ Çok dilli çeviri desteği<br>
✔ Kaynak dil zorunluluğu yok, otomatik algılama desteği<br>
✔ JSON tabanlı Google Translate API uyumu<br>
✔ Hata kontrol ve loglama desteği<br>
✔ Kolay genişletilebilir mimari<br>

Kurulum:
---------
1) Projeyi klonlayın:
   git clone https://github.com/ebubekirbastama/lingox-php-translator.git

2) `src/Translator.php` dosyasını projenize dahil edin.

3) Google Translate API anahtarınızı alın (https://cloud.google.com/translate) ve aşağıdaki gibi kullanın:

Örnek Kullanım:
----------------
<?php
require_once __DIR__ . '/src/Translator.php';

$apiKey = "YOUR_GOOGLE_TRANSLATE_API_KEY";
$translator = new Translator($apiKey);

// Basit çeviri örneği
$metin = "Merhaba Dünya";
echo "İngilizce Çeviri: " . $translator->translate($metin, "en", "tr");
?>

Yapılandırma:
--------------
- Hedef dil ISO-639-1 kodu ile belirtilir. (örn: en, de, fr, es, tr)
- Kaynak dil parametresi boş bırakılırsa otomatik algılanır.

Gereksinimler:
---------------
- PHP 7.4 veya üstü
- cURL desteği aktif olmalı

Geliştirici Notları:
---------------------
- İlerleyen versiyonlarda desteklenen diller listesini çekme fonksiyonu eklenecektir.
- Composer uyumlu hale getirme çalışmaları planlanmaktadır.
- Topluluk katkılarına açıktır.

Lisans:
--------
MIT Lisansı

İletişim:
----------
Her türlü geri bildirim ve katkı için GitHub üzerinden iletişime geçebilirsiniz.

