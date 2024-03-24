<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    background: url('https://i.pinimg.com/originals/b3/26/51/b326517cd8ca44b939a1bee41a7f103c.gif') center center fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

header {
    color: white;
    padding: 20px;
}

.container {
    width: 50%;
    margin: auto;
    background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 40px;
    backdrop-filter: blur(2px); /* Add a blur effect to the background */
}

table {
    width: 100%;
    margin-top: 20px;
}

td {
    padding: 15px;
    text-align: left;
}

select,
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "Admin") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <div class="container">
        <form action="create-user.php" method="POST">
            <h1>Tambah Pengguna</h1>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Sandi</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Tingkat</td>
                    <td>
                        <select name="level">
                            <option value="Admin">Admin</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Logistik">Logistik</option>
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
