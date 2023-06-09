<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePost; //them vao
use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
    // private $posts = [
    //     1 => [
    //         'title' => 'title1',
    //         'content' => 'content1'
    //     ],
    //     2 => [
    //         'title' => 'title2',
    //         'content' => 'content2'
    //     ],
    //     3 => [
    //         'title' => 'title3',
    //         'content' => 'content3'
    //     ],
    //     4 => [
    //         'title' => 'title4',
    //         'content' => 'content4'
    //     ],
    //     5 => [
    //         'title' => 'title5',
    //         'content' => 'content5'
    //     ]
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('posts.index', ['posts' => $this->posts]);
        return view('posts.index', ['posts' => Post::all()]);
        // return view('posts.index', ['posts' => Post::orderBy('created_at', 'desc') -> take(5) -> get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $post = Post::create($validated);
        // $post = new Post();
        // $post -> title = $validated['title'];
        // $post -> content = $validated['content'];
        // $post -> save();

        $request->session()->flash('status', 'The post was created!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this ->posts[$id]), 404);
        // return view ('posts.show', ['post' => $this -> posts[$id]]);
        return view('posts.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'Post was updated!');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        session()->flash('status', 'Post "' . $post->title . '" was deleted!');
        return redirect()->route('posts.index');
    }
}
