<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail; // Tambahkan ini

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        try {
            // Siapkan data untuk email
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ];

            // Kirim email
            Mail::raw("
                Name: {$data['name']}
                Email: {$data['email']}
                Subject: {$data['subject']}
                
                Message:
                {$data['message']}
            ", function($message) use ($data) {
                $message->to('damarnugroho199@gmail.com')
                        ->from($data['email'], $data['name'])
                        ->subject("Contact Form: {$data['subject']}");
            });

            // Return response untuk AJAX
            if($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Email berhasil dikirim!'
                ]);
            }

            // Return untuk non-AJAX
            return back()->with('success', 'Email berhasil dikirim!');
        } catch (\Exception $e) {
            Log::error('Mail Error: ' . $e->getMessage());
            
            if($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mengirim email: ' . $e->getMessage()
                ], 500);
            }
            }

            return back()
                ->withInput()
                ->withErrors(['email' => 'Gagal mengirim email: ' . $e->getMessage()]);
    }
}
