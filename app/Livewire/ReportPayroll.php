<?php

namespace App\Livewire;

use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\PayrollExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\Facade\Pdf;

class ReportPayroll extends Component
{
    use WithPagination;
    public $search = '';

    public function print()
    {
        session()->flash('status', 'Data Berhasil DiDownload!');
        return Excel::download(new PayrollExport, 'Laporan_Pembayaran_Gaji_Guru_'.date('Y-m-d').'.xlsx');
    }

    public function render()
    {
        if (Auth::user()->roles->first()->name == 'teacher') {
            $payrolls = Payroll::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('date', 'like', '%' . $this->search . '%')
                          ;
                })
                ->where('user_id', Auth::user()->id)
                ->latest()
                ->paginate(10);
        } else {
            $payrolls = Payroll::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->latest()
                ->paginate(10);
        }

        return view('livewire.report-payroll', compact('payrolls'));
    }
}
