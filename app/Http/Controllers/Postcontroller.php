<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Traits\Common;



class Postcontroller extends Controller
{
    use Common;

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
        // $data=$request->only($this->columns);
        // $data['published']=isset($request->published);
        // Post::create($data);
        // return redirect('posts');

        //session6, session7
        $messages = $this->messages();
        $data=$request->validate([
            'title'=>'required|string|max:100',
            'description'=>'required|string',
            'auther'=>'required|string|max:50',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],$messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
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
        //ssesion5
        // $data=$request->only($this->columns);
        // $data['published']=isset($request->published);
        // Post::where('id',$id)->update($data);
        // return redirect('posts');

        //session7
        $messages = $this->messages();
        $data=$request->validate([
            'title'=>'required|string|max:100',
            'description'=>'required|string',
            'auther'=>'required|string|max:50',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',

        ],$messages);
        $image = $request->file('image');
       if($image){
       $fileName = $this->uploadFile($image, 'assets/images');
       $data['image'] = $fileName;
       }else{
        $post= Post::findOrFail($id);
        $data['image']=$post->image;
       }
        //$fileName = $this->uploadFile($request->image, 'assets/images');
        //$data['image'] = $fileName;
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
        Post::where('id',$id)->delete();
        return redirect('posts');
    }
    public function trashed(){
        $posts =Post::onlyTrashed()->get();
        return view('trashed', compact('posts'));
    }
    public function forceDelete($id)
    {
        Post::where('id',$id)->forceDelete();
        return redirect('posts');
    }

    public function restore($id)
    {
        Post::where('id',$id)->restore();
        return redirect('posts');
    }

    public function messages(){
        return[
                'title.required'=>'العنوان مطلوب',
                'title.string'=>'Should be string',
                'description.required'=> 'should be text',
                'auther.required'=>'write auther',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size exceeded',
        ];
    }

}

