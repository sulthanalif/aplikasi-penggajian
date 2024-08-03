<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayrollExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $payrolls = Payroll::orderBy('date', 'asc')->get();
        $datas = $payrolls->map(function ($payroll) {
            return [
                'date' => $payroll->date,
                'name' => $payroll->user->name,
                'total_salary' => number_format($payroll->total_salary, 0, ',', '.'),
                'receipt_or_donation' => number_format($payroll->receipt_or_donation, 0, ',', '.'),
                'savings' => number_format($payroll->savings, 0, ',', '.'),
                'cooperative' => number_format($payroll->cooperative, 0, ',', '.'),
                'bank' => number_format($payroll->bank, 0, ',', '.'),
                'total_payroll' => number_format($payroll->total_payroll, 0, ',', '.'),
            ];
        });

        return $datas;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama',
            'Besaran Gaji',
            'Sumbangan',
            'Tabungan',
            'Koperasi',
            'Bank',
            'Total Gaji Bersih',
        ];
    }
}
