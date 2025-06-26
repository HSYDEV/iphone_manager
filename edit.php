<?php
$dataFile = 'data.json';
$devices = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

$id = isset($_GET['id']) ? intval($_GET['id']) : -1;

if ($id >= 0 && $id < count($devices)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $devices[$id] = [
            "model" => $_POST['model'],
            "storage" => $_POST['storage'],
            "battery" => $_POST['battery'],
            "color" => $_POST['color'],
            "price" => $_POST['price'],
            "date" => $_POST['date'],
            "sim_status" => $_POST['sim_status'],
            "parts_changed" => $_POST['parts_changed'],
            "sim_type" => $_POST['sim_type'],
            "location" => $_POST['location'],
            "phone_status" => $_POST['phone_status'],
            "notes" => $_POST['notes']
        ];
        file_put_contents($dataFile, json_encode($devices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header("Location: view.php");
        exit;
    }
    $device = $devices[$id];
} else {
    header("Location: view.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>✏️ تعديل الجهاز</title>
    <link rel="stylesheet" href="css/style.css">
      <link rel="manifest" href="manifest.json" />
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('service-worker.js')
        .then(reg => console.log('Service Worker Registered'))
        .catch(err => console.error('Service Worker Error:', err));
    }
  </script>
</head>
<body>
<div class="container">
    <h2>✏️ تعديل بيانات iPhone</h2>
    <form method="POST">
        <?php foreach ($device as $key => $value): ?>
            <?php if ($key == "notes"): ?>
                <textarea name="<?= $key ?>"><?= htmlspecialchars($value) ?></textarea>
            <?php else: ?>
                <input type="<?= $key == 'date' ? 'date' : 'text' ?>" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>" required>
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit">💾 حفظ التعديلات</button>
    </form>
       <nav >
    <a class="bta" href="index.php">
      🔙 العودة إلى الرئيسية
    </a>
    </nav>
    
</div>
</body>
</html>