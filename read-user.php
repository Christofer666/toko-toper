<!DOCTYPE html>
<html>

<head>
    <title>Read User</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-user.php" method="POST">
            <h1>Lihat User</h1>

            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="old_password" value="<?= $user["password"] ?>">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="admin" <?= $user["level"] == "admin" ? "selected" : "" ?>>admin</option>
                            <option value="keuangan" <?= $user["level"] == "keuangan" ? "selected" : "" ?>>keuangan</option>
                            <option value="logistik" <?= $user["level"] == "logistik" ? "selected" : "" ?>>logistik</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>