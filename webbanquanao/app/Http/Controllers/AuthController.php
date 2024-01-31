<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.users.user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(bcrypt('12345678'));
        $remember = $request->has('remember_token') ? true : false;
        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ], $remember)){
            return view('dashboard.admin.trangchu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
