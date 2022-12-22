<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req)
    {
        $this->authorize('create', Comment::class);
        $validated = $req->validate([
            'content' => 'required',
            'car_id' => 'required|numeric|exists:cars,id',

        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('successCom', 'Comment is added');
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('delete', 'Comment is deleted');

    }
}
