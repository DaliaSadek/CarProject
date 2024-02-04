<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

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
        return view('admin/showMessage', compact('contact'));
    }

    public function destroy(string $id)
    {
        Message::where('id', $id)->delete();

        return redirect('admin/messages');
    }

}
