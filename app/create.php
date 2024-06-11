<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input data Pengguna</title>
</head>

<body>
    <div style="margin-bottom:30px"><a href="index.php">&larr; Kembali</a></div>
    <?php
    # menangkap respon dari method="post"
    if ($_SERVER['REQUEST_METHOD'] == "POST") { # jika ditekan submit
        include_once("pengguna.php");

        $database = new Database();
        $db = $database->getConnection();

        $pengguna = new Pengguna($db);
        $pengguna->nama = $_POST['nama'];
        $pengguna->surel = $_POST['surel'];
        $pengguna->sandi =  password_hash($_POST['sandi'], PASSWORD_DEFAULT);

        # simpan
        if ($pengguna->create()) {
            header('location: index.php'); # redirect
        } else {
            echo "Gagal menyimpan data pengguna. <a href='create.php'>Ulangi</a> | <a href='index.php'>Lanjut</a>";
        }
    } else {
    ?>
        <form action="create.php" method="post">
            <p>
                <label>Nama:</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required>
            </p>
            <p>
                <label>Surel:</label>
                <input type="text" name="surel" placeholder="Surel aktif" required>
            </p>
            </p>
            <p>
                <label>Sandi:</label>
                <input type="password" name="sandi" placeholder="Kata sandi" required>
            </p>
            <p>
                <input type="reset" value="ULANGI">
                <input type="submit" value="SIMPAN">
            </p>
        </form>
    <?php } ?>
</body>

</html>