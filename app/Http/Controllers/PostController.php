<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {

        $posts = Post::latest()->with(['user','likes'])->paginate(10);///collection

        return view('posts.index',['posts' => $posts]);
    }

    public function store(Request $request) {

        $this->validate($request,
            [
                'body' => 'required'
            ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post) {

//        if(!$post->ownedBy(auth()->user())){
//            ///ako se pokušava brisati a nisu onog koji je prijavljen
//            dd('Not authenticated!!!');
//        }

        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
