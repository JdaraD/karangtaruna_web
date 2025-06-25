<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Kegiatan</title>
</head>
<body style="font-family: poppins, sans-serif;">

    <h2 style="font-weight: bold; text-transform: uppercase;">Pengajuan Kegiatan Baru !!!</h2>
    <div style="display: inline-block; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
            <p style="margin: 4px; font-family: poppins; text-transform: capitalize; font-weight: bold; font-size: medium;">{{ $kami->first_name }} {{ $kami->last_name }}</p>
        </div>
            <div style="border-bottom: 3px double black; width: calc(100% + 30px); margin-top: 5px; margin-left: -10px;"></div>
    </div>

    <div>
          <table cellpadding="8" cellspacing="0" border="0">
        <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $pengajuan->nama }}</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>{{ $pengajuan->alamat }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $pengajuan->email }}</td>
        </tr>
        <tr>
            <td><strong>Nomor</strong></td>
            <td>{{ $pengajuan->no_telp }}</td>
        </tr>
        <tr>
            <td><strong>Keperluan</strong></td>
            <td>{{ $pengajuan->keperluan }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal</strong></td>
            <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td><strong>Total Anggaran</strong></td>
            <td>Rp {{ number_format($pengajuan->total_anggaran, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Detail Keperluan</strong></td>
            <td>{{ $pengajuan->detail_Keperluan }}</td>
        </tr>
        @if ($pengajuan->file_path)
        <tr>
            <td><strong>File Terlampir</strong></td>
            <td><em>Terlampir dalam email</em></td>
        </tr>
        @endif
    </table>  
    </div>


    <p>Silakan cek file terlampir untuk informasi lebih lanjut.</p>

</body>
</html>
