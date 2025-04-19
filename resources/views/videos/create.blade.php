@extends('layouts.video')
@section('content')
@section('title','Video Create')

    <div class="container mt-5">
        <h1 class="text-center">Yangi video qo'shish</h1>
        <form action="{{route('videos.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Video Sarlavhasi</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="url" name="url" >
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
            <a href="{{route('videos.index')}}" class="btn btn-secondary">Orqaga</a>
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



    