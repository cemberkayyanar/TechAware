<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Burada form verilerini işleyebilir, örneğin veritabanına kaydedebilir veya e-posta gönderebilirsiniz.
    
    // Basit bir mesaj gösterimi
    echo "Teşekkürler, $name. Mesajınız alındı.";
} else {
    echo "Form gönderimi hatası!";
}
?>
