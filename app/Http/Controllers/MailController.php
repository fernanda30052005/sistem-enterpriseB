<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Log; // Tambahkan import Log

class MailController extends Controller
{
    public function test()
    {
        $users = User::all();
        foreach ($users as $user) {
            try {
                Mail::to($user->email)
                    ->send(new TestMail('SAYA AKAN MARAH'));
                Log::info('Email berhasil dikirim ke ' . $user->email);
            } catch (\Exception $e) {
                Log::error('Gagal mengirim email ke ' . $user->email . ': ' . $e->getMessage());
            }
        }
    }
}