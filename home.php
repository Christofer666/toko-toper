    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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
            padding: 20px;
        }

        h1 {
            color: black;
            width: 50%;
                margin: auto;
                background-color: #fff;
                border-radius: 20px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin-top: 40px; /* Increased margin */
                background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
                backdrop-filter: blur(1px); /* Add a blur effect to the background */
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            backdrop-filter: blur(1px); /* Add a blur effect to the background */
        }

        p {
            color: #555;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #45a049;
        }

        .features {
            margin-top: 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .feature:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .feature {
        flex: 1;
        padding: 20px;
        margin: 10px;
        background-color: #e0e0e0;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature h2,
    .feature p {
        text-align: center;
    }


    .card-image {
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover; /* Membuat gambar sesuai dengan ukuran kontainer */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transisi ketika dihover */
    }

    .card-image:hover {
        transform: translateY(-5px); /* Translasi sedikit ke atas ketika dihover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efek bayangan yang lebih kuat ketika dihover */
    }



        </style>
    </head>

    <body>
        <?php include "menu.php"; ?>

        <header>
        <h1>Selamat Datang <?= $_SESSION["username"] ?> - <?= $_SESSION["level"] ?>!</h1>
    </header>

    <div class="container">
        <p></p>
        <p></p>

        <div class="features">
            <div class="feature">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/22._Ku%C3%A9_putu_1.jpg" alt="Feature 1" class="card-image">
                <h2>Putu</h2>
                <p>Makanan</p>
            </div>

            <div class="feature">
                <img src="https://cdn0-production-images-kly.akamaized.net/4dOsAjpaOZumjoxquorYgM1AlWc=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3265521/original/082336300_1602549870-istock-1145447456-copy_ratio-16x9.jpg" alt="Feature 2" class="card-image">
                <h2>Klepon</h2>
                <p>Makanan</p>
            </div>

            <div class="feature">
                <img src="https://asset.kompas.com/crops/3TDG9v4bhmhZsKQeMJTjfukcqxI=/216x247:625x520/750x500/data/photo/2020/04/29/5ea94168c0165.jpg" alt="Feature 3" class="card-image">
                <h2>Es Dawet</h2>
                <p>Minuman</p>
            </div>

            <div class="feature">
                <img src="https://www.masakapahariini.com/wp-content/uploads/2020/08/Resep-Bajigur-Milk-Tea.jpg" alt="Feature 4" class="card-image">
                <h2>Bajigur</h2>
                <p>Minuman</p>
            </div>

            <div class="feature">
                <img src="https://www.sasa.co.id/medias/page_medias/es_cendol_nangka.jpg" alt="Feature 5" class="card-image">
                <h2>Es cendol</h2>
                <p>Minuman</p>
            </div>
        </div>
        <div class="features">
            <div class="feature">
                <img src="https://asset.kompas.com/crops/dGH17UyZay6vi772ipGxq9BOPM8=/0x292:1000x959/750x500/data/photo/2021/08/02/61081f8d3a20b.jpg" alt="Feature 1" class="card-image">
                <h2>Lemper</h2>
                <p>Makanan</p>
            </div>

            <div class="feature">
                <img src="https://cdn1-production-images-kly.akamaized.net/82cc8rHH_7bLW8YrmF6isj-06JI=/6x895:1499x1736/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3321110/original/093470500_1607655833-nagasari.jpg" alt="Feature 2" class="card-image">
                <h2>Nagasari</h2>
                <p>Makanan</p>
            </div>

            <div class="feature">
                <img src="https://www.masakapahariini.com/wp-content/uploads/2023/06/risoles-ragout.jpeg" alt="Feature 3" class="card-image">
                <h2>Risoles</h2>
                <p>Makanan</p>
            </div>

            <div class="feature">
                <img src="https://www.sasa.co.id/medias/page_medias/es_pisang_ijo1.jpg" alt="Feature 4" class="card-image">
                <h2>Es Pisang Hijau</h2>
                <p>Minuman</p>
            </div>

            <div class="feature">
                <img src="https://cdn1-production-images-kly.akamaized.net/PAb1JHsRyy12sebPGQX3EYjMwl8=/0x206:1999x1333/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3342476/original/024996800_1609993933-wedang_ronde.jpg" alt="Feature 5" class="card-image">
                <h2>Ronde</h2>
                <p>Minuman</p>
            </div>
        </div>
    </div>

    <footer style="background-color: #f8f8f8; padding: 40px 0; text-align: center; color: #555; font-size: 16px;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 1; margin-right: 30px;">
                    <h3 style="margin-bottom: 20px; color: #333; font-size: 22px;">Jajanan Pasar</h3>
                    <p style="line-height: 1.6;">Selamat datang di Jajanan Pasar, tempat di mana tradisi bertemu cita rasa. Temukan kelezatan unik pasar dalam setiap gigitan. Jelajahi ragam hidangan autentik kami yang penuh kenangan. Terima kasih telah memilih kami sebagai teman setia dalam menikmati jajanan pasar tak terlupakan.</p>
                </div>
                
                <div style="flex: 1; margin-right: 30px;">
                    <h3 style="margin-bottom: 20px; color: #333; font-size: 22px;">Tautan</h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column;">
                        <li style="margin-bottom: 15px;"><a href="barang.php" style="color: #555; text-decoration: none; font-weight: bold;">Barang</a></li>
                        <li style="margin-bottom: 15px;"><a href="penjualan.php" style="color: #555; text-decoration: none; font-weight: bold;">Penjualan</a></li>
                        <li style="margin-bottom: 15px;"><a href="pelanggan.php" style="color: #555; text-decoration: none; font-weight: bold;">Pelanggan</a></li>
                        <li style="margin-bottom: 15px;"><a href="profil.php" style="color: #555; text-decoration: none; font-weight: bold;">Profil</a></li>
                    </ul>
                </div>
                
                <div style="flex: 1;">
                    <h3 style="margin-bottom: 20px; color: #333; font-size: 22px;">Kontak Kami</h3>
                    <p style="margin-bottom: 15px;">Alamat: Jl Kopo, Kota Bandung, Indonesia</p>
                    <p style="margin-bottom: 15px;">Email: <a href="" style="color: #555; text-decoration: none; font-weight: bold;">Kuy698@gmail.com</a></p>
                    <p style="margin-bottom: 15px;">Telepon: 0812-3456-7891</p>
                    <br>
                </div>
            </div>
            <hr style="border-color: #ddd; margin: 40px 0;">
            
            <p style="margin-bottom: 0; color: #555; font-weight: bold;">© 2024 Jajanan Pasar. All rights reserved.</p>
        </div>
    </footer>





    </body>

    </html>
