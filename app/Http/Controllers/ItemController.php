<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Mengambil data item dari database
        $items = Item::all();
        return response()->json($items);
    }
}


