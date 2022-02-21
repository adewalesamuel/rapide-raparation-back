<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Notifications\ContactForm;
use Illuminate\Support\Facades\Notification;

class FrontEndController extends Controller
{
    public function contact(ContactFormRequest $request) {

        try {
            $mail_data = $request->validated();

            Notification::route('mail', env("MAIL_CONTACT") ?? "info@rapide-raparation.ci")
            ->notify(new ContactForm($mail_data));

            $data  = ["success" => true];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function test() {
        return response()->json(["data" => "hello world"], 200);
    }
}
