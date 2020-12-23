<?php

namespace App\Http\Controllers;
use Session;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


//        $request->validate([
//            'body'=>'required',
//        ]);
//
//        $input = $request->all();
//        $input['user_id'] = auth()->user()->id;
//
//        Comment::create($input);
//




        $request->validate([
            'comm'=>'required',
        ]);

//        $input = $request->all();

//        $post = Post::findOrFail($request->post_id);
//
//        Comment::create([
//            'body' => $request->body,
//            'user_id' => Auth::id(),
//            'post_id' => $post->id
//        ]);
//

        $user = Auth::user();
        $com = new Comment();
        $com->comm = $request->input('comm');
        $com-> post_id = $request->input('post_id');
        $com->user_id = $user->id;
        $com->save();

        Session::flash('success', '  تم اضافة التعليق  !');
//        return redirect()->back()->with('success', 'your message,here');
        return redirect()->back();
//        return redirect()->route('post.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
