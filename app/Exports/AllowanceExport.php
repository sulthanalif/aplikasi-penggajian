<?php

namespace App\Exports;

use App\Models\Allowance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllowanceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allowances = Allowance::all();

        $datas = $allowances->map(function ($allowance) {
            return [
                'id' => $allowance->id,
                'name' => $allowance->user->name,
                'classroom' => $allowance->classroom,
                'total' => 'Rp.'.number_format($allowance->total, 0, ',', '.'),
            ];
        });

        return $datas;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Wali Kelas',
            'Tunjangan',
        ];
    }
}
