<?php

use App\Models\Payroll;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:officer|headmaster')->group(function () {
        //teacher
        Route::view('teacher', 'pages.teachers.master-teacher')->name('teacher');
        Route::view('teacher/{teacher}/edit', 'pages.teachers.edit-teacher')->name('teacher.edit');

        //user
        Route::view('user', 'pages.users.master-user')->name('user');
        Route::view('user/create', 'pages.users.create-user')->name('user.create');
        Route::view('user/{user}/edit', 'pages.users.edit-user')->name('user.edit');

        //teaching hours
        Route::view('teaching_hours', 'pages.teaching-hours.master-teaching-hours')->name('teaching_hours');
        Route::view('teaching_hours/create', 'pages.teaching-hours.create-teaching-hours')->name('teaching_hours.create');
        Route::view('teaching_hours/{teaching}/edit', 'pages.teaching-hours.edit-teaching-hours')->name('teaching_hours.edit');

        //allowance
        Route::view('allowance', 'pages.allowances.master-allowance')->name('allowance');
        Route::view('allowance/create', 'pages.allowances.create-allowance')->name('allowance.create');
        Route::view('allowance/{allowance}/edit', 'pages.allowances.edit-allowance')->name('allowance.edit');

        //form payroll
        Route::view('payroll', 'payroll')->name('payroll');
        Route::view('payroll/report', 'master-payroll')->name('payroll.report');

        //absence
        Route::view('absence', 'pages.absences.absence')->name('absence');
    });

    Route::middleware('role:teacher')->group(function () {
        //teacher absence
        Route::view('teacher/absence', 'pages.absences.teacher-absence')->name('teacher.absence');

        //payroll
        Route::view('teacher/payroll', 'slip-payroll')->name('teacher.payroll');
    });
});

Route::get('/print-slip/{payroll}', function (Payroll $payroll) {
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML(view('prints.slip', ['payroll' => $payroll])->render());
    $mpdf->Output();
})->name('print-slip');
require __DIR__ . '/auth.php';
