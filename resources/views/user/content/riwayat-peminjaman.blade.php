@extends('user.layout.dashboard-user')
@section('title', 'Riwayat Peminjaman Buku')

@php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $tanggal_sekarang = strftime('%A, %d %B %Y');
@endphp

@section('content')

    {{-- ===== INI UNTUK DORONG KONTEN KE BAWAH ===== --}}
    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    {{-- ===== INI ANIMASI HEADER ===== --}}
    <div class="header-pages mt-3 mb-5"
        style="background: rgb(70, 72, 233);
        background: linear-gradient(90deg, rgb(70, 72, 233) 0%, rgb(171, 173, 255) 100%);">
        <span class="triangle" style="background: rgb(165, 166, 255);"></span>
        <h1 class="m-0 text-light">Riwayat Peminjaman</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Daftar Riwayat Peminjaman Buku</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="peminjaman-buku" class="table table-hover" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col" style="text-align: left;">Tanggal Peminjaman</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Ulasan</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Peminjaman Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <p class="my-1">ID Peminjaman</p>
                                <p class="my-1">Judul Buku</p>
                                <p class="my-1">Kategori</p>
                                <p class="my-1">Tanggal Peminjaman</p>
                                <p class="my-1">Tanggal Pengembalian</p>
                                <p class="my-1">Denda</p>
                            </div>
                            <div class="col-1">
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                                <p class="my-1">:</p>
                            </div>
                            <div class="col-5">
                                <p class="my-1" id="modalId"></p>
                                <p class="my-1" id="modalJudul"></p>
                                <p class="my-1" id="modalKategori"></p>
                                <p class="my-1" id="modalTanggalPeminjaman"></p>
                                <p class="my-1" id="modalTanggalPengembalian"></p>
                                <p class="my-1" id="modalDenda"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUlasan" tabindex="-1" aria-labelledby="modalUlasanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalUlasanLabel">Ulasan Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUlasan">
                        <input type="hidden" id="idPeminjamanModal" name="idPeminjamanModal">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (1-5)</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                            <div class="invalid-feedback">
                                Silakan masukkan rating antara 1 dan 5.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan</label>
                            <textarea class="form-control" id="ulasan" name="ulasan" rows="3" maxlength="250" required></textarea>
                            <div class="invalid-feedback">
                                Ulasan maksimal 250 karakter.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="simpanUlasan">Simpan Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    {{-- ===== INI UNTUK DORONG FOOTER KE BAWAH ===== --}}

    <div class="h-4" style="margin-bottom: 5rem;">
        <p class="text-light">.</p>
    </div>

    {{-- ===== DATATABLE===== --}}
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    {{-- <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js">
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#peminjaman-buku').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 10,
                dom: 'frtip',

                language: {
                    searchPlaceholder: "Cari Riwayat Peminjaman",
                }
            });

            loadRiwayatPeminjaman();

            function loadRiwayatPeminjaman() {
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
                        table.clear();
                        let i = 0;
                        $.each(response.data, function(index, data) {
                            if (data.status_peminjaman == 'dikembalikan') {
                                var row = `
                                    <tr>
                                        <th scope="row" class="align-middle pe-4">${i+=1}</th>
                                        <td class="align-middle">${data.id_bahan_pustaka}</td>
                                        <td class="align-middle">${data.bahan_pustaka.judul}</td>
                                        <td class="align-middle text-start">${data.tanggal_peminjaman}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm m-1" onclick="showModalDetail('${data.id_bahan_pustaka}', '${data.bahan_pustaka.judul}', '${data.bahan_pustaka.kategori.nama_kategori}', '${data.tanggal_peminjaman}', '${data.tanggal_pengembalian}', '${data.denda ? data.denda.jumlah_denda : '-'}')">Lihat detail</button>
                                        </td>
                                        ${data.ulasan == null ? `<td>
                                            <button type="button" class="btn btn-outline-success btn-sm m-1" onclick="showModalReview('${data.id_peminjaman}') ">Ulasan</button>
                                        </td>` : `<td>
                                            <button type="button" class="btn btn-outline-success btn-sm m-1" onclick="showModalReviewed('${data.nilai}', '${data.ulasan}') " >Ulasan</button>
                                        </td>`}
                                    </tr>
                                `;
                                table.row.add($(row)).draw();
                            }
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseJSON);
                    }
                });
            }
        });

        function showModalDetail(id, judul, kategori, tanggal_peminjaman, tanggal_pengembalian, denda) {
            document.getElementById('modalId').textContent = id;
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalKategori').textContent = kategori;
            document.getElementById('modalTanggalPeminjaman').textContent = tanggal_peminjaman;
            document.getElementById('modalTanggalPengembalian').textContent = tanggal_pengembalian;
            document.getElementById('modalDenda').textContent = denda ? denda : '-';
            $('#modalDetail').modal('show');
        }

        function showModalReview(id){
            document.getElementById('idPeminjamanModal').value = id;
            $('#modalUlasan').modal('show');
        }

        function showModalReviewed(rating, ulasan){
            document.getElementById('rating').value = rating;
            document.getElementById('ulasan').value = ulasan;
            document.getElementById('rating').disabled = true;
            document.getElementById('ulasan').disabled = true; 
            document.getElementById('simpanUlasan').disabled = true;

            $('#modalUlasan').modal('show');
        }

        $(document).ready(function() {
            $('#formUlasan').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/api/review-peminjaman' + '/' + $('#idPeminjamanModal').val(),
                    type: 'POST',
                    data: JSON.stringify({
                        rating: $('#rating').val(),
                        ulasan: $('#ulasan').val()
                    }),
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        loadRiwayatPeminjaman();
                        alert('Ulasan berhasil dikirim');
                        $('#modalUlasan').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseJSON);
                    }
                });
            })   
        })
    </script>

@endsection

<style>
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .dt-container .dt-buttons .dt-button {
        all: unset;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 4px 10px;
        margin: 4px;
        transition: border-color 0.3s;
    }

    .dt-container .dt-buttons .dt-button:hover {
        all: unset;
        background: #fff;
        border: 1px solid #5392FB;
        border-radius: 5px;
        padding: 4px 10px;
        margin: 4px;
        color: #5392FB;
    }

    .dt-container .dt-search {
        display: flex;
        justify-content: flex-end;
        margin: 4px;
        margin-bottom: 1rem;
    }

    label {
        padding: 4px;
        margin-right: 2px;
    }

    .dt-search .form-control {
        max-width: 15rem;
    }

    .modal-body .form-control {
        width: 100%;
    }

    .form-modal {
        width: 100%;
    }

    .dt-info {
        text-align: end;
        margin: 4px;
        margin-top: 2rem;
    }

    .dt-paging .pagination {
        justify-content: flex-end;
        margin-bottom: 0;
    }

    .dt-container .dt-paging .dt-paging-button {
        padding: 0 !important;
    }
</style>
