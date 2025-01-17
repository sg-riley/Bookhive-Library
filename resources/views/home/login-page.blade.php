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
    <title>BookHive | Login</title>

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

        .login-container {
            display: flex;
            flex-wrap: wrap;
            width: 900px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .left-panel {
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #f5f7ff;
        }

        .left-panel img {
            width: 150px;
            margin-bottom: 20px;
        }

        .right-panel {
            width: 50%;
            background-color: #407bff;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .right-panel button {
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

        h1 {
            margin-bottom: 1px;
            font-weight: 600;
        }

        h2 {
            margin-top: -10px;
            font-size: 1rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #407bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        button:hover {
            background-color: #3561d8;
        }

        .right-panel img {
            max-width: 100%;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
            text-align: center;
        }

        .forgot-password a {
            color: #407bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .signup {
            margin-top: 20px;
        }

        .signup a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .signup a:hover {
            text-decoration: underline;
        }

        p {
            font-weight: 400;
            font-size: 14px;
        }
    </style>

</head>
<body>
    <div class="background-top"></div>

    <div class="login-container">
        <div class="left-panel">
            <img src="images/BOOKHIVE_HORIZONTAL.png" alt="">
            <h1>Login</h1>
            <p style="margin-bottom: 25px;">Masukkan Email dan Password</p>
            <form onsubmit="return handleLogin(event)">
                <h2>Email</h2>
                <input type="email" id="userId" placeholder="Masukkan Email">
                <h2>Password</h2>
                <input type="password" id="password" placeholder="Masukkan Password">
                <button type="submit">Masuk</button>
                <div class="forgot-password">
                    <a href="#">Lupa Password?</a>
                </div>
            </form>
            
            <p style="font-size: 12px; text-align: center;">Data dan privasi anda terjaga di BookHive. Anda dapat melihat kebijakan privasi kami disini.</p>
        </div>
        <div class="right-panel">
            <form action="{{url('register-page')}}">
                <h2 style="font-size: 2rem; text-align: center;">Selamat Datang!</h2>
                <p style="text-align: center; margin-top: -10px;">Masuk dengan akun anda untuk memulai!</p>
                <img src="images/library_illustration.png" alt="BookHive Illustration">
                <p style="text-align: center;">Belum punya akun? Daftar sekarang</p>
                <button>Daftar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    {{-- ===== UNTUK HANDLE LOGIN===== --}}
    <script>
        async function handleLogin(event) {
            event.preventDefault(); 
            const userId = document.getElementById("userId").value;
            const password = document.getElementById("password").value;
    
            if (userId === "" && password === "") {
                alert("Email dan Password tidak boleh kosong");
                return;
            }

            if (userId === "") {
                alert("Email tidak boleh kosong");
                return;
            }

            if (password === "") {
                alert("Password tidak boleh kosong");
                return;
            }
    
            try {
                const response = await fetch("{{ url('/api/login') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        email: userId,
                        password: password,
                    }),
                });
    
                const data = await response.json();
    
                if (response.ok) {
                    
                    localStorage.setItem("token", data.access_token);
                    //console.log("Token:", localStorage.getItem('token'));
                    localStorage.setItem("user", JSON.stringify(data.user));
                    alert("Login berhasil!");

                    
                    
                    // direct sesuai role
                    if (data.user.role === "admin") {
                        window.location.href = "{{ url('admin-page') }}";
                    } else if (data.user.role === "pengguna") {
                        window.location.href = "{{ url('dashboard-user') }}";
                    }

                } else {
                    alert(data.message || "Login gagal, periksa kredensial Anda");
                }
            } catch (error) {
                console.error("Terjadi kesalahan:", error);
                alert("Terjadi kesalahan pada sistem, coba lagi nanti");
            }
        }
    </script>
    
</body>
</html>
