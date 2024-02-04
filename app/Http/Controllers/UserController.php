<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin/users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required',
        ]);

        $data['active'] = isset($request->active);
        $data['email_verified_at'] = Carbon::now();

        User::create($data);

        return redirect('admin/users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin/editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'sometimes',
        ]);

        $data['active'] = isset($request->active);

        if($request->password != null)
            $data['password'] = $request->password;
        else
            unset($data['password']);

        User::where('id', $id)->update($data);

        return redirect('admin/users');
    }

}
