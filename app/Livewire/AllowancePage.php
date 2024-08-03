<?php

namespace App\Livewire;

use App\Exports\AllowanceExport;
use App\Models\Allowance;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AllowancePage extends Component
{
    use WithPagination;

    public $search = '';


    public function delete(Allowance $allowance)
    {
        $allowance->delete();

        session()->flash('status', 'Allowance has been deleted successfully!');
    }

    public function export()
    {
        session()->flash('status', 'Data Berhasil DiDownload!');
        return Excel::download(new AllowanceExport, 'Data_Tunjangan_Wali_Kelas'.date('d-m-Y').'.xlsx');
    }

    public function render()
    {
        $allowances = Allowance::whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('classroom', 'like', '%' . $this->search . '%');
        })->latest()->paginate(5);
        return view('livewire.allowance-page', compact('allowances'));
    }
}
