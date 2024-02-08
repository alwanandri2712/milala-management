<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subject Email Balasan</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      align-items: center;
    }

    .logo {
      max-width: 50%;
      height: auto;
      width: 80px;
      height: 80px;
    }

    .app-title {
      font-size: 24px;
      color: #333333;
      margin-left: auto; /* Untuk memberikan jarak antara logo dan judul aplikasi */
    }

    h1 {
      color: #333333;
    }

    p {
      color: #555555;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007BFF;
      color: #ffffff;
      text-decoration: none;
      border-radius: 3px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="<?= base_url('assets/img/logo_muara_enim.png') ?>"  alt="Logo Aplikasi" class="logo">
      <div class="app-title"><?= APP_NAME ?></div>
    </div>

    <h1>Terima Kasih atas Pesan Anda!</h1>
    <p>Terima kasih telah menghubungi kami. Kami akan segera merespons pesan Anda.</p>
    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>

    <p>Terima kasih,<br>Tim Kami</p>

    <p>
      <a href="https://example.com" class="button">Kunjungi Situs Kami</a>
    </p>
  </div>
</body>
</html>
