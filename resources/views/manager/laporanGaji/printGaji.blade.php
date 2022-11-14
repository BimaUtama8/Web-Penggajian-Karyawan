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

  <h2 style="text-align:center">PT. SURYA GLOBALINDO SEJAHTERA</h2>
  <p style="text-align:center">Laporan Gaji Karyawan Bulan 
  <?php 
    switch ($bulan) {
        case '01':
            $bulan_ini = "Januari";
        break;
        case '02':
            $bulan_ini = "Februari";
        break;
        case '03':
            $bulan_ini = "Maret";
        break;
        case '04':
            $bulan_ini = "April";
        break;
        case '05':
            $bulan_ini = "Mei";
        break;
        case '06':
            $bulan_ini = "Juni";
        break;
        case '07':
            $bulan_ini = "Juli";
        break;
        case '08':
            $bulan_ini = "Agustus";
        break;
        case '09':
            $bulan_ini = "September";
        break;
        case '10':
            $bulan_ini = "Oktober";
        break;
        case '11':
            $bulan_ini = "November";
        break;
        case '12':
            $bulan_ini = "Desember";
        break;
        default:
            $bulan_ini = "Tidak di ketahui";
        break;
    }
    ?>{{ $bulan_ini }} Tahun {{ $tahun }}</p>

  <table style="width:100%">
    <tr>
      <th style="text-align:center">No</th>
      <th style="text-align:center">Nama Karyawan</th>
      <th style="text-align:center">Jabatan</th>
      <th style="text-align:center">Gaji Pokok</th>
      <th style="text-align:center">Total Tunjangan</th>
      <th style="text-align:center">Total Potongan</th>
      <th style="text-align:center">Gaji Bersih</th>
    </tr>
    <?php
    $no = 1;
    ?>
    @foreach ($data as $data)
    
    <tr>
      <td style="text-align:center">{{$no++}}</td>
      <td>{{$data->nama}}</td>
      <td>{{$data->nama_jabatan}}</td>
      <td style="text-align:left">Rp {{ number_format($data->gaji,0,',','.') }}</td>
      <td style="text-align:left">Rp {{ number_format($data->total_tmakan+$data->total_ttransportasi,0,',','.') }}</td>
      <td style="text-align:left">Rp {{ number_format($data->biaya_jabatan+$data->jaminan_ht+$data->jaminan_p,0,',','.') }}</td>
      <td style="text-align:left">Rp {{ number_format($data->penghasilan_bersih,0,',','.') }}</td>
    </tr>
    @endforeach
    <tr>
      <th colspan="6">Total Penggajian Karyawan</th>
      <th style="text-align:left">Rp {{ number_format($total_gaji,0,',','.') }}</th>
    </tr>
  </table>
</body>

</html>
