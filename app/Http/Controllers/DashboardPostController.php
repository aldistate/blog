<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data yg mau di input ke database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        // kondisi
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // memasukan data sesuai dengan user yg sedang login
        $validatedData['user_id'] = auth()->user()->id;
        // membuat excerpt dengan limit 100 huruf ke dalam tabel database
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        // mengirim data ke model post
        Post::create($validatedData);

        // redirect ke halaman my posts
        return redirect('/dashboard/posts')->with('sukses', 'Data berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
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
        // validasi data yg mau di update ke database
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
        ];

        // kondisi jika yg diinput tidak sama dengan yg didatabase
        // jika sama, slug yg diinput tidak harus unik
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // memasukan data sesuai dengan user yg sedang login
        $validatedData['user_id'] = auth()->user()->id;
        // membuat excerpt dengan limit 100 huruf ke dalam tabel database
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        // mengirim(update) data ke model post
        Post::where('id', $post->id)
            ->update($validatedData);

        // redirect ke halaman my posts
        return redirect('/dashboard/posts')->with('sukses', 'Data berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // mengahapus postingan berdasarkan id dari model Post
        Post::destroy($post->id);

        // redirect ke halaman my post beserta feedback hapusnya
        return redirect('/dashboard/posts')->with('sukses', 'Post berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
