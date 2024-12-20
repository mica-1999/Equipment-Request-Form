<?php
require_once __DIR__ . '/vendor/autoload.php';

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate and sanitize inputs
$firstName = htmlspecialchars($data['first_name']);
$lastName = htmlspecialchars($data['last_name']);
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$voip = htmlspecialchars($data['voip']);
$direcao = htmlspecialchars($data['direcao']);
$secretaria = htmlspecialchars($data['secretaria']);
$requestDate = htmlspecialchars($data['request_date']);

// Create an instance of the mPDF class
$mpdf = new \Mpdf\Mpdf();

// Create HTML content
$html = "
<h1>Review Section</h1>
<p><strong>Primeiro Nome:</strong> $firstName</p>
<p><strong>Último Nome:</strong> $lastName</p>
<p><strong>E-mail:</strong> $email</p>
<p><strong>VoIP:</strong> $voip</p>
<p><strong>Direção:</strong> $direcao</p>
<p><strong>Secretária:</strong> $secretaria</p>
<p><strong>Data do Pedido:</strong> $requestDate</p>
";

// Write HTML content to PDF
$mpdf->WriteHTML($html);

// Output PDF directly to browser
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="review.pdf"');
echo $mpdf->Output('', 'S');
?>