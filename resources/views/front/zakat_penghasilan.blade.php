@extends('front.layout.app')

@section('main_content')
<div class="page-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Kalkulator Zakat Penghasilan</h2>
        <nav class="breadcrumb-container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Zakat Penghasilan</li>
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
        <p class="text-justify">Zakat penghasilan, atau zakat profesi, adalah jenis zakat dalam Islam yang dikenakan pada pendapatan individu. Ini melibatkan penghitungan persentase tertentu dari pendapatan seseorang setelah mengurangkan biaya hidup yang diperlukan, dan diberikan kepada mereka yang memenuhi syarat sebagai mustahik, seperti orang miskin atau yang membutuhkan lainnya. Zakat penghasilan adalah kewajiban agama yang bertujuan untuk membantu mereka yang kurang beruntung dalam masyarakat, menciptakan distribusi kekayaan yang lebih adil, dan mempromosikan keseimbangan sosial. Persentase zakat yang tepat dapat bervariasi, tetapi biasanya berkisar antara 2,5% hingga 10% dari sisa pendapatan setelah pengeluaran dasar.</p>
        <div class="card-body">
          <div class="form-group mb-3">
            <label>Jumlah pendapatan per bulan</label>
            <input id="penghasilan" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Pendapatan lain, Bonus, THR, dan lainnya per bulan</label>
            <input id="penghasilan_tambahan" type="text" class="form-control" name="dana" onkeyup="formatRupiah(this)">
          </div>
          <div class="form-group mb-3">
            <label>Hutang kebutuhan pokok per bulan (opsional)</label>
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
        <h5>Nisab Zakat Penghasilan</h5>
          <p>Nisab adalah suatu nilai minimum kekayaan yang harus dimiliki oleh seorang Muslim agar wajib membayar zakat. Zakat adalah salah satu pilar utama dalam agama Islam yang menetapkan kewajiban umat Muslim untuk memberikan sebagian kekayaan mereka kepada yang membutuhkan. Nisab berfungsi sebagai ambang batas minimum kekayaan yang harus dicapai sebelum seseorang diwajibkan untuk membayar zakat harta. Nisab Zakat Penghasilan adalah setara <b>85 gr emas</b> per tahun. Seseorang yang memiliki kekayaan di atas nisab wajib membayar zakat harta sebesar 2,5% dari total kekayaannya setelah mencapai nisab. Zakat Penghasilan ini diberikan kepada golongan yang berhak menerimanya, seperti fakir miskin, yatim piatu, janda, dan golongan yang membutuhkan bantuan.</p>        
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
    let penghasilan = document.getElementById("penghasilan").value;
    penghasilan = penghasilan.replace(/\D/g, "");
    let penghasilanTambahan = document.getElementById("penghasilan_tambahan").value;
    penghasilanTambahan = penghasilanTambahan.replace(/\D/g, "");
    let hutang = document.getElementById("hutang").value;
    hutang = hutang.replace(/\D/g, "");
    let harga_emas = document.getElementById("harga_emas").value;
    harga_emas = harga_emas.replace(/\D/g, "");
    let nisab = harga_emas * 85 / 12;

    // Menampilkan nisab
    document.getElementById("nisab").innerHTML = "Nisab Zakat Penghasilan: Rp " + nisab.toLocaleString();

    let inputRupiah = parseInt(penghasilan, 10) + parseInt(penghasilanTambahan, 10);

    // Memeriksa apakah hutang diisi atau tidak
    if (hutang !== "") {
        inputRupiah -= parseInt(hutang, 10);
    }

    // Memeriksa apakah inputRupiah memenuhi nisab
    if (!isNaN(inputRupiah) && inputRupiah >= nisab) {
        inputRupiah = parseInt(inputRupiah, 10);
        let zakat = (inputRupiah * 2.5) / 100;
        document.getElementById("hasil").innerHTML = "Zakat yang harus dibayar: Rp " + zakat.toLocaleString();
    } else if (!isNaN(inputRupiah) && inputRupiah < nisab) {
        document.getElementById("hasil").innerHTML = "Total penghasilan yang Anda input tidak diwajibkan untuk zakat.";
    } else {
        document.getElementById("hasil").innerHTML = "Semua kolom harus diisi.";
    }
}

</script>
@endsection