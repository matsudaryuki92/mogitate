<?php

namespace App\UseCases;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Exception;

final class ProductSearch
{
    public function search(Request $request): LengthAwarePaginator
    {
        try{
            $searchWord = $request->input('keyword');
            $priceOrder = $request->input('price_order');

            $searchProducts = Product::query();

            if ($searchWord) {
                $searchProducts->SearchByName($searchWord);
            }

            if ($priceOrder) {
                $searchProducts->SearchByPrice($priceOrder);
            }

            return $searchProducts->paginate(6)->appends($request->all());

        } catch (Exception $e) {
            Log::error('エラー内容: ' . $e->getMessage());
            Log::info('Redirecting back due to an error: 処理に失敗しました');
            return new LengthAwarePaginator([], 0, 6, 1, ['path' => $request->url(), 'query' => $request->query()]);
        }
    }
}
