<?php session_start();
if (isset($_POST['submit'])) {
    require_once "../database/koneksi.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tabel_user WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $result->fetch_assoc();
        echo "<script>" .
            "window.location.href='../index.php';" .
            "</script>";
    } else
        echo "<script>" .
            "alert('Username atau Password salah')" .
            "</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu BPS</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        background: #ecf0f3
    }

    .wrapper {
        max-width: 350px;
        min-height: 500px;
        margin: 80px auto;
        padding: 40px 30px 30px 30px;
        background-color: #ecf0f3;
        border-radius: 15px;
        /* box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff */
    }

    .logo {
        width: 80px;
        margin: auto
    }

    .logo img {
        width: 100%;
        height: 80px;
        object-fit: scale-down;
        border-radius: 50%;
        box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
    }

    .wrapper .name {
        font-weight: 600;
        font-size: 1.4rem;
        letter-spacing: 1.3px;
        padding-left: 10px;
        color: #555
    }

    .wrapper .form-field input {
        width: 100%;
        display: block;
        border: none;
        outline: none;
        background: none;
        font-size: 1.2rem;
        color: #666;
        padding: 10px 15px 10px 10px
    }

    .wrapper .form-field {
        padding-left: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
    }

    .wrapper .form-field .fas {
        color: #555
    }

    .wrapper .btn {
        box-shadow: none;
        width: 100%;
        height: 40px;
        background-color: #03A9F4;
        color: #fff;
        border-radius: 25px;
        box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
        letter-spacing: 1.3px
    }

    .wrapper .btn:hover {
        background-color: #039BE5
    }

    .wrapper a {
        text-decoration: none;
        font-size: 0.8rem;
        color: #03A9F4
    }

    .wrapper a:hover {
        color: #039BE5
    }

    @media(max-width: 380px) {
        .wrapper {
            margin: 30px 20px;
            padding: 40px 15px 15px 15px
        }
    }

    body {
        background-image: url('../assets/images/auth/bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 88.9vh;
    }
</style>

<body>
    <div class="wrapper">
        <div class="logo"> <img src="../logo.png" alt=""> </div>
        <div class="text-center mt-4 name" style="text-align: center; margin-top: 16px;"> BPS HSU </div>
        <form method="POST" class="p-3 mt-3" style="margin-top: 10px;">
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input autocomplete="off" autofocus type="text" name="username" id="username" placeholder="Username"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="password" placeholder="Password"> </div> <button type="submit" name="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6" style="text-align: center; margin-top: 8px;"> <a href="halaman_lupa_password.php">Lupa password?</a></div>
    </div>

</body>

</html>