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
                <h4 style="text-align:left">NPWP :&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp.&nbsp&nbsp&nbsp<br>
                    <hr><br> Masa Pajak :
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
                                    ?>{{ $bulan_ini }} &nbsp&nbsp&nbsp&nbsp&nbsp Tahun : {{ $tahun }} <h4>
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
            <th style="text-align:center">Pajak Penghasilan Per Bulan</th>
        </tr>
        <?php
            $total = 0;
        ?>
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
            <td style="text-align: center">{{ $data->tanggungan }} Tanggungan</td>
            <td style="text-align:center">Rp {{ number_format($data->penghasilan_bruto,0,',','.') }}</td>
            <td style="text-align:center">Rp{{ number_format($data->penghasilan_bruto-$data->penghasilan_bersih,0,',','.') }}</td>
            <?php
                $pajak = $data->pajak_penghasilan/12;
                $total = $pajak + $total;
                // $total_pajak = array_sum(array ($pajak));
            ?>
            <td style="text-align:center">Rp {{ number_format($pajak,0,',','.') }}</td>

        </tr>
        @endforeach
        <tr>
            <th colspan="6">Total Pajak Penghasilan Karyawan</th>
            <th style="text-align:center">Rp {{ number_format($total,0,',','.') }}</th>
        </tr>
    </table>
</body>

</html>
