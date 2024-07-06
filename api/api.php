<?php
// Defina a URL da API que você deseja espelhar
$apiUrl = 'https://rtpdasorte.x10.mx/bacbo.php?key=vip24';

// Inicialize uma sessão cURL
$ch = curl_init();

// Configure a URL e outras opções necessárias para a requisição cURL
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desabilita a verificação SSL (não recomendado para produção)

// Execute a requisição cURL e armazene a resposta
$response = curl_exec($ch);

// Verifique se houve erros na execução da requisição cURL
if ($response === false) {
    // Capture o erro
    $error = curl_error($ch);
    curl_close($ch);
    // Retorne um erro em formato JSON
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'error' => $error,
        'support' => '@TheCoderSuporte'
    ]);
    exit;
}

// Feche a sessão cURL
curl_close($ch);

// Defina o cabeçalho como JSON e retorne a resposta da API
header('Content-Type: application/json');
echo $response;