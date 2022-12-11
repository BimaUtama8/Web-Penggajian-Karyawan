<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            margin: 0px auto;
        }
    
        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }
    
        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }
    
        .tg .tg-p0jh {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-3uj0 {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-a30r {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 11px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-63jj {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }
    
        .tg .tg-gbii {
            font-family: "Times New Roman", Times, serif !important;
            font-size: 10px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-hxn7 {
            background-color: #656565;
            border-color: inherit;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-37c6 {
            border-color: inherit;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }
    
        .tg .tg-i7q0 {
            border-color: inherit;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-zp53 {
            border-color: inherit;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-4f4e {
            background-color: #656565;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
            text-align: left;
            vertical-align: top
        }
    
        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }
    
        @media screen and (max-width: 767px) {
            .tg {
                width: auto !important;
            }
    
            .tg col {
                width: auto !important;
            }
    
            .tg-wrap {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                margin: auto 0px;
            }
        }
    
    </style>
</head>
<body onload="window.print()">
    <div class="tg-wrap">
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-p0jh" colspan="2" rowspan="2"><br><br>KEMENTRIAN KEUANGAN RI<br><br>DIREKTORAT JENDRAL
                        PAJAK<br></th>
                    <th class="tg-37c6" colspan="2">BUKTI PEMOTONGAN PAJAK PENGHASILAN<br>PASAL 21 BAGI PEGAWAI TETAP
                        ATAU<br>PENERIMA PENSIUN ATAU TUNJANGAN HARI <br>TUA/JAMINAN HARI TUA BERKALA</th>
                    <th class="tg-37c6" colspan="2" rowspan="2">FORMULIR 1721 - A1<br><br><br><br>MASA
                        PEROLEHAN<br>PENGHASILAN[mm-mm]<br>______ - _____</th>
                </tr>
                <tr>
                    <th class="tg-i7q0" colspan="2">NOMOR : 1 . 1 - ____ . ____ - _________________</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tg-3uj0" colspan="6">NPWP
                        <br>PEMOTONG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;_____________________ -
                        _______ - _______
                        <br><br>NAMA<br>PEMOTONG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; PT. SURYA GLOBALINDO SEJAHTERA
                    </td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="6">A.&nbsp;&nbsp;IDENTITAS PENERIMA PENGHASILAN YANG DIPOTONG</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="3">1. NPWP :<br><br>2. NIK/NO PASPOR :<br><br>3. NAMA : {{ $cetak['nama'] }}<br><br>4.
                        ALAMAT : {{ $cetak['alamat'] }}<br><br>5. JENIS KELAMIN : {{ $cetak['kelamin'] }}</td>
                    <td class="tg-zp53" colspan="3">6. STATUS/JUMLAH TANGGUNGAN KELUARGA UNTUK PTKP<br>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Kawin&nbsp; : {{ $cetak['status'] }}
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggungan&nbsp;&nbsp;&nbsp; : {{ $cetak['tanggungan'] }}<br><br>7.&nbsp;&nbsp;&nbsp;NAMA
                        JABATAN : {{ $cetak['nama_jabatan'] }}<br><br>8.&nbsp;&nbsp;&nbsp;KARYAWAN ASING :<br><br>9.&nbsp;&nbsp;&nbsp;KODE NEGARA
                        DOMISILI :</td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="6">B.&nbsp;&nbsp;&nbsp;RINCIAN PENGHASILAN DAN PENGHITUNGAN PPh PASAL 21
                    </td>
                </tr>
                <tr>
                    <td class="tg-63jj" colspan="4">URAIAN</td>
                    <td class="tg-37c6" colspan="2">JUMLAH (Rp)</td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="4">KODE OBJEK PAJAK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td class="tg-hxn7" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="4">PENGHASILAN BRUTO&nbsp;&nbsp;: </td>
                    <td class="tg-hxn7" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">1. GAJI/PENSIUN ATAU THT/JHT</td>
                    <td class="tg-zp53" colspan="2">Rp {{ number_format($cetak['gaji'],0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">2. TUNJANGAN PPh</td>
                    <td class="tg-zp53" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">3. TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA</td>
                    <td class="tg-zp53" colspan="2">Rp {{ number_format($tunjangan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">4. HONORARI DAN IMBALAN LAIN SEJENISNYA</td>
                    <td class="tg-zp53" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">5. PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA</td>
                    <td class="tg-zp53" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-gbii" colspan="4">6. PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN
                        PEMOTONGAN PPh PASAL 21</td>
                    <td class="tg-zp53" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">7. TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR</td>
                    <td class="tg-3uj0" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">8. JUMLAH PENGHASILAN BRUTO (1 S.D 7)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($hasil_bruto,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="4">PENGURANGAN&nbsp;&nbsp;:</td>
                    <td class="tg-4f4e" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">9. BIAYA JABATAN/BIAYA PENSIUN</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($cetak->biaya_jabatan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">10. IURAN PENSIUN ATAU IURAN THT/JHT</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format(($cetak->jaminan_ht+$cetak->jaminan_p),0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">11. JUMLAH PENGURANGAN (9 S.D 10)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($potongan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-p0jh" colspan="4">PENGHITUNGAN PPh PASAL 21&nbsp;&nbsp;:</td>
                    <td class="tg-4f4e" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">12. JUMLAH PENGHASILAN NETO (8-11)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($cetak['penghasilan_bersih'],0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">13. PENGHASILAN NETO MASA SEBELUMNYA</td>
                    <td class="tg-3uj0" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-a30r" colspan="4">14. JUMLAH PENGHASILAN NETO UNTUK PENGHITUNGAN PPh PASAL 21
                        (SETAHUN/DISETAHUNKAN)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($penghasilan_setahun,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">15. PENGHASILAN TIDAK KENA PAJAK (PTKP)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($pajak_penghasilan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">16. PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (14 - 15)</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($pkp_setahun,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">17. PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($cetak->pajak_penghasilan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">18. PPh PASAL 21 YANG TELAH DIPOTONG SEBELUMNYA</td>
                    <td class="tg-3uj0" colspan="2"></td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">19. PPh PASAL 21 TERUTANG</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($cetak->pajak_penghasilan,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="tg-3uj0" colspan="4">20. PPh PASAL 21 DAN PPh PASAL 21 YANG TELAH DIPOTONG DAN DILUNASI</td>
                    <td class="tg-3uj0" colspan="2">Rp {{ number_format($cetak->pajak_penghasilan,0,',','.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>


