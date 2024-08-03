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
                'total_salary' => $payroll->total_salary,
                'receipt_or_donation' => $payroll->receipt_or_donation,
                'savings' => $payroll->savings,
                'cooperative' => $payroll->cooperative,
                // 'bank' => $payroll->bank,
                'total_payroll' => $payroll->total_payroll,
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
            'LAZ',
            // 'Bank',
            'Total Gaji Bersih',
        ];
    }
}
