<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror

        <label for="content">Content:</label>
        <textarea id="content" name="content">{{ old('content') }}</textarea>
        @error('content')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Save</button>
    </form>
    <a href="{{ route('posts.index') }}">Back to List</a>
</body>
</html>
