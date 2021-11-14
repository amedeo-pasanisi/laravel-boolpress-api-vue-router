<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
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
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required|max:100',
            'category_id'=>'nullable|exists:categories,id', // il category_id inserito, esiste nella tabella categories?
            'tags' => 'exists:tags,id'
        ]);

        $new_post = new Post;
        $new_post->fill($form_data);
        
        $slug = Str::slug($new_post->title, '-');
        $slug_base = $slug;
        $slug_presente = Post::where('slug', $slug)->first(); // tra i post, nella colonna 'slug',cerca lo slug uguale a quello creato con il nuovo post
        $contatore = 1;
        while ($slug_presente) { // finchè esiste un post con lo slug uguale a quello creato:
            $slug = $slug_base . '-' . $contatore; // aggiungi un suffisso,
            $slug_presente = Post::where('slug', $slug)->first(); // controlla se è ancora presente uno slug uguale
            $contatore++;
        }

        $new_post->slug = $slug;
        $new_post->save();

        $new_post->tags()->attach($form_data['tags']);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Select * from posts where slug = $slug
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        if ($data['title'] != $post['title']) {
            $slug = Str::slug($data['title'], '-');
            $slug_base = $slug;
            $slug_presente = Post::where('slug', $slug)->first();
            $contatore = 1;
            while ($slug_presente) {
                $slug = $slug_base . '-' . $contatore;
                $slug_presente = Post::where('slug', $slug)->first();
                $contatore++;
            }
            $data['slug'] = $slug;
        }

        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required|max:100',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'exists:tags,id'
        ]);

        $post->update($data);

        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }
        else{
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'post deleted');
    }
}
