<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public $active = 'product';
    public $active_sub = 'category';

    public function index()
    {
        $datas = Game::Orderby('id', 'desc')->get();
        return view('admin.product.game')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Game::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('cats.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $game = Game::find($id);
        $request->validate([
            'title' => 'required',
        ]);
        $game->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('cats.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        Game::destroy($game->id);

        return redirect(route('cats.index'))->with('success', 'Deleted Successfully');
    }
}
