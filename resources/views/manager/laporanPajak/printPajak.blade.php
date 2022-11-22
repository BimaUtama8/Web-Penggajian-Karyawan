<!DOCTYPE html>
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

<body onload="window.print()">

  

  <table style="width:100%">
    <tr>
      <th style="text-align:left" colspan="3">
        <h3 style="text-align:center">PT. SURYA GLOBALINDO SEJAHTERA</h3>
      </th>
      <th style="text-align:left" colspan="2">
        <h4 style="text-align:left">NPWP :&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp<br><hr><br> Tahun Pajak : {{ $tahun }}</h4>
        <th style="text-align: center" colspan="2">
          <h4 style="text-align:center">Laporan Pajak Karyawan Periode <br> Tahun {{ $tahun }} </h4>
        </th>
      </th>
    </tr>
    <tr>
      <th style="text-align:center">Nama Karyawan</th>
      <th style="text-align:center">NPWP</th>
      <th style="text-align:center">Status Menikah</th>
      <th style="text-align:center">Tanggungan Anak</th>
      <th style="text-align:center">Jumlah Penghasilan <br> Bruto (Rp)</th>
      <th style="text-align:center">Total Potongan</th>
      <th style="text-align:center">Pajak Penghasilan 1 Tahun</th>
    </tr>
    @foreach ($data as $data)
    <tr>
      <td style="text-align:center">{{ $data->nama }}</td>
      <td style="text-align: center">
        @if ($data['npwp'] == 0)
          Tidak Ada
        @else
          Ada
        @endif
      </td>
      <td style="text-align: center">{{ $data->status }}</td>
      <td style="text-align: center">{{ $data->tanggungan }}</td>
      <td style="text-align:center">Rp {{ number_format($data->penghasilan_bruto,0,',','.') }}</td>
      <td style="text-align:center">Rp {{ number_format($data->penghasilan_bruto-$data->penghasilan_bersih,0,',','.') }}</td>
      <td style="text-align:center">Rp {{ number_format($data->pajak_penghasilan,0,',','.') }}</td>

    </tr>
    @endforeach
    <tr>
      <th colspan="6">Total Pajak Penghasilan Karyawan</th>
      <th style="text-align:center">Rp {{ number_format($total_pajak,0,',','.') }}</th>
    </tr>
  </table>
</body>

</html>