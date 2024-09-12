<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    // Phương thức 'up' được gọi khi bạn chạy lệnh migrate.
    public function up()
    {
        // Tạo bảng 'posts'
        Schema::create('posts', function (Blueprint $table) {
            // Thêm một cột id, kiểu integer tự động tăng
            $table->id();

            // Thêm cột 'title' với kiểu dữ liệu string
            $table->string('title');

            // Thêm cột 'content' với kiểu dữ liệu text
            $table->text('content');

            // Thêm cột 'created_at' và 'updated_at', tự động quản lý thời gian
            $table->timestamps();
        });
    }

    // Phương thức 'down' được gọi khi bạn chạy lệnh migrate:rollback
    public function down()
    {
        // Xóa bảng 'posts' nếu nó tồn tại
        Schema::dropIfExists('posts');
    }
}
