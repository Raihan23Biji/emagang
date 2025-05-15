<!-- Blade untuk PDF nilai -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lembaran Penilaian Magang</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.5; }
        .header { text-align: center; margin-bottom: 20px; }
        .form-title { font-weight: bold; text-decoration: underline; }
        .student-info div { margin-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; }
        th { background-color: #f2f2f2; }
        .total-row { font-weight: bold; }
        .signature { margin-top: 50px; float: right; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <div class="form-title">LEMBARAN PENILAIAN MAGANG</div>
    </div>

    <div class="student-info">
        <div>Nama Mahasiswa: {{ $user->name }}</div>
        <div>Nomor Induk Mahasiswa: {{ $user->id }}</div>
        <div>Program Studi: {{ $pendaftaran->prodi ?? '-' }}</div>
        <div>Asal Instansi Pendidikan: {{ $pendaftaran->universitas ?? '-' }}</div>
        <div>Instansi PKL/Magang: Nama Instansi Anda</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Aspek yang Dinilai</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aspekHuruf as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item['label'] }}</td>
                <td>{{ $item['angka'] }}</td>
                <td>{{ $item['huruf'] }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="2">Jumlah Nilai</td>
                <td>{{ $total }}</td>
                <td>-</td>
            </tr>
            <tr class="total-row">
                <td colspan="2">Rata-rata</td>
                <td>{{ number_format($rataRata, 2) }}</td>
                <td>{{ $rataHuruf }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Keterangan:</h3>
    <table style="width:60%">
        <tr><th>Nilai Angka</th><th>Nilai Huruf</th><th>Keterangan</th></tr>
        <tr><td>86 - 100</td><td>A</td><td>Sangat Baik</td></tr>
        <tr><td>75 - 85,99</td><td>B</td><td>Baik</td></tr>
        <tr><td>41 - 74,99</td><td>C</td><td>Cukup</td></tr>
        <tr><td>21 - 40,99</td><td>D</td><td>Kurang</td></tr>
        <tr><td>0 - 20,99</td><td>E</td><td>Sangat Kurang</td></tr>
    </table>

    <div class="signature">
        Jambi, <br>
        Analis Hukum Pertanahan<br><br><br><br>
        Sri Shalawati, S.H.<br>
        NIP. 199504222022042001
    </div>
</body>
</html>
