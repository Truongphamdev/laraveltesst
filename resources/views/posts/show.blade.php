<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}">Back to list</a>
    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
</body>
</html>
