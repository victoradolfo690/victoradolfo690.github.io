<?php
header('Content-Type: application/json');

if (!isset($_GET['rnc']) || empty(trim($_GET['rnc']))) {
    echo json_encode(['error' => 'RNC no especificado']);
    exit;
}

$rnc_buscado = preg_replace('/\s+/', '', trim($_GET['rnc']));
$archivo = 'DGII_RNC.TXT';

if (!file_exists($archivo)) {
    echo json_encode(['error' => 'Archivo no encontrado']);
    exit;
}

$lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lineas as $linea) {
    $partes = explode('|', $linea);
    if (count($partes) >= 3) {
        $rnc_archivo = preg_replace('/\s+/', '', trim($partes[0]));
        if ($rnc_archivo === $rnc_buscado) {
            echo json_encode([
                'rnc' => trim($partes[0]),
                'nombre' => trim($partes[1]),
                'nombre_comercial' => trim($partes[2]),
                'actividad' => isset($partes[3]) ? trim($partes[3]) : '',
                'estado' => isset($partes[6]) ? trim($partes[6]) : '',
                'regimen' => isset($partes[7]) ? trim($partes[7]) : ''
            ]);
            exit;
        }
    }
}

echo json_encode(['error' => 'RNC no encontrado']);
