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
