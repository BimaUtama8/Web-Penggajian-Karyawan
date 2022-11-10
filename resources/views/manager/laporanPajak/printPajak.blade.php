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

<body>

  

  <table style="width:100%">
    <tr>
      <th style="text-align:left" colspan="3">
        <h3 style="text-align:center">PT. SURYA GLOBALINDO SEJAHTERA</h3>
      </th>
      <th style="text-align:left" colspan="2">
        <h4 style="text-align:left">NPWP :  <br><hr><br> Masa Pajak : </h4>
        <th style="text-align: center" colspan="2">
          <h4 style="text-align:center">Laporan Pajak Karyawan Periode <br> Tahun </h4>
        </th>
      </th>
    </tr>
    <tr>
      <th style="text-align:center">Nama Karyawan</th>
      <th style="text-align:center">NPWP</th>
      <th style="text-align:center">Status Nikah</th>
      <th style="text-align:center">Tanggungan Anak</th>
      <th style="text-align:center">Jumlah Penghasilan <br> Bruto (Rp)</th>
      <th style="text-align:center">Total Potongan</th>
      <th style="text-align:center">Pajak Penghasilan 1 Tahun</th>
    </tr>
    @foreach ($data as $data)
    <tr>
      <td style="text-align:center"></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="text-align:left"></td>
      <td style="text-align:left"></td>
      <td style="text-align:left"></td>

    </tr>
    @endforeach
    <tr>
      <th colspan="6">Total Pajak Penghasilan Karyawan</th>
      <th style="text-align:right"></th>
    </tr>
  </table>
</body>

</html>