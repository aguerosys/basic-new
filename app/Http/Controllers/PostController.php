<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\PostRequest;
use PhpParser\Node\Expr\AssignOp\Pow;
use App\Models\Post;
use Illuminate\Support\Facades\Storage; //se utiliza para poder usar los metodos de esa clase


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //

        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id,

        ] + $request->all() );
        //image

        if ($request->file('file')){
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        //retonar

        return back()->with('status', 'Creado con exito');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $post->update($request->all());

        if ($request->file('file')){
            //eliminar img
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        return back()->with('status', 'Actualizado con exito');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('status', 'Eliminado con exito');

    }
}
