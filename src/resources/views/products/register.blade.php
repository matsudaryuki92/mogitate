@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="body-title">
        <h3 class="product-list">
            商品登録
        </h3>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="product-form">
            <label for="name">商品名</label>
            <span class="caution">必須</span>
            <input type="text" id="name" name="name">
            @error('name')
            <div>{{ $message }}</div>
            @enderror

            <label for="price">値段</label>
            <span class="caution">必須</span>
            <input type="text" id="price" name="price">
            @error('price')
            <div>{{ $message }}</div>
            @enderror

            <label for="image">商品画像</label>
            <span class="caution">必須</span>
            <input type="file" id="image" name="image">
            @if(!empty($imageUrl))
            <img src="{{ $imageUrl }}" alt="指定画像" class="product-image" width="200" height="200">
            @endif
            @error('image')
            <div>{{ $message }}</div>
            @enderror

            <label for="season">季節</label>
            <span class="caution">必須</span>
            <input type="checkbox" id="season" name="season[]" value="春">春
            <input type="checkbox" id="season" name="season[]" value="夏">夏
            <input type="checkbox" id="season" name="season[]" value="秋">秋
            <input type="checkbox" id="season" name="season[]" value="冬">冬
            @error('season')
            <div>{{ $message }}</div>
            @enderror

            <label for="description">商品説明</label>
            <span class="caution">必須</span>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
            <button type="submit">登録</button>
            @error('description')
            <div>{{ $message }}</div>
            @enderror
        </div>
    </form>
    <div>
        <button>
            <a href="{{ route('products.index') }}">戻る</a>
        </button>
    </div>
    @endsection