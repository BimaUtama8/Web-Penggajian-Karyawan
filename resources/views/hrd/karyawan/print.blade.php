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

<body>
  <table style="width:100%">
    <tr>
      <td colspan="7" style="text-align:center"><img src="" /></td>
    </tr>
    <tr>
      <th colspan="7">Slip Gaji {{$bulan}} {{date('Y-m-d H:i:s')}}</th>
    </tr>
    {{-- <tr>
      <td>NIP</td>
      <td style="text-align:center">:</td>
      <td colspan="5">{{$data->nip}}</td>
    </tr> --}}
    <tr>
      <td>Nama Karyawan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $nama }}</td>
      <td style="width:10%"></td>
      <td>Jumlah Hari Masuk</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $jhk }} Hari</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{$jabatan}}</td>
      <td style="width:10%"></td>
      <td>Jumlah Jam Lembur</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">{{ $jlembur }} Jam</td>
    </tr>
    <tr>
      <td height="20" colspan="7"></td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="4"><b>Penerimaan</b></td>
      <td style="text-align:left" colspan="3"><b>Potongan</b></td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($gapok,0,',','.') }}</td>
      <td style="width:10%"></td>
      <td>Biaya Jabatan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($bjabatan,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Makan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($tmakan,0,',','.') }}</td>
      <td> </td>
      <td>Jaminan Hari Tua</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($jaminanht,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Transportasi</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($ttransportasi,0,',','.') }}</td>
      <td> </td>
      <td>Jaminan Pensiun</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($jaminanp,0,',','.') }}</td>
    </tr>
    {{--<tr>
      <td>Tunjangan Sakit</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($tunjangan_sakit,0,',','.') }}</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td>Tunjangan Kompensasi</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($tunjangan_kompensasi,0,',','.') }}</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr>
    <tr>
      <td>Tunjangan Cuti</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($tunjangan_cuti,0,',','.') }}</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
    </tr> --}}
    <tr>
      <td height="20" colspan="7"></td>
    </tr>
    <tr>
      <td>Gaji Kotor</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($bruto,0,',','.') }}</td>
      <td> </td>
      <td>Total Potongan</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($potongan,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Upah Lembur</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($lembur,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Tunjangan Pajak</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($pph/12,0,',','.') }}</td>
    </tr>
    <tr>
      <td>Bonus/Insentif</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format(0,0,',','.') }}</td>
    </tr>
    <tr>
      <th height="20" colspan="7"></th>
    </tr>
    <tr>
      <td>Gaji Bersih</td>
      <td style="text-align:center">:</td>
      <td style="text-align:right">Rp {{ number_format($bersih,0,',','.') }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
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
      <td style="text-align:center" colspan="3">{{$nama}}</td>
    </tr>
  </table>
</body>

</html>