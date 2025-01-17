@extends('admin.layout.dasboard-layout')
@section('title', 'Ajuan Donasi Buku')

@section('content')

<div class="h-5 m-4">
    <p class="text-light">.</p>
</div>

<div class="header-pages mt-3 mb-5" 
style="background: rgb(237, 188, 72);
    background: linear-gradient(90deg, rgb(255, 199, 68) 0%, rgb(255, 230, 172) 100%);">
    <span class="triangle" style="background: rgb(255, 231, 174);"></span>
    <h1 class="m-0 text-light">Ajuan Donasi Buku</h1>
</div>

<div class="row justify-content-between m-4">
    <h4>Ajuan Donasi Buku</h4>
    <div class="col">
        <div class="card">
            <div class="table-responsive p-3">
                <table id='ajuan-donasi' class="table table-hover p-4">
                    <thead class="card-header">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Donasi</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-between m-4">
    <h4>Riwayat Donasi Buku</h4>
    <div class="col">
        <div class="card">
            <div class="table-responsive p-3">
                <table id='riwayat-donasi' class="table table-hover p-4">
                    <thead class="card-header">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Donasi</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
              
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
</div>

{{-- ===== MODAL DETAIL DONASI ===== --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Ajuan Donasi Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container text-center mb-3">
                    <img id="modalGambar" src="" class="img-fluid" style="max-width: 50%; height: auto;">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <p class="my-1">ID Donasi</p>
                            <p class="my-1">Nama Donatur</p>
                            <p class="my-1">Judul Buku</p>
                            <p class="my-1">Kategori</p>
                            <p class="my-1">ISBN</p>
                            <p class="my-1">Tahun Terbit</p>
                            <p class="my-1">Penulis</p>
                            <p class="my-1">Penerbit</p>
                            <p class="my-1">Jumlah</p>
                            <p class="my-1">Deskripsi Buku</p>
                        </div>
                        <div class="col-1">
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                        </div>
                        <div class="col-7">
                            <p class="my-1" id="modalDonasi"></p>
                            <p class="my-1" id="modalNama"></p>
                            <p class="my-1" id="modalJudul"></p>
                            <p class="my-1" id="modalKategori"></p>
                            <p class="my-1" id="modalIsbn"></p>
                            <p class="my-1" id="modalTahunTerbit"></p>
                            <p class="my-1" id="modalPenulis"></p>
                            <p class="my-1" id="modalPenerbit"></p>
                            <p class="my-1" id="modalJumlah"></p>
                            <p class="my-1" id="modalDeskripsi"></p>
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

{{-- ===== MODAL DETAIL RIWAYAT DONASI ===== --}}
                 
<div class="modal fade" id="modalRiwayat" tabindex="-1" aria-labelledby="modalRiwayatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalRiwayatLabel">Detail Riwayat Donasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <p class="my-1">ID Donasi</p>
                            <p class="my-1">Status</p>
                            <p class="my-1">Nama Donatur</p>
                            <p class="my-1">Judul Buku</p>
                            <p class="my-1">Kategori</p>
                            <p class="my-1">ISBN</p>
                            <p class="my-1">Tahun Terbit</p>
                            <p class="my-1">Penulis</p>
                            <p class="my-1">Penerbit</p>
                            <p class="my-1">Jumlah</p>
                            <p class="my-1">Deskripsi Buku</p>
                        </div>
                        <div class="col-1">
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                            <p class="my-1">:</p>
                        </div>
                        <div class="col-7">
                            <p class="my-1" id="modalDonasi"></p>
                            <p class="my-1" id="modalStatus"></p>
                            <p class="my-1" id="modalNama"></p>
                            <p class="my-1" id="modalJudul"></p>
                            <p class="my-1" id="modalKategori"></p>
                            <p class="my-1" id="modalIsbn"></p>
                            <p class="my-1" id="modalTahunTerbit"></p>
                            <p class="my-1" id="modalPenulis"></p>
                            <p class="my-1" id="modalPenerbit"></p>
                            <p class="my-1" id="modalJumlah"></p>
                            <p class="my-1" id="modalDeskripsi"></p>
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



<script>

    // Tabel 1

    $(document).ready(function() {
            const headers = {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            };

            fetch('/api/donasi', {
                method: 'GET',
                headers: headers
            })
            .then(response => response.json())
            .then(data => {
                const donasiList = data.data.filter(item => item.status_pengajuan === null);
                console.log(donasiList);
    
                $('#ajuan-donasi').DataTable({
                    data: donasiList,
                    columns: [
                        { 
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1 
                        },
                        { data: 'id_donasi' },
                        { data: 'nama_pengguna' },
                        { data: 'judul' },
                        { data: 'kategori' },
                        { 
                            data: null,
                            render: (data) => `
                                <button class="btn btn-outline-primary btn-sm" onclick="showDetail('${data.id_donasi}', '${data.nama_pengguna}', '${data.judul}','${data.kategori}', '${data.isbn}', '${data.tahun_terbit}', '${data.penulis}', '${data.penerbit}', '${data.jumlah}', '${data.deskripsi}', '${data.gambar_sampul}')">Detail</button>
                            `
                        },
                        { 
                            data: null,
                            render: (data) => `
                                <button class="btn btn-primary btn-sm" onclick="updateStatusDonasi('${data.id_donasi}', 1, '${encodeURIComponent(JSON.stringify(data))}')">Terima</button>
                                <button class="btn btn-danger btn-sm" onclick="updateStatusDonasi('${data.id_donasi}', 0, '${encodeURIComponent(JSON.stringify(data))}')">Tolak</button>
                            `
                        }
                    ],
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language: {
                        searchPlaceholder: "Cari Donasi",
                        zeroRecords: "Data donasi tidak tersedia."
                    }
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Gagal memuat data donasi.");
            });
        });

        function showDetail(id, nama, judul, kategori, isbn, tahun_terbit, penulis, penerbit, jumlah, deskripsi, gambar) {
            document.getElementById('modalGambar').src = '/storage/' + gambar;
            document.getElementById('modalDonasi').textContent = id;
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalJudul').textContent = judul;
            document.getElementById('modalKategori').textContent = kategori;
            document.getElementById('modalIsbn').textContent = isbn;
            document.getElementById('modalTahunTerbit').textContent = tahun_terbit;
            document.getElementById('modalPenulis').textContent = penulis;
            document.getElementById('modalPenerbit').textContent = penerbit;
            document.getElementById('modalJumlah').textContent = jumlah;
            document.getElementById('modalDeskripsi').textContent = deskripsi;
            $('#modalDetail').modal('show');
        }

        function updateStatusDonasi(id, status, donasi) {
            const donasiData = JSON.parse(decodeURIComponent(donasi));
            //donasiData = JSON.parse(donasi);
            console.log(donasiData);
            if (!confirm(`Apakah Anda yakin ingin ${status === 1 ? 'menerima' : 'menolak'} donasi ini?`)) return;

            fetch(`/api/donasi/${id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    status_pengajuan: status
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal memperbarui status donasi.');
                }
                return response.json();
            })
            .then(data => {

                const kategoriD = donasiData.id_kategori;
                const judulD = donasiData.judul;
                const isbnD = donasiData.isbn;
                const tahunTerbitD = donasiData.tahun_terbit;
                const penulisD = donasiData.penulis;
                const penerbitD = donasiData.penerbit;
                const jumlahD = donasiData.jumlah;
                const deskripsiD = donasiData.deskripsi;
                const gambarSampulD = donasiData.gambar_sampul;
                console.log(donasiData);

                const formDonate = new FormData();
                formDonate.append('id_kategori', kategoriD);
                formDonate.append('judul', judulD);
                formDonate.append('isbn', isbnD);
                formDonate.append('tahun_terbit', tahunTerbitD);
                formDonate.append('penulis', penulisD);
                formDonate.append('penerbit', penerbitD);
                formDonate.append('deskripsi', deskripsiD);
                formDonate.append('jumlah', jumlahD);
                if (gambarSampulD) {
                    formDonate.append('gambar_sampul', gambarSampulD);
                }

                fetch('/api/store-donasi', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Accept': 'application/json'
                    },
                    body: formDonate
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            console.error('Server Error:', err);
                            throw new Error(err.message || 'Gagal menambah bahan pustaka.');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    alert(`Donasi ${status === 1 ? 'diterima' : 'ditolak'} dengan sukses.`);
                    location.reload();  
                    
                })
                .catch(error => {
                    alert('Terjadi kesalahan saat menambah buku.');
                    console.error('Error adding book:', error);
                });
 
            })
            .catch(error => {
                console.error("Error updating status:", error);
                alert("Terjadi kesalahan saat memperbarui status donasi.");
            });
        }



        //tabel 2
        $(document).ready(function() {
            const headers = {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            };

            fetch('/api/donasi', {
                method: 'GET',
                headers: headers
            })
            .then(response => response.json())
            .then(data => {
                const donasiList = data.data.filter(item => item.status_pengajuan !== null);
                console.log(donasiList);
    
                $('#riwayat-donasi').DataTable({
                    data: donasiList,
                    columns: [
                        { 
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1 
                        },
                        { data: 'id_donasi' },
                        { data: 'nama_pengguna' },
                        { data: 'judul' },
                        { data: 'kategori' },
                        {
                            data: 'status_pengajuan',
                            render: (data) => {
                                return data == 1 ? 'Diterima' : (data == 0 ? 'Ditolak' : 'Status Tidak Diketahui');
                            }
                        },
                        { 
                            data: null,
                            render: (data) => `
                                <button class="btn btn-outline-primary btn-sm" onclick="showDetail('${data.id_donasi}', '${data.nama_pengguna}', '${data.judul}','${data.kategori}', '${data.isbn}', '${data.tahun_terbit}', '${data.penulis}', '${data.penerbit}', '${data.jumlah}', '${data.deskripsi}', '${data.gambar_sampul}')">Detail</button>
                            `
                        },
                        
                    ],
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language: {
                        searchPlaceholder: "Cari Donasi",
                        zeroRecords: "Data donasi tidak tersedia."
                    }
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Gagal memuat data donasi.");
            });
        });

</script>

@endsection

<style>
    .table-responsive {
        overflow-x: auto; 
        -webkit-overflow-scrolling: touch; 
    }

    .dt-container .dt-buttons .dt-button{
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

    .dt-container .dt-search{
        display: flex;
        justify-content: flex-end;
        margin: 4px;
        margin-bottom: 1rem;
    }

    label{  
    padding: 4px;
    margin-right: 2px;
    }
    .form-control{
        max-width: 15rem;
    }

    .dt-info{
        text-align: end;
        margin: 4px;
        margin-top: 2rem;
    }

    .dt-paging .pagination{
        justify-content: flex-end;
        margin-bottom: 0;
    }
    .dt-container .dt-paging .dt-paging-button{
        padding:0 !important;
    }

</style>
