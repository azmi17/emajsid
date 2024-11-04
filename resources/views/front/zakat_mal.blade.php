@extends('front.layout.app')

@section('main_content')
<div class="page-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Kalkulator Zakat Mal</h2>
        <nav class="breadcrumb-container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Zakat Mal</li>
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
        <p class="text-justify">Zakat Mal adalah zakat yang dikeluarkan dari harta kekayaan atau harta benda yang dimiliki oleh seorang Muslim yang mencapai nisab (batas tertentu) dan telah mencapai haul (masa satu tahun). Zakat Mal merupakan salah satu rukun Islam yang wajib dilaksanakan oleh setiap Muslim yang memenuhi syarat-syarat tertentu. Persentase zakat yang tepat dapat bervariasi, tetapi biasanya berkisar antara 2,5% hingga 10% dari sisa pendapatan setelah pengeluaran dasar. Zakat mal sendiri merupakan induk dari zakat penghasilan.</p>
        <div class="card-body">
          <div class="form-group mb-3">
            <label>Nilai emas, perak, dan/atau permata yang dimiliki</label>
            <input id="emas" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Uang tunai, tabungan, deposito yang dimiliki</label>
            <input id="tabungan" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Nilai aset yang dimiliki</label>
            <input id="aset" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Jumlah hutang/cicilan (opsional)</label>
            <input id="hutang" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Harga Emas Saat Ini (bisa dilihat di <i><b>harga-emas.org</b></i>)</label>
            <input id="harga_emas" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <button type="submit" class="btn btn-primary" onclick="hitungZakat()">Hitung Zakat</button>
          <h5 id="hasil" class="mt-3"></h5>
          <h5 id="nisab" class="mt-3"></h5>
        </div>
        <h5>Nisab Zakat Mal</h5>
          <p>Nisab zakat mal ditetapkan berdasarkan nilai tertentu dari harta tertentu, yaitu emas dan perak. Nisab ini berfungsi sebagai penentu apakah seseorang memiliki kekayaan yang cukup untuk dikenakan zakat mal atau tidak. Nilai nisab dapat berubah sesuai dengan nilai pasar emas dan perak. Nisab Zakat Mal serupa dengan zakat Penghasilan yakni setara <b>85 gr emas</b> per tahun Pada website ini akan menggunakan nilai dari pasar emas.</p>        
      </div>
    </div>
  </div>
</div>


<script>
  //format menjadi mata uang rupiah
  function formatRupiah(input) {
    let nilai = input.value;
    nilai = nilai.replace(/\D/g, "");
    if (nilai != "") {
      nilai = parseInt(nilai, 10);
      input.value = "Rp " + nilai.toLocaleString();
    }
  }

  function hitungZakat() {
    let emas = document.getElementById("emas").value;
    emas = emas.replace(/\D/g, "");
    let tabungan = document.getElementById("tabungan").value;
    tabungan = tabungan.replace(/\D/g, "");
    let aset = document.getElementById("aset").value;
    aset = aset.replace(/\D/g, "");
    let hutang = document.getElementById("hutang").value;
    hutang = hutang.replace(/\D/g, "");
    let harga_emas = document.getElementById("harga_emas").value;
    harga_emas = harga_emas.replace(/\D/g, "");
    let nisab = harga_emas * 85 / 12;
    document.getElementById("nisab").innerHTML = "Nisab Zakat Mal: Rp " + nisab.toLocaleString();

    let inputRupiah = parseInt(emas, 10) + parseInt(tabungan, 10) + parseInt(aset, 10);

    // Memeriksa apakah hutang diisi atau tidak
    if (hutang !== "") {
        inputRupiah -= parseInt(hutang, 10);
    }

    if (!isNaN(inputRupiah) && inputRupiah >= nisab) {
        inputRupiah = parseInt(inputRupiah, 10);
        let zakat = (inputRupiah * 2.5) / 100;
        document.getElementById("hasil").innerHTML = "Zakat yang harus dibayar: Rp " + zakat.toLocaleString();
    } else if (!isNaN(inputRupiah) && inputRupiah < nisab) {
        document.getElementById("hasil").innerHTML = "Total Harta yang Anda input tidak diwajibkan untuk zakat.";
    } else {
        document.getElementById("hasil").innerHTML = "Semua kolom harus diisi.";
    }

  }
</script>
@endsection