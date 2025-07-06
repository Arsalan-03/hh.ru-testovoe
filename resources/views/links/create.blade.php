@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10">
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Создать короткую ссылку</h1>
    <form action="{{ route('links.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="original_url" class="block mb-2 font-semibold">Оригинальный URL</label>
            <input type="url" name="original_url" id="original_url" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="https://example.com">
            @error('original_url')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Создать</button>
    </form>
</div>
@endsection 