<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(User $user)
    {

        $userID = auth()->id(); // or auth()->user()->id;

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:8', // confirmed is for the user to confirm the password should be written in this form password and password-confirmation in the two fields can be any name in the first field test and test-confirmation //nullable means its optional
            'image' => 'mimes:jpeg,jpg,png'
        ]);


        // used has to check if the user entered a password in the form bec it is not required
        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if (request()->hasFile('image')) {
            $path = request('image')->store('users'); // store() saves the image to a folder called users in the storage folder
            $data['image'] = $path;
        }

        User::findOrFail($userID)->update($data);

        return back();
    }
}
