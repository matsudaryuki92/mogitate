<?php

namespace App\UseCases;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

//function

final class ProductRegister
{
    public function register(Request $request): void
    {
        try{
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);

            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->image = $imagePath;
            $product->description = $request->input('description');
            $product->save();

            $seasons = $request->input('season');
            //pluck()指定したカラムだけの値を取り出してコレクション（配列のようなもの）として返す、配列に変換する理由は明示的にすることでコードを読みやすくするため
            $seasonIds = Season::whereIn('name', $seasons)->pluck('id')->toArray();
            $product->seasons()->attach($seasonIds);
        } catch (\Exception $e) {
            Log::error('エラー内容: ' . $e->getMessage());
            Log::info('Redirecting back due to an error: 処理に失敗しました');
        }
    }
}