<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
       <div class="close-btn"> <a href="index.php">✖</a></div>
                <h2>Contactez-nous</h2>
                <form id="contactForm" action="process.php" method="post">
                    <input type="text" class="field" name="name" placeholder="Nom*" required>
                    <input type="email" class="field" name="email" placeholder="Email*" required>
                    <input type="tel" class="field" name="phone" placeholder="Telephone">
                    <textarea name="message" class="field" placeholder="Message"></textarea>
                    <button type="submit" class="btn" id="submitBtn">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
