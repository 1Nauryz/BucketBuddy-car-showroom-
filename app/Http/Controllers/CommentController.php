<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $req)
    {
        $validated = $req->validate([
            'content' => 'required',
            'car_id' => 'required|numeric|exists:cars,id',

        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('success', 'Comment is added');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('delete', 'Comment is deleted');

    }
}
