<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show (User $user){


        $threads = $user->threads()->orderBy('created_at', 'desc')->paginate(5);

        return view('users.show', compact('user','threads'));
    }

    public function edit (User $user){
        return view('users.edit', compact('user'));
    }

    public function update (User $user){
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'image' => 'nullable|image',
            'bio' => 'nullable|max:240',
        ]);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? "");
        }

        $user->update($validated);

        return redirect()->route('profile');


    }

    public function profile (User $user){

        return $this->show(Auth::user());

    }


}
