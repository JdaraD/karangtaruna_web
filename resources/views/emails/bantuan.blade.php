<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Bantuan</title>
</head>
<body style="font-family: poppins, sans-serif;">

    <h2 style="font-weight: bold; text-transform: uppercase;">Pengajuan Bantuan Baru !!!</h2>
    <div style="display: inline-block; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
            {{-- <p style="margin: 4px; font-family: poppins; text-transform: capitalize; font-weight: bold; font-size: medium;">{{ $kami->first_name }} {{ $kami->last_name }}</p> --}}
        </div>
            <div style="border-bottom: 3px double black; width: calc(100% + 30px); margin-top: 5px; margin-left: -10px;"></div>
    </div>

    <div>
        <table cellpadding="8" cellspacing="0" border="0">
            <tr>
                <td><strong>Nama</strong></td>
                <td>{{ $bantuan->nama }}</td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>{{ $bantuan->alamat }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $bantuan->email }}</td>
            </tr>
            <tr>
                <td><strong>Nomor</strong></td>
                <td>{{ $bantuan->no_telp }}</td>
            </tr>
            <tr>
                <td><strong>Keperluan</strong></td>
                <td>{{ $bantuan->keperluan }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal</strong></td>
                <td>{{ \Carbon\Carbon::parse($bantuan->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Detail Keperluan</strong></td>
                <td>{{ $bantuan->detail_Keperluan }}</td>
            </tr>
        </table>

    </div>

    <p>Silakan hubungi Nomor dan email yang tertera.</p>

    @if(!empty($kami['catatan']))
        <p><strong>Catatan dari Admin:</strong> {{ $kami['catatan'] }}</p>
    @endif

    <p>Salam,<br>{{ $kami['nama'] }}</p>

</body>
</html>
