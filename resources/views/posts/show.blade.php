@extends('layouts.post')
@section('content')
@section('title','Posts Detail')


    <div class="container mt-5">
        <h1 class="text-center">Post Tafsilotlari</h1>

        <div class="card mb-5">
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Post sarlavhasi: {{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>

                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Tahrirlash</a>
                
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Postni o‘chirmoqchimisiz?')">O'chirish</button>
                </form>
            </div>
        </div>

        <!-- Izoh qo'shish -->
        <h4 class="mt-4">Izoh qoldirish</h4>
        <form action="{{ route('storepost', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_name" class="form-label">Ismingiz</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Izohingiz</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>

        <!-- Mavjud izohlar -->
        <br><h2>Izohlar</h2>

        @if($post->comments->count())
            @foreach($post->comments as $comment)
                <div class="comment mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->name }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            
                            <!-- Izohni o‘chirish -->
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Izohni o‘chirmoqchimisiz?')">O'chirish</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Hozircha izohlar mavjud emas.</p>
        @endif
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


    
   