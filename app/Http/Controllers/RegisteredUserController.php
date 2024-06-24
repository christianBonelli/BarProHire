<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;


class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('/auth.register');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'lastName' => ['required'],
            'description' => ['nullable', 'max:300'],
            'dateOfBirth' => ['nullable', 'before:today', 'after:1900-01-01'],
            'profilePic' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(5)],

        ]);
        Log::info('Dati ricevuti:', $request->all());
        Log::info('Attributi utente:', $userAttributes);

        // $userAttributes['dateOfBirth']= Carbon::createFromFormat('d-m-Y', $request->dateOfBirth)->format('Y-m-d');

        $user = User::create($userAttributes);


        if($request->hasFile('profilePic')){
            $profilePicPath = $request->profilePic->store('photos');
            $user->profilePic = $profilePicPath;

        }else{
            $user->profilePic= 'images/defaultImage.webp';
        }
        $user->save();

        Auth::login($user);
        return redirect('/')->with('success', 'Registrazione completata con successo!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     return view('auth.profile', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.editProfile', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $newDatauser = $request->validate([
            'profilePic'=>['nullable', File::types(['png', 'jpg', 'jpeg', 'webp', 'PNG', 'JPEG'])],
            'name'=>['nullable', 'max:30'],
            'lastName'=>['nullable', 'max:30'],
            'description'=>['nullable', 'max:300'],
            'dateOfBirth'=>['nullable', 'date', 'before:today', 'after:1900-01-01'],
            'email'=>['nullable', 'max:120'],

        ]);

        $user->update($newDatauser);

        if($request->hasFile('profilePic')){
            $profilePicPath = $request->profilePic->store('photos');
            $user->update([
                'profilePic'=>$profilePicPath
            ]);
        }


        return view('auth.editProfile',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $registeredUser = User::find($user);

        // if(!$user){
        //     return redirect()->back()->with('error', 'Profilo non trovato.');
        // }

        $user->forceDelete();
        return redirect('/')->with('success', 'Profilo eliminato con successo');

    }

}
