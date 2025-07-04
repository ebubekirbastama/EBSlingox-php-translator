<?php

require_once __DIR__ . '/../src/Translator.php';

// Buraya kendi Google Translate API anahtarını ekle
$apiKey = "YOUR_API_KEY_HERE";

$translator = new Translator($apiKey);

// Çok dilli örnek
$metin = "Merhaba Dünya";
$ceviriEn = $translator->translate($metin, "en", "tr"); // Türkçe → İngilizce
$ceviriDe = $translator->translate($metin, "de", "tr"); // Türkçe → Almanca
$ceviriFr = $translator->translate($metin, "fr", "tr"); // Türkçe → Fransızca

echo "İngilizce: $ceviriEn\n";
echo "Almanca: $ceviriDe\n";
echo "Fransızca: $ceviriFr\n";
