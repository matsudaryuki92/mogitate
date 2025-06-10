@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/product.css') }}">
@endsection

@section('content')
<div class="container">

    <div class='body-title'>
        <div>
            <h3 class="product-list">商品一覧</h3>
        </div>
        <div>
            <button class="add-product">
                <a href="{{ route('products.create') }}">＋商品を追加</a>
            </button>
        </div>
    </div>

    <form id="searchForm">
        <div class="product-search">
            <div class="search-box">
                <input type="text" class="search-field" placeholder="商品名で検索" name="keyword" value="{{ request('keyword') }}">
                <button class="search-button">検索</button>
            </div>
            <div class="search-filter">
                <h4>価格順で表示</h4>
                <select class="price-order" name="price_order" id="price_order">
                    <option value="" disabled selected style="display:none;">価格で並び替え</option>
                    <option value="desc">高い順に表示</option>
                    <option value="asc">安い順に表示</option>
                </select>
                <a href="{{ route('products.index') }}" class="reset-button">
                    <button>❎</button>
                </a>
            </div>
            <div>

            </div>
        </div>
    </form>

    <div class="product-list" id="productList">
        @foreach ($products as $product)
        <div class="product-cards">
            <a href="/products/{{ $product->id }}">
                <img src="{{ asset('/storage/' . $product->image) }}" alt="商品画像" class="product-image" width="200" height="200">
                <h4 class="product-name">{{ $product->name }}</h4>
                <p class="product-price">¥{{ number_format($product->price) }}</p>
            </a>
        </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('/js/modal.js')}}"></script>
@endsection