<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Skill;
use App\Models\Project;

Route::get('/', function () {
    $skills = Skill::all();
    $projects = Project::latest()->get();
    return view('welcome', compact('skills', 'projects'));
})->name('home');

// Route khusus untuk pengiriman form kontak
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/setup-admin', function () {
    $user = User::updateOrCreate(
        ['email' => 'safrilisnaini45@gmail.com'],
        [
            'name' => 'Nyong Phil',
            'password' => Hash::make('password123'),
        ]
    );

    return 'User Admin Berhasil Dibuat! Silakan login di /admin';
});
