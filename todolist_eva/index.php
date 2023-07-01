<?php
require "connection.php";

$datas = mysqli_query($connection, "SELECT * FROM tugas_eva");
$tugas = "";
$keterangan = "";
$deadline = "";

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM tugas_eva WHERE id_tugas = '$id'");
    if (mysqli_affected_rows($connection) > 0) {
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal Menghapus data";
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $datas_edit = mysqli_query($connection, "SELECT * FROM tugas_eva WHERE id_tugas = '$id'");
    foreach ($datas_edit as $data_edit) {
        $tugas = $data_edit['nama_tugas'];
        $keterangan = $data_edit['keterangan'];
        $deadline = $data_edit['deadline'];
    }
}

if (isset($_POST['Edit'])) {
    $id = $_GET['edit'];
    $tugas = $_POST['tugas'];
    $keterangan = $_POST['keterangan'];
    $deadline = $_POST['deadline'];

    mysqli_query($connection, "UPDATE tugas_eva SET nama_tugas = '$tugas', keterangan = '$keterangan', deadline = '$deadline' WHERE id_tugas = '$id'");
    if (mysqli_affected_rows($connection) > 0) {
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php?edit=' . $id);
        exit();
    }
}

if (isset($_POST['Simpan'])) {
    $tugas = $_POST['tugas'];
    $keterangan = $_POST['keterangan'];
    $deadline = $_POST['deadline'];

    mysqli_query($connection, "INSERT INTO tugas_eva (nama_tugas, keterangan, deadline) VALUES ('$tugas', '$keterangan', '$deadline')");
    if (mysqli_affected_rows($connection) > 0) {
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal Menambah data";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card mx-auto mt-4" style="width: 50rem;">
        <h2 class="card-header text-center">To Do List</h2>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="tugas" class="form-label">Tugas</label>
                    <input type="text" class="form-control" name="tugas" placeholder="Mata Kuliah" value="<?= $tugas ?>">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Tugas" value="<?= $keterangan ?>">
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="datetime-local" class="form-control" name="deadline" value="<?= $deadline ?>">
                </div>
                <?php if (isset($_GET['edit'])) : ?>
                    <button type="submit" class="btn btn-primary" name="Edit" value="edit">Edit</button>
                <?php else : ?>
                    <button type="submit" class="btn btn-primary" name="Simpan" value="simpan">Simpan</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <div class="card mx-auto mt-4" style="width: 50rem;">
        <div class="p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Deadline</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($datas as $data) :
                    ?>
                        <tr>
                            <th scope="row"><?= $num++ ?></th>
                            <td><?= $data['nama_tugas'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                            <td><?= $data['deadline'] ?></td>
                            <td class="text-center">
                                <a href="?hapus=<?= $data['id_tugas'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?edit=<?= $data['id_tugas'] ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="fly-container">
        <div class="fly book"></div>
        <div class="fly pen"></div>
        <div class="fly bag"></div>
        <div class="fly com"></div>
    </div>
    <script src="app.js"></script>

</body>

</html>