<?php

namespace App\Http\Controllers;

use App\Mail\PostSubscription;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostSubscriptionController extends Controller
{
    public function run(Request $request, Post $post): RedirectResponse
    {
        $mail = new PostSubscription($post);

        Mail::to($request->input('email'))->send($mail);

        return redirect($post->url());
    }
}
