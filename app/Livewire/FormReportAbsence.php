<?php

namespace App\Livewire;

use App\Exports\AbsenceExport;
use App\Models\Absence;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class FormReportAbsence extends Component
{
    public $date;
    public $month;
    public $start_date;
    public $end_date;
    public $year;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function exportDaily()
    {
        return Excel::download(new AbsenceExport('harian', [
            'date' => $this->date
        ]), 'absensi_harian_'.Carbon::parse($this->date)->format('Y-m-d').'.xlsx');
    }

    public function exportMonthly()
    {
        // dd($this->months);
        return Excel::download(new AbsenceExport('bulanan', [
            'month' => $this->month,
            'year' => $this->year
        ]), 'absensi_bulanan_'.$this->month.'_'.$this->year.'.xlsx');
    }

    public function exportYearly()
    {
        return Excel::download(new AbsenceExport('tahunan', [
            'year' => $this->year
        ]), 'absensi_tahun_'.now()->format('Y').'.xlsx');
    }

    public function exportDateRange()
    {
        return Excel::download(new AbsenceExport('range', [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]), 'absensi_range_'.$this->start_date.'_'.$this->end_date.'.xlsx');
    }

    public function render()
    {
        $months = Absence::selectRaw('MONTH(date) as month')->groupBy('month')->orderBy('month')->pluck('month');
        $years = Absence::selectRaw('YEAR(date) as year')->groupBy('year')->orderBy('year')->pluck('year');

        return view('livewire.form-report-absence', compact('months', 'years'));
    }
}
