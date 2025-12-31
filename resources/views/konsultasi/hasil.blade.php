<h3>Hasil Deteksi</h3>

<p>Usia Kehamilan: {{ $konsultasi->usia_kehamilan }} minggu</p>
<p>Trimester: {{ $konsultasi->trimester }}</p>
<p>Kondisi: {{ $konsultasi->kondisi->nama_kondisi }}</p>
<p>Nilai CF: {{ $konsultasi->nilai_cf }}</p>

<p><em>Hasil ini merupakan deteksi dini, bukan diagnosis medis.</em></p>
<a href="/konsultasi">Kembali ke Form Deteksi</a>