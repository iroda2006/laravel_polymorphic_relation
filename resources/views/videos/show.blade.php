@extends('layouts.video')
@section('content')
@section('title','Video Details')

    <div class="container mt-5">
        <h1 class="text-center">Video tafsilotlari</h1>
        <div class="card mb-3">
            <div class="card-header">
                Video: {{ $video->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Video URL: <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></h5>
                <h5 class="card-title">Video Sarlavhasi: {{ $video->title }}</h5>
                <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">Tahrirlash</a>
                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">O'chirish</button>
                </form>
            </div>
        </div>

        <!-- Izohlar qismi -->
        <div class="comments-section">
            <!-- Izoh qo'shish formasi -->
            <h4 class="mt-4">Izoh qoldirish</h4>
            <form action="{{ route('storevideo', $video->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Ismingiz</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Izohingiz</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
            </form>
            
            <br>
            <h2>Izohlar</h2>
        
            <!-- Mavjud izohlar -->
            @if($video->comments->count())
                @foreach($video->comments as $comment)
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
        </div>
        
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



    