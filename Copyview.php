<?php
$dataFile = 'data.json';
$devices = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">

    <title>📋 عرض الأجهزة</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="containerview">
    <h2>📋 قائمة أجهزة iPhone</h2>
    <table class="table">
        <thead>
            <tr>
                <th>الموديل</th>
                <th>التخزين</th>
                <th>البطارية</th>
                <th>اللون</th>
                <th>السعر</th>
                <th>التاريخ</th>
                <th>الشريحة</th>
                <th>قطع مغيرة</th>
                <th>نوع الشريحة</th>
                <th>المكان</th>
                <th>الحالة</th>
                <th>ملاحظات</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($devices as $index => $device): ?>
            <tr>
                <td><?= htmlspecialchars($device['model']) ?></td>
                <td><?= htmlspecialchars($device['storage']) ?></td>
                <td><?= htmlspecialchars($device['battery']) ?></td>
                <td><?= htmlspecialchars($device['color']) ?></td>
                <td><?= htmlspecialchars($device['price']) ?></td>
                <td><?= htmlspecialchars($device['date']) ?></td>
                <td><?= htmlspecialchars($device['sim_status']) ?></td>
                <td><?= htmlspecialchars($device['parts_changed']) ?></td>
                <td><?= htmlspecialchars($device['sim_type']) ?></td>
                <td><?= htmlspecialchars($device['location']) ?></td>
                <td><?= htmlspecialchars($device['phone_status']) ?></td>
                <td><?= htmlspecialchars($device['notes']) ?></td>
                <td >
                    <a href="edit.php?id=<?= $index ?>"><button>✏️</button></a>
                    </td>
                    <td>
                    <a href="delete.php?id=<?= $index ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')"><button style='background:#dc3545'>🗑️</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

   <nav >
    <a class="bta" href="index.html">
      🔙 العودة إلى الرئيسية
    </a>
    </nav>
    </div>
</body>
</html>