<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Product;
use Verta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('shared', '0')->orderBy('created_at', 'asc')->paginate('10');
        return view('Admin.Comment.index', compact('comments'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'body' => 'required',
            'rating' => 'required|numeric',
        ]);

        $Logined = auth()->user();
        if ($Logined) {
            $productId = $request->input('product');
            $rate = $request->input('rating');
            $product = Product::findOrFail($productId);
            $comment = Comment::create([
                'user_id' => $Logined->id,
                'product_id' => $product->id,
                'user_id' => $Logined->id,
                'body' => $request->body,
                'shared' => '0',
                'comment_rate' => $rate,
            ]);

            session()->flash('userComment', $comment);
            return redirect()->route('products.show', $product->name);
        } else
            return redirect()->route('index');
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
        $product = $comment->product()->first();
        $user = $comment->user()->first();
        return view('Admin.Comment.CommentEdit', compact('comment', 'user', 'product'));
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
        $status = $request['status'] ? $request['status'] : '0';
        $comment->update([
            'body'   => $request['body'],
            'shared' => $status,
        ]);
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index');
    }

    public function verify(Request $request)
    {
        $comment = Comment::find($request->input('comment'));
        if ($comment != null) {
            $updated = $comment->update(['shared' => '1']);
            return response()->json(['successfuly' => 'OK', 'comment' => $comment->id]);
        } else
            return response()->json(['successfuly' => 'NO']);
    }

    public function trashedComment()
    {
        $comments = Comment::where('shared', '2')->paginate('10');
        return view('Admin.Comment.CommentTrashed', compact('comments'));
    }

    public function moveToTrash(Comment $comment)
    {
        $comment->shared = '2';
        $comment->save();
        return redirect()->route('comment.index');
    }
}
