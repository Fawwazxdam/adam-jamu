<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MENAMPILKAN SEMUA POSTINGAN DI HALAMAN POSTINGAN
        $data = Post::all();
        $data2 = Kategori::all();
        return view('post', compact('data','data2'));
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
        //MENAMBAHKAN DATA POSTINGAN
        $data = $request->all();
        Post::create($data);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //EDIT DATA POSTINGAN
        $data = $request->all();
        try {
            $data['status'] = $request->status;
            $post->update($data);
        } catch (\Throwable $th) {
            $data['status'] = $post->status;
            $post->update($data);
        }
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //MENGHAPUS DATA POSTINGAN
        $post->delete();
        return redirect('post');
    }
}
