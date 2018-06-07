<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bookmark;
use Illuminate\Support\Facades\Storage;

class bookmarkController extends Controller
{
   #hiện danh sach thể loại
   public function DanhSach()
   {
      $bookmark=bookmark::all();
      return view ('admin.backend.bookmark.list',['bookmark'=>$bookmark]);
   }

      #thêm thể loại
   public function getThem()
   {
      $bookmark = bookmark::all();
      return view ('backend.bookmark.them',['bookmark'=>$bookmark]);       
   }

   public function news(Request $req)
   {
      $this->validate($req,
         [
            'name'=>'required|min:3|max:1000|unique:bookmark,name'
         ]
         ,
         [
            'name.required'=>'Chua nhap ten',
            'name.min'=>'nhap it nhat 3 ki tu',
            'name.max'=>'nap nhieu nhat 6 ki tu',
            'name.unique'=>'Tên này đã tồn tại', 
         ]);
      $bookmark=new bookmark;
      $bookmark->name = $req->name;
      $bookmark->content = $req->content;
      $bookmark->price = $req->price;
      $bookmark->retail_price = $req->retail;
      $bookmark->source = $req->source;
      if ($req->hasFile('Hinh')) {
         $file = $req->file('Hinh');
         $endfile = $file->getClientOriginalExtension();
         if ($endfile != 'jpg') {
            return redirect('admin/backend/bookmark/news')->with('lỗi','Chỉ được chọn file .jpg');
         }
         $name = $file->getClientOriginalName();
         $img = str_random(4)."_".$name;
         while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
         }
         $file->move("upload/image",$img);
         $bookmark->image = $img;
      }else{
         $bookmark->image = "";
      }
      $bookmark->save();
      return redirect('admin/backend/bookmark/news')->with('bookmark','Thêm mới thành công');
   }

      // sửa thể loại
   public function getSua($id)
   {
      $bookmark = bookmark::find($id);
      return view('backend.bookmark.sua',['bookmark' => $bookmark]);
   }

   public function edit(Request $req,$id)
   {
      $bookmark=bookmark::find($id);
      $this->validate($req,
         [
            'name' => 'required|min:3|max:100'
         ],
         [
            'name.requered'=>'Bạn chưa nhập tên thể loại',
            'name.min'=>'Tên phải có ít nhất 3 kí tự',
            'name.max'=>'Tên chỉ có nhiều nhất 100 kí tự',
         ]);
      $bookmark->name = $req->name;
      $bookmark->content = $req->content;
      $bookmark->price = $req->price;
      $bookmark->retail_price = $req->retail_price;
      $bookmark->source = $req->source;

      if ($req->hasFile('Hinh')) {
         $file = $req->file('Hinh');
         $endfile = $file->getClientOriginalExtension();
         if ($endfile != 'jpg') {
            return redirect('admin/backend/bookmark/sua')->with('lỗi','Chỉ được chọn file .jpg');
         }
         $name = $file->getClientOriginalName();
         $img = str_random(4)."_".$name;
         while (file_exists("upload/image/".$img)){
            $img = str_random(4)."_".$name;
         }
         Storage::delete("upload/image".$bookmark->Hinh);
         $file->move("upload/image",$img);
         $bookmark->image = $img;
      }

      $bookmark->save();
      return redirect('admin/backend/bookmark/sua/'.$id)->with('Thongbao','Sửa thành công!');         
   }
   public function postXoa($id)
      {
         $bookmark=bookmark::find($id);
         $bookmark->delete();
         return redirect('admin/backend/bookmark/list')->with('Thongbao2','Xóa thành công!');
      }
}
