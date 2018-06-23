<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clock;
use Illuminate\Support\Facades\Storage;

class ClockContrller extends Controller
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
            $clock = Clock::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $clock = Clock::paginate($perPage);
        }

        return view('admin.backend.clock.index', compact('clock'));
    }

    public function create()
    {
        $clock = Clock::all();
        return view('admin.backend.clock.create');
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
        $clock                  = new Clock;
        $clock->name         = $req->name;
        $clock->content      = $req->content;
        $clock->price        = $req->price;
        $clock->retail_price = $req->retail_price;
        $clock->source       = $req->source;
        $clock->quantity     = $req->quantity;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $endfile = $file->getClientOriginalExtension();
            if ($endfile != 'jpg') {
                return redirect('admin/clock')->with('flash_message','Chỉ được chọn file .jpg');
            }
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
            }
            $file->move("upload/image",$img);
            $clock->image = $img;
        }else{
            $clock->image = "";
        }
        $clock->save();

        return redirect('admin/clock')->with('flash_message', 'Thêm mới thành công!');
    }

    public function show($id)
    {
        $clock = Clock::findOrFail($id);

        return view('admin.backend.clock.show', compact('clock'));
    }

    public function edit($id)
    {
        $clock = Clock::findOrFail($id);

        return view('admin.backend.clock.edit', compact('clock'));
    }

    public function update(Request $req, $id)
    {
        $clock = Clock::find($id);
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
        $clock->name = $req->name;
        $clock->content = $req->content;
        $clock->price = $req->price;
        $clock->retail_price = $req->retail_price;
        $clock->source = $req->source;
        $clock->quantity = $req->quantity;

        if ($req->hasFile('image')) {
           $file = $req->file('image');
           $endfile = $file->getClientOriginalExtension();
           if ($endfile != 'jpg') {
            return redirect('clock/list')->with('flash_message','Chỉ được chọn file .jpg');
        }
        $name = $file->getClientOriginalName();
        $img = str_random(4)."_".$name;
        while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
        }
        	Storage::delete("upload/image".$clock->image);
        $file->move("upload/image",$img);
        $clock->image = $img;
        }

        $clock->save();

        return redirect('admin/clock')->with('flash_message', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        Clock::destroy($id);

        return redirect('admin/clock')->with('flash_message', 'Xóa thành công!');
    }

    public function batchRemove() 
    {
        $ids = $_REQUEST['ids'];

        if (strlen($ids) > 0) {
            $aryId = explode(',', $ids);

            if (count($aryId) > 0) {
                Clock::whereIn('id', $aryId)->delete();

                return redirect('admin/clock')->with('flash_message', 'Đã xóa thành công!');
            }
        }
    }
}
