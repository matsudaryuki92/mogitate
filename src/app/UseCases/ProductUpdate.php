<?php

namespace App\UseCases;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

final class ProductUpdate
{
    public function update(Request $request, Product $product): void
    {
        try{
            $imagePath = $request->file('image')->store('images', 'public');

            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->image = $imagePath;
            $product->description = $request->input('description');

            $product->save();

            $seasonIds = Season::whereIn('name', $request->input('season'))->pluck('id')->toArray();
            $product->seasons()->sync($seasonIds);
        } catch (Exception $e) {
            Log::error('エラー内容: ' . $e->getMessage());
            Log::info('Redirecting back due to an error: 処理に失敗しました');
        }
    }
}