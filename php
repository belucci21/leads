<?php
// URL de la API que mencionaste para obtener los leads de marketing
$url = 'https://intranet.gestlife.app/index.php?view=leads/leads-marketing-list';

// Inicializa cURL para hacer la solicitud GET
$ch = curl_init();

// Configura la solicitud a la API
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Para recibir los datos como respuesta
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Opcional, en caso de que haya problemas con SSL

// Ejecuta la solicitud
$response = curl_exec($ch);

// Si hay algún error con la solicitud, imprímelo y detén el script
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
    exit;
}

// Cierra la conexión cURL
curl_close($ch);

// Decodifica la respuesta (asumo que es JSON)
$data = json_decode($response, true);

// Verifica si los datos fueron obtenidos correctamente
if (!$data) {
    echo 'Error al decodificar la respuesta de la API. Verifica la estructura de los datos.';
    exit;
}

// Imprime los datos obtenidos para visualizarlos (en formato legible)
echo '<pre>';
print_r($data);
echo '</pre>';
?>
