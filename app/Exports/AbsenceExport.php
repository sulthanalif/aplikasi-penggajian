<?php

namespace App\Exports;

use App\Models\Absence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenceExport implements FromCollection, WithHeadings
{
    protected $type;
    protected $data;

    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->type == 'bulanan') {
            $query = Absence::query()
                ->whereYear('date', $this->data['year'])
                ->whereMonth('date', $this->data['month'])
                ->latest()->get();
        } elseif ($this->type == 'harian') {
            $query = Absence::query()
                ->where('date', $this->data['date'])
                ->latest()->get();
        } elseif ($this->type == 'tahunan') {
            $query = Absence::query()
                ->whereYear('date', $this->data['year'])
                ->latest()->get();
        } else {
            $query = Absence::query()
                ->where('date', '>=', $this->data['start_date'])
                ->where('date', '<=', $this->data['end_date'])
                ->latest()->get();
        }

        $datas = $query->map(function ($absence) {
            return [
                'date' => $absence->date,
                'name' => $absence->user->name,
                'description' => $absence->description,
            ];
        });

        return $datas;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama',
            'Keterangan',
        ];
    }
}
