<?php
header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=iphone_data.csv");

$dataFile = 'data.json';
$devices = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

$output = fopen("php://output", "w");
fputcsv($output, ["موديل", "التخزين", "البطارية", "اللون", "السعر", "التاريخ", "حالة الشريحة", "قطع مغيرة", "نوع الشريحة", "الموقع", "حالة الهاتف", "ملاحظات"]);

foreach ($devices as $device) {
    fputcsv($output, $device);
}

fclose($output);
exit;
?>