<?php

namespace App\Http\Controllers;

use App\Models\Threads;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function show(Threads $thread){

        return view('thread.show',compact('thread'));
    }

    public function store(Threads $thread){

        $validated = request()->validate([
            'title' => 'max:60',
            'content' => 'required|max:240',
            'image' => 'nullable|image',  // 'nullable' because image is optional
        ]);

        $thread = new Threads();
        $thread->user_id = Auth::id();

        $thread->title = $validated['title'];
        $thread->content = $validated['content'];

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imagePath = $image->store('post-image', 'public');
            $thread->image = $imagePath;
        } else {
            // If no image, set it as null
            $thread->image = null;
        }

        $thread->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Threads $thread){


        if(Auth::id() !== $thread->user_id){
            abort(404);
        }


        $thread->delete();

        return redirect()->route('dashboard');
    }

    public function edit(Threads $thread){

        if(Auth::id() !== $thread->user_id){
            abort(404);
        }

        $editing = true;

        return view('thread.show', compact('thread', 'editing'));
    }

    public function update(Threads $thread){

        if(Auth::id() !== $thread->user_id){
            abort(404);
        }


        $validated = request()->validate([
            'title' => 'max:60',
            'content' => 'required|max:240',
            'image' => 'nullable|image'
        ]);


        if(request()->hasFile('image')){

            $image = request()->file('image');
            $imagePath = $image->store('post-image', 'public');

            $thread->image = $imagePath;
        }



        $thread->user_id = Auth::id();
        $thread->content = request()->get('content', '');
        $thread->title = request()->get('title', '');
        $thread->save();

        return redirect()->route('threads.show',$thread->id);
    }
}
