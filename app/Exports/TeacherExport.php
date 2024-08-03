<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeacherExport implements FromCollection, WithHeadings
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
                'email' => $teacher->email,
                'position' => $teacher->profile->position,
                'status' => $teacher->profile->status
            ];
        });

        return $datas;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Jabatan',
            'Status'
        ];
    }
}
