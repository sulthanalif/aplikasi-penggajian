<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachingHoursExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $teachers = User::role('teacher')->get();
        $datas = $teachers->map(function ($teacher) {
            return [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'hours' => $teacher->teachingHours->hours.' Jam',
                'total' => 'Rp.'.number_format($teacher->teachingHours->total, 0, ',', '.'),
            ];
        });

        return $datas;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Jam Mengajar',
            'Jumlah Gaji',
        ];
    }
}
