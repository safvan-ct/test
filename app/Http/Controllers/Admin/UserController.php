<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public $active = 'users';
    public $active_sub = 'users';

    public function index()
    {
        return view('admin.users.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = User::where('role_id', 2)->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()

            ->addColumn('action', function ($result) {
                $delete_url = route('users.status', [$result->id, 2]);
                $url = route('users.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';
                $class = $result->is_active == 0 ? 'btn btn-info' : 'btn btn-success';

                $res = "<button style='display: none' type='button' class='btn btn-block btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-block btn-danger'>Delete</button>
                    <button type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='{$class}'>{$text}</button>";

                return $res;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function status($id, $status)
    {
        $obj = User::findOrFail($id);
        if (in_array($status, [0, 1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message . ' Sucessfully']);
    }
}
