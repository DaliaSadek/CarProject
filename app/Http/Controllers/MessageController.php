<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        return view('admin/messages', compact('messages'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Message::findOrFail($id);
        Message::where('id', $id)->update(['messageRead' => 1]);

        return view('admin/showMessage', compact('contact'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));

        $data['messageRead'] = 0;

        Message::create($data);
        return redirect('index');

    }

    public function destroy(string $id)
    {
        Message::where('id', $id)->delete();

        return redirect('admin/messages');
    }

}
