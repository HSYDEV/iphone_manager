<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لوحة إدارة أجهزة iPhone</title>
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
  <div class="container center">
    <h1>📱 نظام إدارة أجهزة iPhone</h1>
    <nav>
      <a href="add.php">➕ إضافة جهاز</a>
      <a href="view.php">📋 عرض البيانات</a>
      <a href="export.php">📤 تصدير البيانات</a>
    </nav>
  </div>
</body>
</html>