<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SeoController extends Controller
{
    public $active = 'website';
    public $active_sub = 'seo';

    public function __construct()
    {
        $pages = [
            'home', 'about', 'contact', 'login',
        ];

        if (Seo::count() == 0) {
            foreach ($pages as $page) {
                Seo::create([
                    'page' => $page,
                    'title' => ucwords(str_replace('_', ' ', $page)) . ' Title',
                    'description' => ucwords(str_replace('_', ' ', $page)) . ' Page Description',
                    'keywords' => ucwords(str_replace('_', ' ', $page)) . ' Page Keywords',
                ]);
            }
        }
    }

    public function index()
    {
        return view('admin.seo.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Seo::Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/seo/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/seo/' . $result->image) : '';
                $delete_url = route('seo.status', [$result->id, 2]);
                $url = route('seo.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-block btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-block btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='page_{$result->id}'>{$result->page}</span>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='description_{$result->id}'>{$result->description}</span>
                    <span style='display: none' id='og_title_{$result->id}'>{$result->og_title}</span>
                    <span style='display: none' id='og_description_{$result->id}'>{$result->og_description}</span>
                    <span style='display: none' id='keyword_{$result->id}'>{$result->keyword}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $seo = $request->id == 0 ? new Seo : Seo::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'keywords' => 'required',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/seo/' . $seo->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/seo', $filename, 'public');
        }
        else {
            $filename = $seo->image;
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'image' => $filename,
        ];

        $seo->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = Seo::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/seo/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
