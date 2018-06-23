<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pillow;
use Illuminate\Support\Facades\Storage;

class PillowController extends Controller
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
            $pillow = pillow::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $pillow = Pillow::paginate($perPage);
        }

        return view('admin.backend.pillow.index', compact('pillow'));
    }

    public function create()
    {
        $pillow = Pillow::all();
        return view('admin.backend.pillow.create');
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
        $pillow                  = new Pillow;
        $pillow->name         = $req->name;
        $pillow->content      = $req->content;
        $pillow->price        = $req->price;
        $pillow->retail_price = $req->retail_price;
        $pillow->source       = $req->source;
        $pillow->quantity     = $req->quantity;
        

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $endfile = $file->getClientOriginalExtension();
            if ($endfile != 'jpg') {
                return redirect('admin/pillow')->with('flash_message','Chỉ được chọn file .jpg');
            }
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
            }
            $file->move("upload/image",$img);
            $pillow->image = $img;
        }else{
            $pillow->image = "";
        }
        $pillow->save();

        return redirect('admin/pillow')->with('flash_message', 'Thêm mới thành công!');
    }

    public function show($id)
    {
        $pillow = Pillow::findOrFail($id);

        return view('admin.backend.pillow.show', compact('pillow'));
    }

    public function edit($id)
    {
        $pillow = Pillow::findOrFail($id);

        return view('admin.backend.pillow.edit', compact('pillow'));
    }

    public function update(Request $req, $id)
    {
        $pillow = Pillow::find($id);
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
        $pillow->name = $req->name;
        $pillow->content = $req->content;
        $pillow->price = $req->price;
        $pillow->retail_price = $req->retail_price;
        $pillow->source = $req->source;
        $pillow->quantity = $req->quantity;

        if ($req->hasFile('image')) {
           $file = $req->file('image');
           $endfile = $file->getClientOriginalExtension();
           if ($endfile != 'jpg') {
            return redirect('pillow/list')->with('flash_message','Chỉ được chọn file .jpg');
        }
        $name = $file->getClientOriginalName();
        $img = str_random(4)."_".$name;
        while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
        }
        	Storage::delete("upload/image".$pillow->image);
        $file->move("upload/image",$img);
        $pillow->image = $img;
        }

        $pillow->save();

        return redirect('admin/pillow')->with('flash_message', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        Pillow::destroy($id);

        return redirect('admin/pillow')->with('flash_message', 'Xóa thành công!');
    }

    public function batchRemove() 
    {
        $ids = $_REQUEST['ids'];

        if (strlen($ids) > 0) {
            $aryId = explode(',', $ids);

            if (count($aryId) > 0) {
                Pillow::whereIn('id', $aryId)->delete();

                return redirect('admin/pillow')->with('flash_message', 'Đã xóa thành công!');
            }
        }
    }
}
