<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İş Başvuru Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">İş Başvuru Formu</h2>
                <form action="basvuru.php" method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                    <fieldset class="mb-4">
                        <legend class="h5">Kişisel Bilgiler</legend>
                        <div class="mb-3">
                            <label for="tc" class="form-label">TC Kimlik</label>
                            <input type="text" name="tc" id="tc" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="adsoyad" class="form-label">Ad Soyad</label>
                            <input type="text" name="adsoyad" id="adsoyad" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="yas" class="form-label">Yaş</label>
                            <input type="number" name="yas" id="yas" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail Adresi</label>
                            <input type="email" name="mail" id="mail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Fotoğraf Ekle</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="giris_tarihi" class="form-label">Yazılım Giriş Tarihi</label>
                            <input type="date" name="giris_tarihi" id="giris_tarihi" class="form-control" required>
                        </div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <legend class="h5">Yazılım Deneyimi</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deneyim" id="deneyim1" value="1-5" required>
                            <label class="form-check-label" for="deneyim1">1-5 yıl</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deneyim" id="deneyim2" value="6-10" required>
                            <label class="form-check-label" for="deneyim2">6-10 yıl</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <legend class="h5">Programlama Dilleri</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="csharp" value="C#">
                                    <label class="form-check-label" for="csharp">C#</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="php" value="PHP">
                                    <label class="form-check-label" for="php">PHP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="java" value="Java">
                                    <label class="form-check-label" for="java">Java</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="python" value="Python">
                                    <label class="form-check-label" for="python">Python</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="html" value="HTML">
                                    <label class="form-check-label" for="html">HTML</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="diller[]" id="javascript" value="JavaScript">
                                    <label class="form-check-label" for="javascript">JavaScript</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mb-4">
                        <legend class="h5">Form Onay</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="onay" id="onay" required>
                            <label class="form-check-label" for="onay">Yukarıdaki bilgilerin doğruluğunu kabul ediyorum ve sözleşmeyi onaylıyorum.</label>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                        <button type="reset" class="btn btn-secondary">Temizle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<div class="container mt-5">';
    echo '<div class="alert alert-success" role="alert">';
    echo "<h4>Başvuru Bilgileri</h4>";
    echo "<strong>TC Kimlik:</strong> " . htmlspecialchars($_POST["tc"]) . "<br>";
    echo "<strong>Ad Soyad:</strong> " . htmlspecialchars($_POST["adsoyad"]) . "<br>";
    echo "<strong>Yaş:</strong> " . htmlspecialchars($_POST["yas"]) . "<br>";
    echo "<strong>Mail:</strong> " . htmlspecialchars($_POST["mail"]) . "<br>";
    echo "<strong>Yazılım Giriş Tarihi:</strong> " . htmlspecialchars($_POST["giris_tarihi"]) . "<br>";
    echo "<strong>Deneyim:</strong> " . htmlspecialchars($_POST["deneyim"]) . "<br>";

    if (!empty($_POST["diller"])) {
        echo "<strong>Programlama Dilleri:</strong> " . htmlspecialchars(implode(", ", $_POST["diller"])) . "<br>";
    }

    if (isset($_POST["onay"])) {
        echo "<strong>Form onaylandı.</strong>";
    } else {
        echo "<strong>Form onaylanmadı.</strong>";
    }
    echo '</div>';
    echo '</div>';
}
?>