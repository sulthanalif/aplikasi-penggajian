<?php

namespace App\Livewire;

use App\Models\Payroll;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class FormPayroll extends Component
{
    public $teachers;
    public $user_id;
    public $date;
    public $total_salary = 0;
    public $receipt_or_donation = 0;
    public $savings = 0;
    public $cooperative = 0;
    public $bank = 0;
    public $total_payroll = 0;

    public function mount()
    {
        $this->teachers = User::role('teacher')->get(); // atau dengan relasi yang sesuai
        $this->date = Carbon::now()->format('Y-m-d');
    }

    public function updatedUserId($userId)
    {
        $teacher = User::find($userId);
        if ($teacher) {
            $this->total_salary = ($teacher->teachingHours->total ?? 0) + ($teacher->allowance->total ?? 0);
            $this->calculateTotalPayroll();
        } else {
            $this->total_salary = 0;
        }
    }

    public function calculateTotalPayroll()
    {
        $this->total_payroll = (float)$this->total_salary -
            ((float)$this->receipt_or_donation + (float)$this->savings + (float)$this->cooperative + (float)$this->bank);
    }

    public function updatedReceiptOrDonation()
    {
        $this->calculateTotalPayroll();
    }

    public function updatedSavings()
    {
        $this->calculateTotalPayroll();
    }

    public function updatedCooperative()
    {
        $this->calculateTotalPayroll();
    }

    public function updatedBank()
    {
        $this->calculateTotalPayroll();
    }

    public function store()
    {
        $payroll = Payroll::create([
            'user_id' => $this->user_id,
            'date' => $this->date,
            'total_salary' => $this->total_salary,
            'receipt_or_donation' => $this->receipt_or_donation,
            'savings' => $this->savings,
            'cooperative' => $this->cooperative,
            'bank' => $this->bank,
            'total_payroll' => $this->total_payroll
        ]);

        $this->reset([
            'user_id',
            'total_salary',
            'receipt_or_donation',
            'savings',
            'cooperative',
            'bank',
            'total_payroll',
        ]);
    }

    public function render()
    {
        return view('livewire.form-payroll');
    }
}
