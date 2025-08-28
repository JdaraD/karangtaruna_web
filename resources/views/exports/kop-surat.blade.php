<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .kop {
            text-align: center;
            border-bottom: 3px solid black;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="kop">
        <h2>Karang Taruna Desa Contoh</h2>
        <p>Jl. Contoh No. 123, Kecamatan ABC, Kabupaten XYZ</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keperluan</th>
                <th>Total Anggaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->keperluan }}</td>
                    <td>Rp {{ number_format($item->total_anggaran, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
