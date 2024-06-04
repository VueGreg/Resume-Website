<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Http\Requests\EmailRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store(EmailRequest $request): JsonResponse
    {

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'mail' => $request->mail,
            'message' => $request->message,
        ];

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OrderShipped($data));
            return response()->json(['message' => 'mail envoyé', 'code' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th, 'code' => 500]);
        }
    }
}
