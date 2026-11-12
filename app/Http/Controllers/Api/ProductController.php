<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function format(Product $p): array
    {
        return [
            'id' => $p->id, 'sku' => $p->sku, 'name' => $p->name,
            'category' => $p->category, 'price' => (float) $p->price,
            'min_stock' => (int) $p->min_stock,
            'stock' => (int) ($p->movements_sum_quantity ?? 0),
        ];
    }

    public function index()
    {
        return Product::withSum('movements', 'quantity')->orderBy('name')->get()
            ->map(fn ($p) => $this->format($p))->values();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|string|unique:products,sku',
            'name' => 'required|string',
            'category' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'min_stock' => 'required|integer|min:0',
        ]);

        return response()->json($this->format(Product::create($data)), 201);
    }

    public function addStock(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'warehouse_id' => 'nullable|exists:warehouses,id',
        ]);

        $warehouseId = $data['warehouse_id'] ?? Warehouse::value('id');
        if (! $warehouseId) {
            return response()->json(['message' => 'Belum ada gudang. Buat gudang di panel admin.'], 422);
        }

        if ($data['type'] === 'out') {
            $available = StockMovement::where('product_id', $data['product_id'])
                ->where('warehouse_id', $warehouseId)->sum('quantity');

            if ($available < $data['quantity']) {
                return response()->json(['message' => "Stok tidak cukup (tersedia: $available)"], 422);
            }
        }

        StockMovement::create([
            'product_id' => $data['product_id'],
            'warehouse_id' => $warehouseId,
            'type' => $data['type'],
            'quantity' => $data['type'] === 'out' ? -$data['quantity'] : $data['quantity'],
            'notes' => 'Dari aplikasi Android',
        ]);

        return response()->json(['message' => 'Stok berhasil dicatat'], 201);
    }
}