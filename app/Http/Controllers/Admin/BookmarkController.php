<?php

namespace App\Http\Controllers\Admin;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.backend.bookmark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {die('c');
        $this->validate($request, ['name' => 'required']);

        bookmark::create($request->all());

        return redirect('admin/backend/bookmark')->with('flash_message', 'bookmark added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $bookmark = bookmark::findOrFail($id);

        return view('admin.backend.bookmark.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $bookmark = bookmark::findOrFail($id);

        return view('admin.backend.bookmark.edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $bookmark = bookmark::findOrFail($id);
        $bookmark->update($request->all());

        return redirect('admin/backend/bookmark')->with('flash_message', 'bookmark updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        bookmark::destroy($id);

        return redirect('admin/backend/bookmark')->with('flash_message', 'bookmark deleted!');
    }

    /**
     * Remove batch
     *
     * @param  int  $ids
     *
     * @return void
     */
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
