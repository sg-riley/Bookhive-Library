<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="icon" href="{{asset('images/BOOKHIVE_LOGOONLY.png')}}">
    
    <title>BookHive | Register</title>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .background-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: #407bff;
            z-index: 0;
        }

        .signup-container {
            display: flex;
            width: 1000px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .left-panel {
            width: 50%;
            background-color: #407bff;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .left-panel img {
            display: block;
            margin: 0 auto;
            width: 250px;
            max-width: 100%;
            height: auto;
        }

        .left-panel h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .left-panel p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .left-panel button {
            padding: 15px;
            background-color: #407bff;
            color: white;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            margin-top: 20px;
        }

        .left-panel button:hover {
            background-color: #f0f0f0;
        }

        .right-panel {
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-panel img {
            align-self: flex-end;
            max-width: 40%;
        }

        .right-panel h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .right-panel form {
            display: flex;
            flex-direction: column;
        }

        .right-panel form input {
            padding: 15px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .right-panel form button {
            padding: 15px;
            background-color: #407bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
        }

        .right-panel form button:hover {
            background-color: #3561d8;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }
    </style>

    <script>
        function validateForm() {
            var nik = document.getElementById("nik").value;
            var fullName = document.getElementById("fullName").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var password = document.getElementById("password").value;

            if (nik === "") {
                alert("NIK tidak boleh kosong");
                return false;
            }

            if (fullName === "") {
                alert("Nama Lengkap tidak boleh kosong");
                return false;
            }

            if (email === "") {
                alert("Email tidak boleh kosong");
                return false;
            }

            if (phone === "") {
                alert("Nomor Telepon tidak boleh kosong");
                return false;
            }

            if (password === "") {
                alert("Password tidak boleh kosong");
                return false;
            }

            return true;
        }
    </script>

</head>
<body>

    <div class="background-top"></div>

    <div class="signup-container">
        <div class="left-panel">
            <form action="{{url('login-page')}}">
                <h2>Daftar Sekarang!</h2>
                <p style="margin-bottom: 100px;">Buat akun sekarang dan nikmati fiturnya.</p>
                <img src="images/library_illustration.png" class= "my-5" alt="BookHive Illustration">
                <button class="mt-5">Masuk</button>
                <p style="font-size: 12px;">Data dan privasi anda terjaga di BookHive. Anda dapat melihat kebijakan privasi kami disini</p>
            </form>
        </div>
        <div class="right-panel">
            <img src="images/BOOKHIVE_HORIZONTAL.png" alt="">
            <h1>Masukkan data diri Anda</h1>
            <form id="register-form" onsubmit="return registerUser(event)">
                <strong>Nama Lengkap</strong>
                <input type="text" id="fullName" placeholder="Masukkan Nama Lengkap">
                <strong>Email</strong>
                <input type="email" id="email" placeholder="Masukkan Email">
                <strong>Nomor Telepon</strong>
                <input type="tel" id="phone" placeholder="Masukkan Nomor Telepon">
                <strong>Password</strong>
                <input type="password" id="password" placeholder="Masukkan Password">
                <button type="submit">Daftar</button>
            </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

        //HANDLER REGISTER
        async function registerUser(event) {
        //event.preventDefault();

        const fullName = document.getElementById("fullName").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;
        const password = document.getElementById("password").value;

        if (!fullName && !email && !phone && !password) {
            alert("Semua data wajib diisi!");
            return;
        }
        if (!fullName ) {
            alert("Nama lengkap wajib diisi!");
            return;
        }
        if (!email ) {
            alert("Email wajib diisi!");
            return;
        }
        if (!phone ) {
            alert("Nomor telepon wajib diisi!");
            return;
        }
        if ( !password) {
            alert("Password wajib diisi!");
            return;
        }


        try {
            const response = await fetch('/api/register', { 
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    nama_lengkap: fullName,
                    email: email,
                    nomor_telepon: phone,
                    password: password,
                }),
            });

            const data = await response.json();

            if (response.ok) {
                alert("Registrasi berhasil!");
                console.log("Response Data:", data);
               
                window.location.href = "/login-page";
            } else {
                alert("Registrasi gagal: " + (data.message || "Periksa kembali data Anda."));
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Terjadi kesalahan pada server.");
        }
    }


    </script>
</body>
</html>