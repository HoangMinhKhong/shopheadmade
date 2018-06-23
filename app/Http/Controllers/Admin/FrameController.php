<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frame;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
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
            $frame = Frame::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $frame = Frame::paginate($perPage);
        }

        return view('admin.backend.frame.index', compact('frame'));
    }

    public function create()
    {
        $frame = Frame::all();
        return view('admin.backend.frame.create');
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
        $frame                  = new Frame;
        $frame->name         = $req->name;
        $frame->content      = $req->content;
        $frame->price        = $req->price;
        $frame->retail_price = $req->retail_price;
        $frame->source       = $req->source;
        $frame->quantity     = $req->quantity;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $endfile = $file->getClientOriginalExtension();
            if ($endfile != 'jpg') {
                return redirect('admin/frame')->with('flash_message','Chỉ được chọn file .jpg');
            }
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
            }
            $file->move("upload/image",$img);
            $frame->image = $img;
        }else{
            $frame->image = "";
        }
        $frame->save();

        return redirect('admin/frame')->with('flash_message', 'Thêm mới thành công!');
    }

    public function show($id)
    {
        $frame = Frame::findOrFail($id);

        return view('admin.backend.frame.show', compact('frame'));
    }

    public function edit($id)
    {
        $frame = Frame::findOrFail($id);

        return view('admin.backend.frame.edit', compact('frame'));
    }

    public function update(Request $req, $id)
    {
        $frame = Frame::find($id);
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
        $frame->name = $req->name;
        $frame->content = $req->content;
        $frame->price = $req->price;
        $frame->retail_price = $req->retail_price;
        $frame->source = $req->source;
        $frame->quantity = $req->quantity;

        if ($req->hasFile('image')) {
           $file = $req->file('image');
           $endfile = $file->getClientOriginalExtension();
           if ($endfile != 'jpg') {
            return redirect('frame/list')->with('flash_message','Chỉ được chọn file .jpg');
        }
        $name = $file->getClientOriginalName();
        $img = str_random(4)."_".$name;
        while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
        }
        Storage::delete("upload/image".$frame->image);
        $file->move("upload/image",$img);
        $frame->image = $img;
        }

        $frame->save();

        return redirect('admin/frame')->with('flash_message', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        Frame::destroy($id);

        return redirect('admin/frame')->with('flash_message', 'Xóa thành công!');
    }

    public function batchRemove() 
    {
        $ids = $_REQUEST['ids'];

        if (strlen($ids) > 0) {
            $aryId = explode(',', $ids);

            if (count($aryId) > 0) {
                Frame::whereIn('id', $aryId)->delete();

                return redirect('admin/frame')->with('flash_message', 'Đã xóa thành công!');
            }
        }
    }
}
