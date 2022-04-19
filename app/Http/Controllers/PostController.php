<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::paginate(5);

        return response()->json([
            'status' => 200,
            'message' => 'all data',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = Post::find($id);

        return response()->json([
            'status' => 200,
            'message' => 'detail data',
            'data' => $data
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
            'created_by' => 'required|min:5'
        ],[
            'title.required' => 'Title harus di isi',
            'title.min' => 'Title minimal 20 karakter',
            'content.required' => 'Content harus di isi',
            'content.min' => 'Content minimal 200 karakter',
            'category.required' => 'Categori harus di isi',
            'category.min' => 'Category minimal 3 karakter',
            'status.required' => 'Harus memilih antara publish/draft/trash',
            'created_by.required' => 'Created By harus di isi',
            'created_by.min' => 'Created By minimal harus 5 karakter'
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'category' => request('category'),
            'status' => request('status'),
            'created_by' => request('created_by')
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'post created successfully'
        ]);
    }

    public function update($id)
    {
        $post = Post::find($id);

        request()->validate([
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
            'created_by' => 'required|min:5'
        ],[
            'title.required' => 'Title harus di isi',
            'title.min' => 'Title minimal 20 karakter',
            'content.required' => 'Content harus di isi',
            'content.min' => 'Content minimal 200 karakter',
            'category.required' => 'Categori harus di isi',
            'category.min' => 'Category minimal 3 karakter',
            'status.required' => 'Harus memilih antara publish/draft/trash',
            'created_by.required' => 'Created By harus di isi',
            'created_by.min' => 'Created By minimal harus 5 karakter'
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'category' => request('category'),
            'status' => request('status'),
            'created_by' => request('created_by')
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'post updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json([
            'status' => 200,
            'message' => 'post deleted successfully'
        ]);
    }
}
