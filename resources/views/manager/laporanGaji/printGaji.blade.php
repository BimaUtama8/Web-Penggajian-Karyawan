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
  <p style="text-align:center">Laporan Gaji Karyawan Karyawan</p>
    <table style="width:100%">
        <tr>
          <th style="text-align:center">Nama Karyawan</th>
          <th style="text-align:center">Jabatan</th>
          <th style="text-align:center">Gaji Pokok</th>
          <th style="text-align:center">Total Tunjangan</th>
          <th style="text-align:center">Gaji Kotor</th>
          <th style="text-align:center">Total Potongan</th>
          <th style="text-align:center">Upah Lembur</th>
          <th style="text-align:center">Gaji Bersih</th>
        </tr>
        @foreach ($data as $data)
        <tr>
          {{-- <td style="text-align:center">{{$no++}}</td> --}}
          <td style="text-align: center">{{$data->nama}}</td>
          <td style="text-align: center">{{$data->nama_jabatan}}</td>
          <td style="text-align: center">{{$data->gaji}}</td>
          <td style="text-align: center">Rp {{ number_format($data->total_tmakan+$data->total_ttransportasi,0,',','.') }}</td>
          <td style="text-align: center">Rp {{ number_format($data->penghasilan_bruto,0,',','.') }}</td>
          <td style="text-align: center">Rp {{ number_format($data->biaya_jabatan+$data->jaminan_ht+$data->jaminan_p,0,',','.') }}</td>
          <td style="text-align: center">Rp {{ number_format($data->upah_lembur,0,',','.') }}</td>
          <td style="text-align: center">Rp {{ number_format($data->penghasilan_bersih,0,',','.') }}</td>
        </tr>
        @endforeach
      </table>
</body>
</html>
