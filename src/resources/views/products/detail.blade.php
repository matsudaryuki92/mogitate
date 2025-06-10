@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div>
    <div class="body-tag">
        <a href="{{ route('products.index') }}">商品一覧</a>
        <span>></span>
        <span>{{ $product->name }}</span>
    </div>
</div>
<div class="container">
    <div class="body-title">
        <h3 class="product-list">
            商品詳細
        </h3>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="product-detail">
            <div>
                <img src="{{ asset('/storage/' . $product->image) }}" alt="商品画像" name="image" class="product-image" width="200" height="200">
                <input type="file" name="image" class="product-image">
                @error('image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="text" class="product-name" name="name" value=" {{ $product->name }}">
                @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <input type="text" class="product-price" name="price" value="{{ number_format($product->price) }}">
                @error('price')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="season">季節</label>
                @foreach ($seasons as $season)
                <input type="checkbox" id="season-{{ $season->id }}" name="season[]" value="{{ $season->name }}"
                    {{ $product->seasons->contains('id', $season->id) ? 'checked' : '' }}>
                {{ $season->name }}
                @endforeach
                @error('season')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label for="description">商品説明</label>
                <textarea id="description" name="description" rows="4" cols="50">{{ $product->description }}</textarea>
                @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="edit-product">変更を保存</button>
    </form>

    <a href="{{ route('products.index') }}" class="add-product">戻る</a>


    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
    </form>

    <script src="{{ asset('/js/app.js') }}"></script>

    <img src="{{ asset('/storage/images/trashBox.jpg') }}" alt="ゴミ箱" class="trash-box" style="cursor:pointer;" width="30" height="30" data-product-id="{{ $product->id }}">
</div>
@endsection