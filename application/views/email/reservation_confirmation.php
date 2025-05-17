<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Reservasi - Milala Auto Service</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1a237e;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .reservation-details {
            background-color: #f9f9f9;
            border-left: 4px solid #1a237e;
            padding: 15px;
            margin: 20px 0;
        }
        .reservation-details p {
            margin: 5px 0;
        }
        .reservation-id {
            font-size: 18px;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 10px;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #1a237e;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .divider {
            border-top: 1px solid #e0e0e0;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Terima Kasih Atas Reservasi Anda</h1>
        </div>
        
        <div class="content">
            <p>Halo <?= html_escape($name) ?>,</p>
            <p>Terima kasih telah melakukan reservasi di Milala Auto Service. Berikut detail reservasi Anda:</p>
            
            <div class="reservation-details">
                <div class="reservation-id">ID Reservasi: #<?= $reservation_id ?></div>
                <p><strong>Nama:</strong> <?= html_escape($name) ?></p>
                <p><strong>Layanan:</strong> <?= html_escape($service_type) ?></p>
                <p><strong>Jenis Kendaraan:</strong> <?= html_escape($vehicle_type) ?></p>
                <p><strong>Merek Kendaraan:</strong> <?= html_escape($vehicle_brand) ?></p>
                <p><strong>Tanggal Reservasi:</strong> <?= date('d F Y', strtotime($reservation_date)) ?></p>
                <p><strong>Waktu Reservasi:</strong> <?= date('H:i', strtotime($reservation_time)) ?> WIB</p>
                <?php if (!empty($notes)): ?>
                <p><strong>Catatan:</strong> <?= html_escape($notes) ?></p>
                <?php endif; ?>
            </div>

            <p>Kami telah menerima permintaan reservasi Anda dan akan segera memprosesnya. Tim kami akan menghubungi Anda untuk konfirmasi lebih lanjut.</p>
            
            <div class="divider"></div>
            
            <p>Jika Anda memiliki pertanyaan atau perlu bantuan, jangan ragu untuk menghubungi kami melalui:</p>
            <p>📞 Telepon: [Nomor Telepon]</p>
            <p>📧 Email: info@milalaautoservice.com</p>
            
            <p>Terima kasih telah mempercayakan kendaraan Anda kepada kami!</p>
            
            <p>Salam hangat,<br>Tim Milala Auto Service</p>
        </div>
        
        <div class="footer">
            <p>© <?= date('Y') ?> Milala Auto Service. All rights reserved.</p>
            <p>Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
