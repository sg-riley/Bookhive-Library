@extends('user.layout.dashboard-user')

@section('title', 'Pengusulan Buku')



@section('content')

  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .container {
      /* width: 1500px; */
      margin: 0 auto;
      margin-top: 50px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
    }
    .form-group {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      width: 200px;
    }
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
      box-sizing: border-box;
    }
    .image-card {
      width: 300px; 
      height: 400px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-right: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f9f9f9;
    }
    .image-card img {
      max-width: 100%;
      max-height: 100%;
    }
    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>

  {{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
  <div class="h-5 m-4">
    <p class="text-light">.</p>
  </div>

  {{-- ===== INI ANIMASI HEADER ===== --}}
  <div class="header-pages mt-3 mb-5" 
  style="background: rgb(237, 188, 72);
      background: linear-gradient(90deg, rgb(255, 199, 68) 0%, rgb(255, 230, 172) 100%);">
      <span class="triangle" style="background: rgb(255, 231, 174);"></span>
      <h1 class="m-0 text-light">Pengusulan Buku</h1>
  </div>

  <div class="container">

    <div class="card p-3">
            <h2 class="mb-5">Form Pengusulan Buku</h2>
            <form id="form-usulkan-buku">
                <div class="form-group d-block">
                    <label for="judul">Judul Buku</label>
                    <input type="text" id="judul" required>
                </div>

                <div class="form-group d-block">
                    <label for="pengarang">Penulis</label>
                    <input type="text" id="penulis" required>
                </div>

                <div class="form-group d-block">
                    <label for="tahun-terbit">Tahun Terbit</label>
                    <input type="number" id="tahun-terbit" required>
                </div>

                <div class="form-group d-block">
                    <label for="pengarang">Kategori</label>
                    <input type="text" id="kategori" required>
                </div>

                <div class="form-group d-block">
                    <label for="deskripsi">Alasan</label>
                    <textarea id="alasan"></textarea>
                </div>

                <button id="simpan " type="submit"> Usulkan Buku</button>
            </form>

    </div>
  </div>

  {{-- ===== INI UNTUK DORONG FOOTER KE BAWAH ===== --}}
  <div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
  </div>

  <script>
    document.getElementById('form-usulkan-buku').addEventListener('submit', function(event) {
      event.preventDefault();
      user = JSON.parse(localStorage.getItem('user'));

      const id_pengguna = user.id_pengguna;
      const judul = document.getElementById('judul').value;
      const penulis = document.getElementById('penulis').value;
      const kategori = document.getElementById('kategori').value;
      const tahun_terbit = document.getElementById('tahun-terbit').value;
      const alasan = document.getElementById('alasan').value;

      const formData = new FormData();
      formData.append('id_pengguna', id_pengguna);
      formData.append('judul', judul);
      formData.append('penulis', penulis);
      formData.append('kategori', kategori);
      formData.append('tahun_terbit', tahun_terbit);
      formData.append('alasan', alasan);

      fetch('/api/rekomendasi', {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('token')}`
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.errors) {
          alert('Terjadi kesalahan: ' + JSON.stringify(data.errors));
        } else {
          alert('Usulan buku berhasil dikirim');
          location.reload();

        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengirim usulan.');
      });
    });
  </script>

  <script>
    function previewImage(event) {
      const image = document.getElementById('cover-image');
      const noImage = document.getElementById('no-image');
      image.src = URL.createObjectURL(event.target.files[0]);
      image.style.display = 'block';
      noImage.style.display = 'none';
    }

    document.getElementById('simpan').addEventListener('click', function() {
    const statusPengajuan = document.getElementById('status-pengusulan');
    statusPengajuan.textContent = 'Tersimpan';
    statusPengajuan.style.color = 'green';
    });
  </script>

@endsection