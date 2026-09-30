<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
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
Route::get('/fix-skills-table', function () {
    // Jalankan rekonstruksi tabel skills
    Schema::dropIfExists('skills');

    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->integer('percentage')->default(80);
        $table->string('icon')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });

    return 'Tabel skills berhasil diperbarui di Aiven!';
});
