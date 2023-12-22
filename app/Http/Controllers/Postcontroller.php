<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class Postcontroller extends Controller
{
    private $columns =['title', 'description', 'published', 'auther'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::get();
        return view('posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addposts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //session4
        // $post = new Post();
        // $post->title= $request->title;
        // $post->description= $request->description;
        // if(isset($request->published)){
        //     $post->published=1;
        // }else{
        //     $post->published=0;
        // }
        // $post->auther= $request->auther;
        // $post->save();
        // return 'data added successfully';

        //session5
        $data=$request->only($this->columns);
        $data['published']=isset($request->published);
        Post::create($data);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('showposts',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('updateposts',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->only($this->columns);
        $data['published']=isset($request->published);
        Post::where('id',$id)->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

