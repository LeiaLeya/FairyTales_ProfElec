@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Upload Character Image</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('characters.upload.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="character_id" class="form-label">Character</label>
            <select name="character_id" id="character_id" class="form-select" required>
                @foreach ($characters as $char)
                    <option value="{{ $char->id }}">{{ $char->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>
@endsection
