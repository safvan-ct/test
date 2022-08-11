<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public $active = 'product';
    public $active_sub = 'category';

    public function index()
    {
        return view('admin.sub-category.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = SubCategory::with('category')->Orderby('category_id', 'asc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('action', function ($result) {
                $delete_url = route('sub.category.status', [$result->id, 2]);
                $url = route('sub.category.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='category_id_{$result->id}'>{$result->category_id}</span>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='description_{$result->id}'>{$result->description}</span>";

                return $res;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $category = $request->id == 0 ? new SubCategory : SubCategory::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
            ]);
        }

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $category->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = SubCategory::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
