<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('dashboard');
    }

    ///create markdown for customise emails
    ///  pa make:mail PostLiked --markdown=emails.posts.post_liked
}
