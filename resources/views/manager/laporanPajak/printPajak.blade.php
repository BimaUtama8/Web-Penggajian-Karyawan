<html>

<head>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>
<body>
<h2 style="text-align:center">PT. Surya Globalindo Sejahtera</h2>
  <p style="text-align:center">Laporan Pajak Karyawan</p>
    <table style="width:100%">
        <tr>
          <th style="text-align:center">Nama Karyawan</th>
          <th style="text-align:center">Tahun</th>
          <th style="text-align:center">Bulan</th>
          <th style="text-align:center">PPh 1 Tahun</th>
        </tr>
        @foreach ($data as $data)
        <tr>
          {{-- <td style="text-align:center">{{$no++}}</td> --}}
          <td style="text-align: center">{{$data->nama}}</td>
          <td style="text-align: center">{{$data->tahun}}</td>
          <td style="text-align: center">{{$data->bulan}}</td>
          <td style="text-align: center">Rp {{ number_format($data->pajak_penghasilan,0,',','.') }}</td>
        </tr>
        @endforeach
      </table>
</body>
</html>
