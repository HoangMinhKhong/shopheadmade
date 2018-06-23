<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
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
            $bookmark = bookmark::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $bookmark = bookmark::paginate($perPage);
        }

        return view('admin.backend.bookmark.index', compact('bookmark'));
    }

    public function create()
    {
        $bookmark = bookmark::all();
        return view('admin.backend.bookmark.create');

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
        $bookmark=new bookmark;
        $bookmark->name = $req->name;
        $bookmark->content = $req->content;
        $bookmark->price = $req->price;
        $bookmark->retail_price = $req->retail_price;
        $bookmark->source = $req->source;
        $bookmark->quantity = $req->quantity;

        if ($req->hasFile('image')) {die('a');
            $file = $req->file('image');
            $endfile = $file->getClientOriginalExtension();
            if ($endfile != 'jpg') {
                return redirect('admin/bookmark')->with('flash_message','Chỉ được chọn file .jpg');
            }
            $name = $file->getClientOriginalName();
            $img = str_random(4)."_".$name;
            while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
            }
            $file->move("upload/image",$img);
            $bookmark->image = $img;
        }else{
            die('b');
            $bookmark->image = "";
        }
        $bookmark->save();

        return redirect('admin/bookmark')->with('flash_message', 'bookmark added!');
    }

    public function show($id)
    {
        $bookmark = bookmark::findOrFail($id);

        return view('admin.backend.bookmark.show', compact('bookmark'));
    }

    public function edit($id)
    {
        $bookmark = bookmark::findOrFail($id);

        return view('admin.backend.bookmark.edit', compact('bookmark'));
    }

    public function update(Request $req, $id)
    {
        $bookmark=bookmark::find($id);
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
        $bookmark->name = $req->name;
        $bookmark->content = $req->content;
        $bookmark->price = $req->price;
        $bookmark->retail_price = $req->retail_price;
        $bookmark->source = $req->source;

        if ($req->hasFile('image')) {
           $file = $req->file('image');
           $endfile = $file->getClientOriginalExtension();
           if ($endfile != 'jpg') {
            return redirect('admin/bookmark')->with('flash_message','Chỉ được chọn file .jpg');
        }
        $name = $file->getClientOriginalName();
        $img = str_random(4)."_".$name;
        while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
        }
        Storage::delete("upload/image".$bookmark->image);
        $file->move("upload/image",$img);
        $bookmark->image = $img;
    }

    $bookmark->save();

    return redirect('admin/bookmark')->with('flash_message', 'Sửa thành công!');
}

    public function destroy($id)
    {
        bookmark::destroy($id);

        return redirect('admin/backend/bookmark')->with('flash_message', 'bookmark deleted!');
    }

    public function batchRemove() {
        $ids = $_REQUEST['ids'];

        if (strlen($ids) > 0) {
            $aryId = explode(',', $ids);

            if (count($aryId) > 0) {
                bookmark::whereIn('id', $aryId)->delete();

                return redirect('admin/backend/bookmark')->with('flash_message', 'Đã xóa thành công');
            }
        }
    }
}
