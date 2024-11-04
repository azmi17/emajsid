@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Jadwal Shalat</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal Shalat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <html lang="en">
                <head>
                  <style>
                    .hidden-list{
                      display: none;
                    }
                  </style>
                </head>
                <body>
                  <div class="container mt-5 mb-5">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control input-search" placeholder="Cari Kota disini...">
                    </div>

                    <div class="list-group card-list hidden-list mb-4">
                    </div>

                        <div class="row">
                            <div class="container">
                                <div class="card text-center">
                                    <div class="card-header">
                                      <h4 class="text-center">Jadwal Shalat</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                          </svg><span class="judul-kota"></span></p> {{-- the Lokasi must be shown here --}}
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Imsak
                                              <span class="badge bg-primary rounded-pill imsak"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Subuh
                                              <span class="badge bg-primary rounded-pill subuh"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Terbit
                                              <span class="badge bg-primary rounded-pill terbit"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Dzuhur
                                              <span class="badge bg-primary rounded-pill dzuhur"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Ashar
                                              <span class="badge bg-primary rounded-pill ashar"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Maghrib
                                              <span class="badge bg-primary rounded-pill maghrib"></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              Isya
                                              <span class="badge bg-primary rounded-pill isya"></span>
                                            </li>
                                          </ul>
                                    </div>
                                    <div class="card-footer text-body-secondary tanggal">
                                    </div>
                                  </div>
                            </div>
                        </div>

                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                  <script>

                    // Hapus localStorage saat halaman di load..
                    window.addEventListener('load', function() {
                        localStorage.removeItem('idkota');
                        localStorage.removeItem('judulkota');
                    });

                    // ambil tanggal sesuai hari
                    const getDate = new Date();
                    const getYear = getDate.getFullYear();
                    const getMonth = getDate.getMonth() + 1;
                    const getDay = getDate.getDate();

                    function bulan(){
                      if(getMonth < 10){
                        bulan = `0${getMonth}`;
                      }
                      else{
                        bulan = getMonth
                      }
                      return bulan
                    }

                    function hari(){
                      if(getMonth < 10){
                        hari = `0${getDay}`;
                      }
                      else{
                        hari = getDay
                      }
                      return hari
                    }

                    const tanggal = `/${getYear}/${bulan()}/${hari()}`;

                    const tampilKota = document.querySelector('.judul-kota');
                    tampilKota.textContent = localStorage.judulkota;

                    function getJadwalShalat() {
                        fetch('https://api.myquran.com/v2/sholat/jadwal/'+ parseInt(localStorage.idkota) + tanggal)
                        .then(response => response.json())
                        .then(data => {
                            const jadwal = data.data.jadwal;
                            document.querySelector('.imsak').textContent = jadwal.imsak;
                            document.querySelector('.subuh').textContent = jadwal.subuh;
                            document.querySelector('.terbit').textContent = jadwal.terbit;
                            document.querySelector('.dzuhur').textContent = jadwal.dzuhur;
                            document.querySelector('.ashar').textContent = jadwal.ashar;
                            document.querySelector('.maghrib').textContent = jadwal.maghrib;
                            document.querySelector('.isya').textContent = jadwal.isya;
                            document.querySelector('.tanggal').textContent = jadwal.tanggal;
                            // console.log("JADWAL: ", jadwal); // debug
                        });
                    }

                    // pilih lokasi
                    const inputSearch = document.querySelector('.input-search');
                    const cardList = document.querySelector('.card-list');

                    inputSearch.addEventListener('keyup', function() {
                    const valueSearch = inputSearch.value.trim();

                    if (valueSearch.length > 0) {
                        cardList.classList.remove('hidden-list');
                        const fetchUrl = `https://api.myquran.com/v2/sholat/kota/cari/${valueSearch}`;

                        fetch(fetchUrl)
                        .then(response => response.json())
                        .then(response => {
                            const kota = response.data;
                            let listKota = ``;
                            // console.log("Kota: ", kota);

                            kota.forEach(k => {
                            listKota += `<a href="#" data-idkota="${k.id}" id="nama-kota" class="list-group-item list-group-item-action">${k.lokasi}</a>`;
                            });

                            cardList.innerHTML = listKota;

                            //Click kota
                            const isiKota = document.querySelectorAll('#nama-kota');
                            isiKota.forEach(ik => {
                            ik.addEventListener('click', function() {
                                const idkota = this.dataset.idkota;
                                const judulKota = this.textContent;
                                window.localStorage.setItem('idkota', idkota);
                                window.localStorage.setItem('judulkota', judulKota);
                                cardList.classList.add('hidden-list');
                                inputSearch.value = '';
                                location.reload();
                                });
                            });
                        });
                    } else {
                        cardList.classList.add('hidden-list');
                    }
                    });

                    getJadwalShalat();
                  </script>
                </body>
              </html>
            </div>
        </div>
    </div>
</div>
@endsection
