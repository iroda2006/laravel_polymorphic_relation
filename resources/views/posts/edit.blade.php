@extends('layouts.post')
@section('content')
@section('title','Posts Edit')

    <div class="container mt-5">
        <h1 class="text-center">Postni Tahrirlash</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Sarlavha</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Mazmun</label>
                <textarea class="form-control" id="content" name="content" rows="3" >{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>


    