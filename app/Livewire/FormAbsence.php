<?php

namespace App\Livewire;

use App\Models\Absence;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FormAbsence extends Component
{
    public $absences;
    public $date;
    public $description;



    public function mount()
    {
        $this->date = Carbon::now()->format('Y-m-d');
        $this->absences = Absence::where('user_id', Auth::user()->id)->where('date', date('Y-m-d'))->get();
    }

    public function store()
    {
        $isAbsence = Absence::where('user_id', Auth::user()->id)->where('date', date('Y-m-d'))->first();
        // dd($isAbsence);
        if (!empty($isAbsence)) {
            $this->dispatch('warning');
        } else {
            Absence::create([
                'user_id' => Auth::user()->id,
                'date' => $this->date,
                'description' => $this->description
            ]);
            $this->dispatch('success');
        }
        $this->reset();
        $this->mount();
    }

    public function delete(Absence $absence)
    {
        $absence->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.form-absence');
    }
}
