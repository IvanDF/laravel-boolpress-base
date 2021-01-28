<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // dd($posts);
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // Get all tags

        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get data from form
        $data = $request->all();
        // dd($data);

        // Validation
        $request->validate($this->ruleValidate());

        // Set Slug
        $data['slug'] = Str::slug($data['title'], '-');

        // Image ceck
        if (!empty($data['img_url'])) {
            // Move and set image for public
            $data['img_url'] = Storage::disk('public')->put('images', $data['img_url']);
        }

        // Save to DB
        $newPost = new Post();
        $newPost->fill($data); // fillable model
        $saved = $newPost->save();

        // Info 
        if ($saved) {
            if (!empty($data['tags'])) {
                $newPost->tags()->attach($data['tags']);
            }
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();

        $this->erorrPages($post);

        return view('posts.show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Get data from form
        $data = $request->all();

        // Validation
        $request->validate($this->ruleValidate());

        // Change slug
        $data['slug'] = Str::slug($data['title'], '-');

        // Change img
        if(!empty($data['img_url'])) {
            if(!empty($post->img_url)) {
                Storage::disk('public')->delete($post->img_url);
            }
            $data['img_url'] = Storage::disk('public')->put('images', $data['img_url']);         
        }

        // Save to DB
        $updated = $post->update($data); // For fillalbe model

        if ($updated) {
            if (!empty($data['tags'])) {
                $post->tags()->sync($data['tags']);
            } else {
                $post->tags()->detach();
            }
            return redirect()->route('posts.show', $post->slug);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $ref = $post->title;
        $post->tags()->detach();
        $deleted = $post->delete();

        if ($deleted) {
            if(!empty($image)) {
                Storage::disk('public')->delete($image);
            }
            return redirect()->route('posts.index')->with('deleted', $ref);
        }
    }

    // Validation Rule
    private function ruleValidate() {
        return [
            'title' => 'required',
            'body' => 'required',
            'img_url' => 'image',
            'author' => 'required',
        ];
    }
    private function erorrPages($var) {
        if(empty($var)) {
            abort(404);
        }
    }
}
