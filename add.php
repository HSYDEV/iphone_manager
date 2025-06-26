<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $device = [
        "model" => $_POST['model'],
        "storage" => $_POST['storage'],
        "battery" => $_POST['battery'],
        "color" => $_POST['color'],
        "price" => $_POST['price'],
        "date" => date("Y-m-d"), // إدخال التاريخ تلقائي
        "sim_status" => $_POST['sim_status'],
        "parts_changed" => $_POST['parts_changed'],
        "sim_type" => $_POST['sim_type'],
        "location" => $_POST['location'],
        "phone_status" => $_POST['phone_status'],
        "notes" => $_POST['notes']
    ];

    $devices = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
    $devices[] = $device;
    file_put_contents($dataFile, json_encode($devices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header("Location: add.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>➕ إضافة جهاز iPhone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>➕ إضافة جهاز iPhone</h2>
    <form method="POST">
        <input type="text" name="model" placeholder="موديل iPhone" required>

        <select name="storage" required>
            <option value="">🧠 سعة التخزين</option>
            <option>16G</option>
            <option>32G</option>
            <option>64G</option>
            <option>128G</option>
            <option>256G</option>
            <option>512G</option>
            <option>1T</option>
        </select>

        <input type="text" name="battery" placeholder="🔋 نسبة البطارية" required>
        <input type="text" name="color" placeholder="🎨 اللون" required>
        <input type="text" name="price" placeholder="💰 السعر" required>

        <select name="sim_status" required>
            <option value="">🔒 حالة الشريحة</option>
            <option>مفتوح رسمي</option>
            <option>مقفل</option>
        </select>

        <input type="text" name="parts_changed" placeholder="🛠️ هل توجد قطع مغيرة؟" required>

        <select name="sim_type" required>
            <option value="">📶 نوع الشريحة</option>
            <option>شريحه واحدة</option>
            <option>شريحتين رسمي</option>
            <option>شريحتين معدل</option>
            <option>شريحة إلكترونية</option>
            <option>eSIM</option>
        </select>

        <input type="text" name="location" placeholder="📍 مكان العرض" required>

        <select name="phone_status" required>
            <option value="">📱 حالة الجهاز</option>
            <option>مختم</option>
            <option>مستخدم بكرتونه</option>
            <option>مستخدم</option>
            <option>آثار استخدام</option>
            <option>معاد تصنيعه</option>
        </select>

        <textarea name="notes" placeholder="📝 ملاحظات إضافية"></textarea>

        <button type="submit">➕ إضافة</button>
    </form>
    <nav >
    <a class="bta" href="index.php">
      🔙 العودة إلى الرئيسية
    </a>
    </nav>
  </div>
</body>
</html>