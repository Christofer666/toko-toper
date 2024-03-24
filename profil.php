<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background: url('https://i.pinimg.com/originals/b8/2f/28/b82f28a7e9c8fcb3868d3d94652c107c.gif') center center fixed;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        header {
            color: white;
            padding: 10px;
        }

        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px; /* Increased margin */
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            backdrop-filter: blur(2px); /* Add a blur effect to the background */
        }

        h1 {
            margin-bottom: 20px; /* Added margin for separation */
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }


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

        img {
            border-radius: 50%;
            margin-bottom: 20px; /* Increased margin */
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_SESSION["id"];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <form action="update-profil.php" method="POST">
            <h1>Profil</h1>

            <img src="https://media.istockphoto.com/id/1475332674/id/vektor/logo-orang-pengguna-vektor-ikon-profil.jpg?s=612x612&w=0&k=20&c=tdOsVq7F2lPELrEbju2g7fpZzacjwu9TbRaTxbXZdlc=" alt="Profile Picture" width="150">

            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input readonly type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Sandi Baru</td>
                    <td><input required type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Ulangi Sandi Baru</td>
                    <td><input required type="password" name="confirm_password"></td>
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
