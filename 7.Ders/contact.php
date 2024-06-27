<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Teknoloji Bağımlılığı Bilgilendirme</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Ana Sayfa</a></li>
                <li><a href="about.html">Hakkımızda</a></li>
                <li><a href="resources.html">Kaynaklar</a></li>
                <li><a href="contact.php">İletişim</a></li>
            </ul>
        </nav>
        <h1>İletişim</h1>
    </header>
    <main>
        <section class="contact-section">
            <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $mail = new PHPMailer(true);

                try {
                    $mail->CharSet = 'UTF-8'; // Türkçe karakterler için charset ayarı
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'SENİNMAİLİN@gmail.com';
                    $mail->Password   = 'SENİNGOOGLEDANALDIĞINPASSWORD';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->setFrom('SENİNMAİLİN@gmail.com', 'Mailer');
                    $mail->addAddress('SENİNMAİLİN@gmail.com', 'Joe User');

                    $mail->isHTML(true);
                    $mail->Subject = 'Yeni İletişim Formu Mesajı';
                    $mail->Body    = "Ad: $name<br>Email: $email<br>Mesaj: $message";
                    $mail->AltBody = "Ad: $name\nEmail: $email\nMesaj: $message";

                    $mail->send();
                    echo '<p class="success-message">Mesajınız başarıyla gönderildi. Teşekkürler!</p>';
                } catch (Exception $e) {
                    echo '<p class="error-message">Mesaj gönderilemedi. Hata: ' . $mail->ErrorInfo . '</p>';
                }
            } else {
                echo '<form action="contact.php" method="POST" class="contact-form">
                    <label for="name">Adınız:</label>
                    <input type="text" id="name" name="name" required><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>
                    <label for="message">Mesajınız:</label>
                    <textarea id="message" name="message" required></textarea><br>
                    <button type="submit">Gönder</button>
                </form>';
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Teknoloji Bağımlılığı Bilgilendirme</p>
        <p>Created by a KodLand Student Cem Berkay YANAR</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
-