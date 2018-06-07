<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductModel;

class ProductController extends Controller
{
	public function index(Request $request){
		$keyword = $request->get('search');
        $perPage = 15;
        if (!empty($keyword)) {
            $product = ProductModel::where('TenSp', 'LIKE', "%$keyword%")->orWhere('source', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $product = ProductModel::paginate($perPage);
        }

        return view('product.bookmark.index', compact('product'));
	}

    public function create()
    {
        $roles = ProductModel::select('MaSp', 'TenSp', 'TinhTrang')->get();
        $roles = $roles->pluck('TenSp', 'TinhTrang');

        return view('product.bookmark.reate', compact('roles'));
    }
}
