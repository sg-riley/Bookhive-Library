@extends('admin.layout.dasboard-layout')
@section('title', 'Daftar Ruangan')

@section('content')

    <div class="h-5 m-4">
        <p class="text-light">.</p>
    </div>

    <div class="header-pages mt-3 mb-5"
        style="background: rgb(88, 213, 42);
            background: linear-gradient(90deg, rgb(88, 213, 42) 0%, rgb(201, 255, 182) 100%);">
        <span class="triangle" style="background: rgb(185, 255, 160);"></span>
        <h1 class="m-0 text-light">Kelola Data Ruangan</h1>
    </div>

    <div class="row justify-content-between m-4">
        <h4>Daftar Lengkap Ruangan Perpustakaan</h4>
        <div class="col">
            <div class="card">
                <div class="table-responsive p-3">
                    <table id="ruangan-table" class="table table-hover mb-5" data-pagination="true" data-page-size="10">
                        <thead class="card-header">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Ruangan</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="ruangan-tbody" class="table-group-divider">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   
        <div class="mb-4 text-light">.</div>
    </div>

    <div class="row justify-content-between m-4">
        <div class="col">
            <div class="card p-0">
                <div class="card-header">
                    <h2>Form Tambah Ruangan</h2>
                </div>
                <form enctype="multipart/form-data" id="form-tambah-ruangan">
                    <div class="d-flex">
                        <div class="col p-4">
                            <div class="my-2">
                                <div class="form-group" style="min-width: 10rem;">
                                    <label for="nama_ruangan">Nama Ruangan</label>
                                    <input type="text" id="nama_ruangan" class="form-control" required>
                                </div>

                                
                            </div>
                            
                            <div class=" my-2">
                                <div class="form-group" style="min-width: 10rem;">
                                    <label for="deskripsi_ruangan">Deskripsi</label>
                                    <textarea id="deskripsi_ruangan" class="form-control"style="min-height: 8rem;" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col p-4">
                        
                            <div class="col-6 my-2" style="min-width: 15rem;">
                                <div class="form-group my-2" >
                                    <label for="gambar_ruangan">Gambar Ruangan</label>
                                    <input type="file" id="gambar_ruangan" class="form-control" onchange="previewImage(event)">
                                </div>
                                <div class="image-card my-2" id="image-card" style="min-width: 10rem; min-height: 10rem; border: 1px solid #ddd; border-radius: 5px; display: flex; justify-content: center; align-items: center; background-color: #f9f9f9;">
                                    <img id="cover-image" src="" alt="Gambar Ruangan" style="max-width: 100%; max-height: 100%; display: none;">
                                    <p id="no-image" style="display: block;">No Image</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-4">
                        <div class="col my-2">
                            <button id="simpan" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Simpan Data</button>
                        </div>
                    </div>

                    {{--  Modal Konfirmasi Simpan Data --}}
                    <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Simpan Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menyimpan data ruangan ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" id="tambah-ruangan">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                


            </div>
        </div>
    </div>

    <div class="h-4" style="margin-bottom: 5rem;">
        <p class="text-light">.</p>
    </div>

    

    {{-- Modal Detail --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Ruangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container text-center mb-3">
                        <img id="modalGambar" src="" class="img-fluid" style="max-width: 50%; height: auto;">
                    </div>
                    <table class="table">
                        <tr>
                            <th>ID Ruangan</th>
                            <td>:</td>
                            <td id="modalID"></td>
                        </tr>
                        <tr>
                            <th>Nama Ruangan</th>
                            <td>:</td>
                            <td id="modalNama"></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td id="modalDeskripsi"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus Ruangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus <strong id="hapusNama"></strong> dari daftar ruangan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmHapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const headers = {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            };
    
            fetch('/api/ruangan', {
                method: 'GET',
                headers: headers
            })
            .then(response => response.json())
            .then(data => {
                const ruanganList = data.data;
    
                $('#ruangan-table').DataTable({
                    data: ruanganList,
                    columns: [
                        { 
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1 // Nomor urut
                        },
                        { data: 'id_ruangan' },
                        { data: 'nama_ruangan' },
                        { data: 'deskripsi' },
                        { 
                            data: null,
                            render: (data) => `
                                <button class="btn btn-outline-primary btn-sm" onclick="showDetail('${data.id_ruangan}', '${data.nama_ruangan}', '${data.deskripsi}', '${data.gambar_ruangan}')">Detail</button>
                            `
                        },
                        { 
                            data: null,
                            render: (data) => `
                                <button class="btn btn-outline-danger btn-sm" onclick="showHapus('${data.id_ruangan}', '${data.nama_ruangan}')">Hapus</button>
                            `
                        }
                    ],
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language: {
                        searchPlaceholder: "Cari Ruangan",
                        zeroRecords: "Data ruangan tidak tersedia."
                    }
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Terjadi kesalahan saat memuat data ruangan.");
            });
        });
    
        function showDetail(id, nama, deskripsi, gambar) {
            document.getElementById('modalGambar').src = '/storage/' + gambar;
            document.getElementById('modalID').textContent = id;
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalDeskripsi').textContent = deskripsi;
            $('#modalDetail').modal('show');
        }
    
        function showHapus(id, nama) {
            document.getElementById('hapusNama').textContent = nama;
            document.getElementById('confirmHapus').onclick = () => {
                fetch(`/api/ruangan/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'application/json',
                    }
                })
                .then(() => {
                    alert("Data berhasil dihapus.");
                    location.reload();
                })
                .catch(error => alert("Gagal menghapus data."));
            };
            $('#modalHapus').modal('show');
        }

        //Handle submit data
        document.getElementById('form-tambah-ruangan').addEventListener('submit', function () {
            const namaRuangan = document.getElementById('nama_ruangan').value;
            const deskripsi = document.getElementById('deskripsi_ruangan').value;
            const gambarRuangan = document.getElementById('gambar_ruangan').files[0];

        
            if (!namaRuangan || !deskripsi || !gambarRuangan) {
                alert("Semua field wajib diisi.");
                return;
            }

            const formData = new FormData();
            formData.append('nama_ruangan', namaRuangan);
            formData.append('deskripsi', deskripsi);
            formData.append('gambar_ruangan', gambarRuangan);

            
            fetch('/api/ruangan', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                    
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                alert("Data ruangan berhasil ditambahkan!");
                location.reload();
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Gagal menyimpan data ruangan.");
            });
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('cover-image');
                const noImage = document.getElementById('no-image');
                output.src = reader.result;
                output.style.display = 'block';
                noImage.style.display = 'none';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
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

    .form-control {
        max-width: 15rem;
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
