@extends('user.layout.dashboard-user')

@section('title', 'Profile')

@section('content')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .container {
            margin-top: 70px;
        }

        .card {
            background-color: #fff;
            border: none;
            width: 400px; 
            border-radius: 15px;
        }

        .profile-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background-color: #007bff;
            color: white;
            font-size: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .profile-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-left: 20px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            font-size: 0.9rem;
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .form-control[readonly] {
            background-color: #f9f9f9;
            color: #999;
        }

        .card {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>

    {{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="card shadow p-4">
            <div class="profile-section">
                <div class="profile-icon">
                    <i class="bx bx-user"></i>
                </div>
                <div class="profile-title">
                    Profil Pengguna
                </div>
            </div>
            
            <form>
                <div class="mb-3">
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" value="" readonly>
                </div>
                <div class="mb-3">
                    <label for="userId" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="userId" value="" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="" readonly>
                </div>
                <div class="mb-3">
                    <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomorTelepon" value="" readonly>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== INI UNTUK DORONG FOOTER KE BAWAH ===== --}}
    <div class="h-4" style="margin-bottom: 2.7rem;">
        <p class="text-light">.</p>
    </div>

    <script>

        //LOAD DATA DARI API KE FRONTEND
        document.addEventListener('DOMContentLoaded', () => {
            const userData = JSON.parse(localStorage.getItem('user'));
            //console.log(userData);

            document.getElementById('namaLengkap').value = userData.nama_lengkap;
            document.getElementById('userId').value = userData.id_pengguna;
            document.getElementById('email').value = userData.email;
            document.getElementById('nomorTelepon').value = userData.nomor_telepon;

        });
    </script>
@endsection
