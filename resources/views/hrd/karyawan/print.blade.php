<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    table,
    th {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body onload="window.print()">
  <table style="width:100%">
    {{-- <tr>
      <td colspan="7" style="text-align:center"><img src="" /></td>
    </tr> --}}
    <tr>
      <th height="10" colspan="7">
        <h1 style="text-align: center">PT. Surya Globalindo Sejahtera</h1>
        <h3 style="text-align: center">Slip Gaji Karyawan</h3>
        <p style="text-align: center">Tanggal {{ date('d-m-Y'); }}</p>
      </th>
    </tr>
    
    {{-- <tr>
      <td>NIP</td>
      <td style="text-align:center">:</td>
      <td colspan="5">{{$data->nip}}</td>
    </tr> --}}
    <tr>
      <td height="10" colspan="7"></td>
    </tr>
    <tr>
      <td>Nama Karyawan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $cetak->nama }}</td>
      <td style="width:10%"></td>
      <td>Jumlah Hari Masuk</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $cetak->jumlah_hari }} Hari</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $cetak->nama_jabatan}}</td>
      <td style="width:10%"></td>
      <td>Jumlah Jam Lembur</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $cetak->lembur }} Jam</td>
    </tr>
    <tr>
      <td height="20" colspan="7"></td>
    </tr>
    <tr>
      <th style="text-align:left" colspan="4"><b>Penerimaan</b></th>
      <th style="text-align:left" colspan="3"><b>Potongan</b></th>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->gaji,0,',','.') }}</td>
      <td style="width:10%"></td>
      <td>Biaya Jabatan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->biaya_jabatan,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Makan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->total_tmakan,0,',','.') }}</td>
      <td> </td>
      <td>Jaminan Hari Tua</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->jaminan_ht,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Transportasi</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->total_ttransportasi,0,',','.') }}</td>
      <td> </td>
      <td>Jaminan Pensiun</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->jaminan_p,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Upah Lembur</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->upah_lembur,0,',','.') }}</td>
      <td> </td>
      <td>Pajak Penghasilan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->pajak_penghasilan/12,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Pajak</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->pajak_penghasilan/12,0,',','.') }}</td>
    </tr>
    {{-- <tr>
      <td>Bonus/Insentif</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format(0,0,',','.') }}</td>
    </tr> --}}
    <tr>
      <td height="20" colspan="7"></td>
    </tr>
    <tr>
      <th height="20" colspan="7"></th>
    </tr>
    <tr>
      <td><b>Total Penerimaan</b></td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->penghasilan_bruto+$cetak->pajak_penghasilan/12,0,',','.') }}</td>
      <td> </td>
      <td><b>Total Potongan</b></td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($potongan+$cetak->pajak_penghasilan/12,0,',','.') }}</td>
    </tr>
    <tr>
      <td><b>Penerimaan Bersih</b></td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($cetak->penghasilan_bersih,0,',','.') }}</td>
    </tr>
    <tr>
      <td height="50" colspan="7"></td>
    </tr>
    <tr>
      <td style="text-align:center" colspan="3">PT. SURYA GLOBALINDO SEJAHTERA,</td>
      <td></td>
      <td style="text-align:center" colspan="3">Penerima,</td>
    </tr>
    <tr>
      <td height="70" colspan="7"></td>
    </tr>
    <tr>
      <td style="text-align:center" colspan="3">Manager</td>
      <td></td>
      <td style="text-align:center" colspan="3">{{$cetak->nama}}</td>
    </tr>
  </table>
</body>

</html>