<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Warehouse;

class WarehouseRepository
{
    public function getAll(array $fields)
    {
        return Warehouse::select($fields)->with('products.category')->latest()->paginate(10);
    }

    public function getById(int $id, array $fields)
    {
        return Warehouse::select($fields)->with('products.category')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $warehouse = Category::findOrFail($id);
        $warehouse->update($data);
        return $warehouse;
    }

    public function delete(int $id)
    {
        $warehouse = Category::findOrFail($id);
        $warehouse->delete();
    }
}