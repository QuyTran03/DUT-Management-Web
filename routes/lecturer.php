<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\TeachingScheduleController;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PeriodController::class, 'form'])->name('index');
Route::get('/', [PeriodController::class, 'index'])->name('index');

Route::group([
    'prefix' => 'periods',
    'as' => 'periods.',
], static function () {
    Route::any('/form/{moduleId?}', [PeriodController::class, 'form'])->name('form');
    Route::post('/attendance', [PeriodController::class, 'attendance'])->name('attendance');
    Route::get('/history_attendance/{moduleId}', [PeriodController::class, 'historyAttendance'])->name('history_attendance');
    Route::post('/update_history_attendance', [PeriodController::class, 'updateHistoryAttendance'])->name('update_history_attendance');
});

Route::group([
    'prefix' => 'schedule_teaching',
    'as' => 'schedule_teaching.',
], static function () {
    Route::get('index', [TeachingScheduleController::class, 'index'])->name('index');
    Route::get('getSchedules', [TeachingScheduleController::class, 'getSchedules'])->name('getSchedules');
});
