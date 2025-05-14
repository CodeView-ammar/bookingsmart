<?php
// تحديد الملفات المسجلة
$accessLogFile = 'C:/xampp/apache/logs/access.log';
$errorLogFile = 'C:/xampp/apache/logs/error.log';
$securityLogFile = 'logs/security.log';  // ملف الأخطاء المخصص من PHP

function readLogFile($filePath) {
    if (file_exists($filePath)) {
        return file_get_contents($filePath);
    } else {
        return "لا يوجد بيانات متاحة.";
    }
}


?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تقرير الأخطاء والنشاط الأمني</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .log-container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        pre { background: #000; color: #0f0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="log-container">
        <h2>📌 سجل الوصول (Access Log)</h2>
        <pre><?php echo readLogFile($accessLogFile); ?></pre>
    </div>

    <div class="log-container">
        <h2>🚨 سجل الأخطاء (Error Log)</h2>
        <pre><?php echo readLogFile($errorLogFile); ?></pre>
    </div>

    <div class="log-container">
        <h2>🔍 السجلات الأمنية (Security Log)</h2>
        <pre><?php echo readLogFile($securityLogFile); ?></pre>
    </div>
</body>
</html>
