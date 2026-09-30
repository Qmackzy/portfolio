<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage; // 1. Import Model ContactMessage

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'message' => 'required|string|min:10',
        ], [
            'name.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'message.required' => 'Pesan tidak boleh kosong.',
            'message.min'      => 'Pesan minimal berisi 10 karakter.',
        ]);

        // 2. Simpan pesan masuk ke database agar bisa dibaca via Filament Admin
        ContactMessage::create($validated);

        // 3. Kirim email ke inbox Anda via SMTP Gmail
        Mail::to('safrilisnaini45@gmail.com')->send(new ContactMessageMail($validated));

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim.');
    }
}
