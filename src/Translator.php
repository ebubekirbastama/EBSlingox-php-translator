<?php

class Translator
{
    private string $apiKey;
    private string $apiUrl = "https://translation.googleapis.com/language/translate/v2";

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Metin çevirisi yapar.
     *
     * @param string $text Çevrilecek metin
     * @param string $target Hedef dil kodu (örn: "en")
     * @param string|null $source Kaynak dil kodu (boş bırakılırsa otomatik algılar)
     * @return string|null Çeviri sonucu veya null (hata durumunda)
     */
    public function translate(string $text, string $target, string $source = null): ?string
    {
        $url = $this->apiUrl . "?key=" . $this->apiKey;

        $payload = [
            "q" => $text,
            "target" => $target,
            "format" => "text"
        ];

        if ($source) {
            $payload["source"] = $source;
        }

        $response = $this->sendRequest($url, $payload);

        if (!$response || !isset($response["data"]["translations"][0]["translatedText"])) {
            error_log("Çeviri başarısız veya beklenen veri alınamadı.");
            return null;
        }

        return $response["data"]["translations"][0]["translatedText"];
    }

    /**
     * API'ye HTTP POST isteği gönderir.
     */
    private function sendRequest(string $url, array $payload): ?array
    {
        $ch = curl_init($url);
        
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
            CURLOPT_POSTFIELDS => json_encode($payload)
        ]);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            error_log("cURL Hatası: " . curl_error($ch));
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        if ($httpCode !== 200) {
            error_log("API Hatası: " . $result);
            return null;
        }

        return json_decode($result, true);
    }
}
