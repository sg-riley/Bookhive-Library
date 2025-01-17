@extends('user.layout.dashboard-user')

@section('title', 'Reservasi Ruangan')

@section('content')

<style>
    h1 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 20px;
        font-size: 22px;
    }

    .card-container {
        display: flex;
        justify-content: left;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px;
    }

    .card {
        width: 18rem;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 15px;
        text-align: center;
        flex-grow: 1;
    }

    .btn-primary {
        background-color: #026bd4;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #04396e;
    }
</style>

<div class="h-5 m-4">
    <p class="text-light">.</p>
</div>

<div class="header-pages mt-3 mb-5" style="background: linear-gradient(90deg, rgb(88, 213, 42) 0%, rgb(201, 255, 182) 100%);">
    <span class="triangle" style="background: rgb(185, 255, 160);"></span>
    <h1 class="m-0 text-light">Reservasi Ruangan</h1>
</div>

<div class="row card-container d-flex" style="margin-left: 0px;">
    <div class="card p-0 mx-3 mb-4" style="background-color: #4475f2; color: white;">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-buildings bx-lg'></i>
                <div class="text-start mt-2">
                    <span class="m-0">Total Ruangan</span>
                    <h4 id="total-ruangan"><strong>0</strong></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-0 mx-3 mb-4" style="background: linear-gradient(146deg, rgba(0,206,45,1) 21%, rgb(58, 255, 101) 100%); color: white;">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
                <i class='bx bx-door-open bx-lg'></i>
                <div class="text-start mt-2">
                    <span class="m-0">Riwayat Peminjaman</span>
                    <h4 id="riwayat-peminjaman"><strong>0</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<h1>Ruangan Tersedia</h1>
<div class="card-container" id="room-container"></div>

<div class="modal fade" id="reservasiModal" tabindex="-1" role="dialog" aria-labelledby="reservasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservasiModalLabel">Reservasi Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Masukkan Tanggal Reservasi</p>
                <input type="date" id="tanggal_pinjam" class="form-control" placeholder="Masukkan Tanggal dan Jam Pinjam">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="reservasiBtn">Ya, Reservasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="h-4" style="margin-bottom: 5rem;">
    <p class="text-light">.</p>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    let selectedRoomId = null;

    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/ruangan', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            const roomContainer = document.getElementById('room-container');
            const totalRuangan = document.getElementById('total-ruangan');
            let total = 0;

            data.data.forEach(ruangan => {
                //console.log(ruangan);
                const cardHTML = `

                    <div class="card">
                        <img src="/storage/${ruangan.gambar_ruangan}" class="card-img-top" alt="${ruangan.nama_ruangan}">
                        <div class="card-body">
                            <h5 class="card-title">${ruangan.nama_ruangan}</h5>
                            <p>${ruangan.deskripsi}</p>
                            <a href="#" class="btn btn-outline-primary reservasi-btn" 
                                data-toggle="modal" data-target="#reservasiModal" 
                                data-room-id="${ruangan.id_ruangan}">
                                Reservasi Sekarang
                            </a>
                        </div>
                    </div>

      
                `;
                roomContainer.innerHTML += cardHTML;
                total++;
            });

            totalRuangan.innerText = total;

            document.querySelectorAll('.reservasi-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const roomId = this.getAttribute('data-room-id'); 
                    selectedRoomId = roomId;
                    console.log("Room ID Terpilih:", roomId);
                });
            });
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data ruangan.');
        });
    });

    document.getElementById('reservasiBtn').addEventListener('click', function () {
        const tanggalReservasi = document.getElementById('tanggal_pinjam').value;
        console.log(selectedRoomId);
        if (!selectedRoomId) {
            alert('Ruangan tidak valid. Silakan pilih ruangan lagi.');
            return;
        }

        if (!tanggalReservasi) {
            alert('Silakan masukkan tanggal peminjaman.');
            return;
        }

        const reservasiDate = new Date(tanggalReservasi);
        const day = reservasiDate.getDay();

        if (day === 0 || day === 6) {
            alert('Reservasi tidak dapat dilakukan pada hari Sabtu atau Minggu.');
            return;
        }

        const reservasiData = {
            id_pengguna: JSON.parse(localStorage.getItem('user')).id_pengguna,
            id_ruangan: selectedRoomId,
            tanggal_reservasi: tanggalReservasi,
        };

        fetch('/api/tambah-reservasi', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(reservasiData)
        })
        .then(response => response.json())
        .then(result => {
            if (result.message) {
                alert(result.message);
                $('#reservasiModal').modal('hide');
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal melakukan reservasi. Coba lagi.');
        });
    });


    //fetch riwayat reservasi
    fetch('/api/reservasi', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        const user = JSON.parse(localStorage.getItem('user'));
        const filteredData = data.data.filter(reservasi => reservasi.id_pengguna === user.id_pengguna);
        
        console.log(filteredData);
        const jumlah = filteredData.length;
        document.getElementById('riwayat-peminjaman').innerText = jumlah;
        

    })
    .catch(error => {
        console.error('Error:', error);
    });

</script>


@endsection
