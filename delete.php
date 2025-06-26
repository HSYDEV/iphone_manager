<?php
$dataFile = 'data.json';
$devices = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

$id = isset($_GET['id']) ? intval($_GET['id']) : -1;

if ($id >= 0 && $id < count($devices)) {
    array_splice($devices, $id, 1);
    file_put_contents($dataFile, json_encode($devices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

header("Location: view.php");
exit;
?>