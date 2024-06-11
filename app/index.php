<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
</head>

<body>
    <div style="margin-bottom:30px"><a href="create.php">+ Tambah</a></div>

    <table border="1" width="500">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Surel</th>
                <th width="100">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("pengguna.php"); # sisipkan class pengguna

            $database = new Database();
            $db = $database->getConnection();

            $pengguna = new Pengguna($db);

            // Dapatkan semua pengguna
            $stmt = $pengguna->read();
            $num = $stmt->rowCount();

            if ($num > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    # cara menulis echo pada banyak baris
                    echo <<< EOT
                    <tr>
                       <td>{$nama}</td>
                       <td>{$surel}</td>
                       <td>
                          <a href='edit.php?id={$idpengguna}'>Ubah</a> | 
                          <a href='delete.php?id={$idpengguna}'>Hapus</a>
                       </td>
                    </tr>
                    EOT;
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada pengguna</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>