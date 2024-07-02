<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ComposeEmailModel;
use App\Mail\ComposeEmailMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function EmailComposer()
    {
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.email.compose', $data);
    }
    public function EmailComposerPost(Request $request)
    {

        // Inputtaki formları compose_email tablosuna kayıt ettik
        $save = new ComposeEmailModel;
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->descriptions = trim($request->descriptions);
        $save->save();
        // Email başlangıç
        $getUserEmail = User::where('id', '=', $request->user_id)->first();
        Mail::to($getUserEmail->email)->cc($request->cc_email)->send(new ComposeEmailMail($save));
        // Email bitiş

        return redirect()->back()->with('success', 'Mesajınız gönderildi.');
    }

    public function EmailSent(Request $request)
    {
        $data['getRecord'] = ComposeEmailModel::get();
        return view('admin.email.sent', $data);
    }

    public function EmailSentDelete(Request $request)
    {

        if (!empty($request->id)) {
            $option = explode(',', $request->id);
            foreach ($option as $id) {
                if (!empty($id)) {
                    $getRecord = ComposeEmailModel::find($id);
                    $getRecord->delete();
                }
            }
        }
        return redirect()->back()->with('success', 'Gönderilen mail başarıyla veritabanından silidi.');
    }
}