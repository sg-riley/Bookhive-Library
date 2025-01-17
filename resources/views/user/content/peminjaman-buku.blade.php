@extends('user.layout.dashboard-user')

@section('title', 'Peminjaman Buku')

@section('content')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.85rem;
        }

        .content-container {
            padding: 20px;
            border-radius: 10px;
            transition: margin-left 0.3s ease;
        }

        .badge {
            display: inline-block;
            padding: 7px;
        }

        .form-select {
            margin-right: 10px;
            border-radius: 10px;
            font-size: 0.85rem;
        }

        .form-control {
            margin-left: 10px;
            border-radius: 10px;
            font-size: 0.85rem;
        }

        .book-cover {
            width: 50px;
        }

        .status-column {
            text-align: left;
        }

        .action-column {
            text-align: left;
        }

        .status-badge {
            display: inline-block;
            padding: 10px;
        }
    </style>

    {{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    {{-- ===== INI ANIMASI HEADER ===== --}}
    <div class="header-pages mt-3 mb-5"
        style="background: rgb(70, 72, 233);
        background: linear-gradient(90deg, rgb(70, 72, 233) 0%, rgb(171, 173, 255) 100%);">
        <span class="triangle" style="background: rgb(165, 166, 255);"></span>
        <h1 class="m-0 text-light">Peminjaman Buku</h1>
    </div>

    <div class="container-fluid">
        <div class="p-4 content-container sidebar-closed" id="content">
            <h2 class="mb-4">Data Peminjaman</h2>
            <div class="card p-3 bg-white text-dark">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center">Tanggal Peminjaman</th>
                                <th scope="col" class="text-center">Tanggal Pengembalian</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tabelRiwayat">
                            {{-- <tr>
                                <th scope="row">1</th>
                                <td>Don't Make Me Think</td>
                                <td>2023/09/17</td>
                                <td>2023/09/24</td>
                                <td><span class="badge bg-success">Diterima</span></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Don't Make Me Think</td>
                                <td>2023/09/17</td>
                                <td>2023/09/24</td>
                                <td><span class="badge bg-warning text-dark">Menunggu Konfirmasi</span></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Don't Make Me Think</td>
                                <td>2023/09/17</td>
                                <td>2023/09/24</td>
                                <td><span class="badge bg-info">Dikembalikan</span></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Don't Make Me Think</td>
                                <td>2023/09/17</td>
                                <td>2023/09/24</td>
                                <td><span class="badge bg-danger">Ditolak</span></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="mt-5 mb-4">Temukan Lebih Banyak Buku</h2>

            <div class="d-flex justify-content-start mb-3">
                <div>
                    <select class="form-select" aria-label="Kategori">
                        <option selected>Kategori</option>
                    </select>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Cari Buku">
                </div>
            </div>

            <div class="card p-3 bg-white text-dark">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col" style="min-width: 7rem;">Cover</th>
                                <th scope="col" style="min-width: 10rem;">Judul</th>
                                <th scope="col" style="min-width: 7rem;">Rating</th>
                                <th scope="col" style="min-width: 7rem;">Kategori</th>
                                <th scope="col" style="min-width: 7rem;">Status</th>
                                <th scope="col" style="min-width: 7rem;"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tabelBuku">
                            {{-- @for ($i = 1; $i <= 4; $i++)
                        <tr>
                            <td style="min-width: 7rem;">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/book0.jpg') }}" class="img-fluid me-3 book-cover" alt="Book Cover" >
                                </div>
                            </td>
                            <td style="min-width: 10rem;"><div>
                                <h6 class="mb-1">Don't Make Me Think</h6>
                                <small>Steve Krug, 2000</small>
                            </div></td>
                            <td style="min-width: 7rem;">4.5/5</td>
                            <td style="min-width: 7rem;">Pengembangan Diri</td>
                            <td class="status-column" style="min-width: 7rem;">
                                <span class="badge bg-success status-badge">Tersedia</span>
                            </td>
                            <td class="action-column" style="min-width: 7rem;">
                                <button class="btn btn-outline-primary btn-sm btn-pinjam" data-bs-toggle="modal" data-bs-target="#pinjamModal">Pinjam</button>
                            </td>
                        </tr>
                        @endfor --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinjamModalLabel">Pilih Tanggal Pengambilan Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pinjamForm">
                        <div class="mb-3">
                            <label for="tanggalPinjam" class="form-label">Tanggal Pengambilan</label>
                            <input type="date" class="form-control" id="tanggalPinjam" required>
                            <div class="invalid-feedback">Tidak bisa mengambil buku pada hari Sabtu atau Minggu.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Jarak Untuk Footer ===== --}}
    <div class="h-4" style="margin-bottom: 5rem;">
        <p class="text-light">.</p>
    </div>

    <script>
        $(document).ready(function() {
            loadDataRiwayatPeminjaman();

            function loadDataRiwayatPeminjaman() {
                $.ajax({
                    url: '/api/peminjaman' + '/' + JSON.parse(localStorage.getItem('user')).id_pengguna,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        $('#tabelRiwayat').empty();
                        $.each(response.data, function(index, peminjaman) {
                            let statusBadge = '';
                            switch (peminjaman.status_peminjaman) {
                                case "menunggu konfirmasi":
                                    statusBadge =
                                        '<span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>';
                                    break;
                                case "diterima":
                                    statusBadge =
                                        '<span class="badge bg-success">Diterima</span>';
                                    break;
                                case "dikembalikan":
                                    statusBadge =
                                        '<span class="badge bg-info">Dikembalikan</span>';
                                    break;
                                case "ditolak":
                                    statusBadge =
                                        '<span class="badge bg-danger">Ditolak</span>';
                                    break;
                            }
                            if (peminjaman.status_peminjaman != "dikembalikan") {
                                var row = `
                                <tr>
                                    <th scope="row">${index+1}</th>
                                <td class="text-center">${peminjaman.bahan_pustaka.judul}</td>
                                <td class="text-center">${peminjaman.tanggal_peminjaman}</td>
                                ${peminjaman.tanggal_pengembalian ? `<td class="text-center">${peminjaman.tanggal_pengembalian}</td>` : `<td class="text-center">-</td>`}
                                <td class="text-center">${statusBadge}</td>
                                </tr>`;
                                $('#tabelRiwayat').append(row);
                            }
                        })
                    }
                });
            }
            $.ajax({
                url: '/api/bahan-pustaka',
                type: 'GET',
                dataType: 'json',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                success: function(response) {
                    $('#tabelBuku').empty();
                    $.each(response.data, function(index, buku) {
                        const gambar = `${buku.gambar_sampul}`;
                        var row = `
                        <tr>
                            <td style="min-width: 7rem;">
                                <div class="d-flex align-items-center">
                                    <img src="storage/${buku.gambar_sampul}" class="img-fluid me-3 book-cover" alt="Book Cover">
                                </div>
                            </td>
                            <td style="min-width: 10rem;"><div>
                                <h6 class="mb-1">${buku.judul}</h6>
                                <small>${buku.penulis}, ${buku.tahun_terbit}</small>
                            </div></td>
                            <td style="min-width: 7rem;">5</td>
                            <td style="min-width: 7rem;">${buku.nama_kategori}</td>
                            ${buku.jumlah > 0 ? `<td class="status-column" style="min-width: 7rem;">
                                                <span class="badge bg-success status-badge">Tersedia</span>
                                            </td>
                                            <td class="action-column" style="min-width: 7rem;">
                                                <button class="btn btn-outline-primary btn-sm btn-pinjam" data-bs-toggle="modal" data-bs-target="#pinjamModal" data-id_bahan_pustaka="${buku.id_bahan_pustaka}">Pinjam</button>
                                            </td> 
                                            ` : `<td class="status-column" style="min-width: 7rem;">
                                                <span class="badge bg-secondary status-badge">Tidak Tersedia</span>
                                            </td> 
                                            <td class="action-column" style="min-width: 7rem;">
                                                <button class="btn btn-outline-secondary disabled btn-sm btn-pinjam" data-bs-toggle="modal" data-bs-target="#pinjamModal">Pinjam</button>
                                            </td> 
                                            `}
                            
                        </tr>
                        `;
                        $('#tabelBuku').append(row);
                    })
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responJson);
                    console.log(xhr.responJson.message);
                }
            });
            $('#pinjamModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var bukuId = button.data('id_bahan_pustaka');
                $('#pinjamForm').attr('data-id_bahan_pustaka', bukuId);
            });

            $('#pinjamForm').on('submit', function(event) {
                event.preventDefault();
                const tanggalPinjam = new Date(document.getElementById('tanggalPinjam').value);
                const hari = tanggalPinjam.getDay();

                if (hari === 0 || hari === 6) {
                    document.getElementById('tanggalPinjam').classList.add('is-invalid');
                    return;
                }
                $.ajax({
                    url: '/api/peminjaman',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    data: JSON.stringify({
                        id_pengguna: JSON.parse(localStorage.getItem('user')).id_pengguna,
                        id_bahan_pustaka: $('#pinjamForm').attr('data-id_bahan_pustaka'),
                        tanggal_peminjaman: $('#tanggalPinjam').val()
                    }),
                    success: function(response) {
                        loadDataRiwayatPeminjaman();
                        alert('Buku berhasil dipinjam!');
                        $('#pinjamModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat meminjam buku.' + xhr.responseJSON
                            .message);
                        console.log(xhr.responseJSON);
                    }
                })
            });
        });
    </script>
@endsection
