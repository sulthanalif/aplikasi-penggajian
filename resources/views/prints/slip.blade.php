<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji</title>

    <style>
        table.atas {
            border-collapse: collapse;
            width: 100%;
            float: left;
        }

        table.bawah {
            border-collapse: collapse;
            width: 100%;
            float: right;
            border: none;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #030303;
        }

        th.atas {
            background-color: #f2f2f2;
        }

        th.bawah {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2 align="center">SLIP GAJI</h2>

    <table class="atas">
        <tr>
            <th class="atas">
                Sekolah
            </th>
            <td class="atas" colspan="3">SMA Bina Muda</td>
        </tr>
        <tr>
            <th class="atas">Nama Guru</th>
            <td class="atas" style="font: bold">{{ $payroll->user->name }}</td>
            <th class="atas">Tanggal</th>
            <td class="atas">{{ \Carbon\Carbon::parse($payroll->date)->format('d M Y') }}</td>
        </tr>
        <tr>
            <th class="atas">Jabatan</th>
            <td class="atas">{{ $payroll->user->profile->position ?? '-' }}</td>
            <th class="atas">Status</th>
            <td class="atas">{{ $payroll->user->profile->status ?? '-' }}</td>
        </tr>
        <tr>
            <th class="atas" colspan="2">Gaji Pokok</th>
            <th class="atas" colspan="2">Potongan</th>
        </tr>
        <tr>
            <td class="atas">Gaji</td>
            <td class="atas">Rp.{{ number_format(($payroll->user->teachingHours->total ?? 0 ), 0, ',', '.') }}</td>
            <td class="atas">Sumbangan</td>
            <td class="atas">Rp.{{ number_format(($payroll->receipt_or_donation ?? 0 ), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="atas">Tunjangan</td>
            <td class="atas">Rp.{{ number_format(($payroll->user->allowance->total ?? 0 ), 0, ',', '.') }}</td>
            <td class="atas">Tabungan</td>
            <td class="atas">Rp.{{ number_format(($payroll->savings ?? 0 ), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="atas"></td>
            <td class="atas"></td>
            <td class="atas">LAZ</td>
            <td class="atas">Rp.{{ number_format(($payroll->cooperative ?? 0 ), 0, ',', '.') }}</td>
        </tr>
        {{-- <tr>
            <td class="atas"></td>
            <td class="atas"></td>
            <td class="atas">Bank</td>
            <td class="atas">Rp.{{ number_format(($payroll->bank ?? 0 ), 0, ',', '.') }}</td>
        </tr> --}}
        <tr>
            <th class="atas">Total Gaji</th>
            <th class="atas">Rp.{{ number_format($payroll->total_salary, 0, ',', '.') }}</th>
            <th class="atas">Total Potongan</th>
            <th class="atas">Rp.{{ number_format(($payroll->receipt_or_donation + $payroll->savings + $payroll->cooperative + $payroll->bank), 0, ',', '.') }}</th>
        </tr>
        <tr>
            <th class="atas">Total Gaji Bersih</th>
            <th class="atas" colspan="3">Rp.{{ number_format($payroll->total_payroll, 0, ',', '.') }}</th>
        </tr>
        </table>
        <table class="bawah">
            <tr>
                <td align="right">
                    Bandung, {{ \Carbon\Carbon::parse($payroll->date)->format('d M Y') }}<br>
                    Keuangan
                </td>
            </tr>
            <tr>
                <td height="90px"></td>
            </tr>
            <tr>
                <td align="right">
                    (..................................)
                </td>
            </tr>
        </table>
</body>
</html>

