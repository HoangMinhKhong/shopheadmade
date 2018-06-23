<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Neck;
use Illuminate\Support\Facades\Storage;

class NeckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $neck = Neck::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $neck = Neck::paginate($perPage);
        }

        return view('admin.backend.neck.index', compact('neck'));
    }

    public function create()
    {
        $neck = Neck::all();
        return view('admin.backend.neck.create');
    }

    public function store(Request $req)
    {
        $this->validate($req,
            [
                'name'=>'required',
                'content'=>'required',
                'price'=>'required',
                'retail_price'=>'required',
                'source'=>'required',
                'quantity'=>'required',
                'image'=>'required'

            ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'content.required'=>'Bạn chưa nhập nội dung',
                'price.required'=>'Bạn chưa nhập giá mua vào',
                'retail_price.required'=>'Bạn chưa nhập giá bán lẻ',
                'source.required'=>'Bạn chưa nhập số lượng',
                'quantity.required'=>'Bạn chưa nhập số lượng',
                'image.required'=>'Bạn chưa chọn ảnh sản phẩm',


            ]);
        $neck                  = new Neck;
        $neck->name         = $req->name;
        $neck->content      = $req->content;
        $neck->price        = $req->price;
        $neck->retail_price = $req->retail_price;
        $neck->source       = $req->source;
        $neck->quantity     = $req->quantity;
        

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $endfile = $file->getClientOriginalExtension();
            if ($endfile != 'jpg') {
                return redirect('admin/neck')->with('flash_message','Chỉ được chọn file .jpg');
            }
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
            }
            $file->move("upload/image",$img);
            $neck->image = $img;
        }else{
            $neck->image = "";
        }
        $neck->save();

        return redirect('admin/neck')->with('flash_message', 'Thêm mới thành công!');
    }

    public function show($id)
    {
        $neck = Neck::findOrFail($id);

        return view('admin.backend.neck.show', compact('neck'));
    }

    public function edit($id)
    {
        $neck = Neck::findOrFail($id);

        return view('admin.backend.neck.edit', compact('neck'));
    }

    public function update(Request $req, $id)
    {
        $neck = Neck::find($id);
        $this->validate($req,
            [
                'name'=>'required',
                'content'=>'required',
                'price'=>'required',
                'retail_price'=>'required',
                'source'=>'required',
                'quantity'=>'required'

            ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'content.required'=>'Bạn chưa nhập nội dung',
                'price.required'=>'Bạn chưa nhập giá mua vào',
                'retail_price.required'=>'Bạn chưa nhập giá bán lẻ',
                'source.required'=>'Bạn chưa nhập số lượng',
                'quantity.required'=>'Bạn chưa nhập số lượng',

            ]);
        $neck->name = $req->name;
        $neck->content = $req->content;
        $neck->price = $req->price;
        $neck->retail_price = $req->retail_price;
        $neck->source = $req->source;
        $neck->quantity = $req->quantity;

        if ($req->hasFile('image')) {
           $file = $req->file('image');
           $endfile = $file->getClientOriginalExtension();
           if ($endfile != 'jpg') {
            return redirect('neck/list')->with('flash_message','Chỉ được chọn file .jpg');
        }
        $name = $file->getClientOriginalName();
        $img = str_random(4)."_".$name;
        while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
        }
        Storage::delete("upload/image".$neck->image);
        $file->move("upload/image",$img);
        $neck->image = $img;
        }

        $neck->save();

        return redirect('admin/neck')->with('flash_message', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        Neck::destroy($id);

        return redirect('admin/neck')->with('flash_message', 'Xóa thành công!');
    }

    public function batchRemove() 
    {
        $ids = $_REQUEST['ids'];

        if (strlen($ids) > 0) {
            $aryId = explode(',', $ids);

            if (count($aryId) > 0) {
                Neck::whereIn('id', $aryId)->delete();

                return redirect('admin/neck')->with('flash_message', 'Đã xóa thành công!');
            }
        }
    }
}
