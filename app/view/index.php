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
            require_once "../db/Database.php";
            require_once "../obj/Pengguna.php"; # sisipkan class pengguna

            $database = new Database();
            $db = $database->getConnection();
            
            if (!$db) die("<tr><td colspan='3'>Koneksi database bermasalah.</td></tr>");
            
            $pengguna = new Pengguna($db);

            # Dapatkan semua pengguna
            $stmt = $pengguna->read();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($rows) > 0) :
                foreach ($rows as $row):
                    $idpengguna = htmlspecialchars($row['idpengguna']);
                    $nama       = htmlspecialchars($row['nama']);
                    $surel      = htmlspecialchars($row['surel']);

                    # cara menulis echo pada banyak baris
                    echo <<< EOT
                    <tr>
                       <td>{$nama}</td>
                       <td>{$surel}</td>
                       <td>
                          <a href='edit.php?id={$idpengguna}'>Ubah</a> | 
                          <a href='delete.php?id={$idpengguna}' onclick='return confirm("Hapus data {$nama}?")'>Hapus</a>
                       </td>
                    </tr>
                    EOT;
                endforeach;
            else:
                echo "<tr><td colspan='3'>Tidak ada pengguna</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</body>

</html>