<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data Pengguna</title>
</head>

<body>
    <div style="margin-bottom:30px"><a href="index.php">&larr; Kembali</a></div>
    <?php
    include_once("Pengguna.php");

    $database = new Database();
    $db = $database->getConnection();

    $pengguna = new Pengguna($db);

    if ($_SERVER['REQUEST_METHOD'] == "POST") { # jika ditekan submit   
        $pengguna->idpengguna = $_POST['temp_id'];
        $pengguna->nama = $_POST['nama'];
        $pengguna->surel = $_POST['surel'];

        if($_POST['sandi'] !== ""):
            $pengguna->sandi = password_hash($_POST['sandi'], PASSWORD_DEFAULT);
        else:
            $pengguna->sandi = $_POST['temp_sandi'];
        endif;

        # update
        if ($pengguna->update()) {
            header('location: index.php'); # redirect
        } else {
            echo "Gagal menyimpan data pengguna. <a href='create.php'>Ulangi</a> | <a href='index.php'>Lanjut</a>";
        }
    } else {
        $pengguna->idpengguna = $_GET['id'];        
        $stmt = $pengguna->show();
        $num = $stmt->rowCount();

        if ($num > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                echo <<< EOT
                <form action="edit.php" method="post">
                <input type="hidden" name="temp_id" value="{$idpengguna}">
                <input type="hidden" name="temp_sandi" value="{$sandi}">
                <p>
                    <label>Nama:</label>
                    <input type="text" name="nama" placeholder="Nama lengkap" value="{$nama}" required>
                </p>
                <p>
                    <label>Surel:</label>
                    <input type="text" name="surel" placeholder="Surel aktif" value="{$surel}" required>
                </p>
                <p>
                    <label>Sandi:</label>
                    <input type="password" name="sandi" placeholder="Kata sandi"><br>
                    <small>Jangan mengisi kata sandi baru, jika tak ada perubahan</small>
                </p>
                <p>
                    <input type="submit" value="SIMPAN">
                </p>
                </form>
                EOT;
            }
        } else {
            echo "Tidak ada pengguna yang ditemukan.";
        }

    ?>
        
    <?php } ?>
</body>

</html>