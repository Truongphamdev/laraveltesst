<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Hiển thị danh sách các bài viết
    public function index()
    {
        $posts = Post::all(); // Lấy tất cả các bài viết từ cơ sở dữ liệu
        return view('posts.index', compact('posts')); // Truyền dữ liệu đến view
    }

    // Hiển thị form tạo bài viết mới
    public function create()
    {
        return view('posts.create'); // Trả về view chứa form tạo bài viết mới
    }

    // Lưu bài viết mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'title' => 'required', // Tiêu đề là bắt buộc
            'content' => 'required', // Nội dung là bắt buộc
        ]);

        // Tạo bài viết mới với dữ liệu từ form
        Post::create($request->all());

        // Chuyển hướng về danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    // Hiển thị chi tiết bài viết
    public function show(Post $post)
    {
        return view('posts.show', compact('post')); // Truyền dữ liệu bài viết đến view
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Truyền dữ liệu bài viết đến view để chỉnh sửa
    }

    // Cập nhật bài viết
    public function update(Request $request, Post $post)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'title' => 'required', // Tiêu đề là bắt buộc
            'content' => 'required', // Nội dung là bắt buộc
        ]);

        // Cập nhật bài viết với dữ liệu từ form
        $post->update($request->all());

        // Chuyển hướng về danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // Xóa bài viết
    public function destroy(Post $post)
    {
        // Xóa bài viết
        $post->delete();

        // Chuyển hướng về danh sách bài viết với thông báo thành công
        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
