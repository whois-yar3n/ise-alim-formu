<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Başvuru Onayı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-center mb-4">Yazılım Uzmanı Bilgi Formu - Onay</h2>
                    <div class="alert alert-success" role="alert">
                        <h4>Form başarıyla gönderildi!</h4>
                        <p>Aşağıda girdiğiniz bilgiler yer almaktadır:</p>
                    </div>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<h3>Form Verileri</h3>";
                        echo "<p><strong>T.C. Kimlik:</strong> " . htmlspecialchars($_POST["tc"]) . "</p>";
                        echo "<p><strong>Ad Soyad:</strong> " . htmlspecialchars($_POST["adSoyad"]) . "</p>";
                        echo "<p><strong>Yaş:</strong> " . htmlspecialchars($_POST["yas"]) . "</p>";
                        echo "<p><strong>Mail Adresi:</strong> " . htmlspecialchars($_POST["ePosta"]) . "</p>";
                        echo "<p><strong>Yazılıma Giriş Tarihi:</strong> " . htmlspecialchars($_POST["tarih"]) . "</p>";
                        echo "<p><strong>Yazılım Deneyimi:</strong> " . htmlspecialchars($_POST["deneyim"]) . "</p>";
                        echo "<p><strong>Programlama Dilleri:</strong> ";
                        if (!empty($_POST["pDil"])) {
                            foreach ($_POST["pDil"] as $dil) {
                                echo htmlspecialchars($dil) . " ";
                            }
                        }
                        echo "</p>";
                        if (isset($_POST["onay"])) {
                            echo "<p><strong>Form onaylandı.</strong></p>";
                        } else {
                            echo "<p><strong>Form onaylanmadı.</strong></p>";
                        }

                        // Fotoğraf yükleme işlemi
                        if (isset($_FILES['profil']) && $_FILES['profil']['error'] == 0) {
                            $uploadDir = 'uploads/';
                            if (!is_dir($uploadDir)) {
                                mkdir($uploadDir, 0777, true);
                            }
                            $fileName = basename($_FILES['profil']['name']);
                            $uploadFile = $uploadDir . $fileName;
                            if (move_uploaded_file($_FILES['profil']['tmp_name'], $uploadFile)) {
                                echo "<p><strong>Fotoğraf başarıyla yüklendi:</strong> <a href='$uploadFile' target='_blank'>$fileName</a></p>";
                            } else {
                                echo "<p><strong>Fotoğraf yüklenirken hata oluştu.</strong></p>";
                            }
                        }
                    }
                    ?>

                    <div class="text-center mt-4">
                        <a href="form_25.02.26.2.php" class="btn btn-primary">Yeni Başvuru Yap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>