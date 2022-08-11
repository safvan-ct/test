<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public $active = 'website';
    public $active_sub = 'settings';
    public $keys = [
        'offer_banner_link',
        'offer_banner_image',
        'category_1',
        'category_2',
        'sub_category',
        'quiz_title',
        'quiz_link',
        'quiz_description',
        'quiz_image',
        'about_title',
        'about_description',
        'about_image',
    ];

    public function index()
    {
        foreach ($this->keys as $key) {
            HomePageContent::updateOrCreate(['key' => $key], ['key' => $key]);
        }

        return view('admin.home-page.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function create(Request $request)
    {
        $data = [
            'offer_banner_link' => $request->offer_banner_link,
            'offer_banner_image' => homePageContent('offer_banner_image'),
            'category_1' => $request->category_1,
            'category_2' => $request->category_2,
            'sub_category' => $request->sub_category,
            'quiz_title' => $request->quiz_title,
            'quiz_link' => $request->quiz_link,
            'quiz_description' => $request->quiz_description,
            'quiz_image' => homePageContent('quiz_image'),
            'about_title' => $request->about_title,
            'about_description' => $request->about_description,
            'about_image' => homePageContent('about_image'),
        ];

        if ($request->hasFile('offer_banner_image')) {
            $request->validate(['offer_banner_image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/home_page/' . homePageContent('offer_banner_image'));
            $filename = 'offer_banner_image.' . $request->file('offer_banner_image')->extension();
            $request->offer_banner_image->storeAs('uploads/home_page', $filename, 'public');
            $data['offer_banner_image'] = $filename;
        }

        if ($request->hasFile('quiz_image')) {
            $request->validate(['quiz_image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/home_page/' . homePageContent('quiz_image'));
            $filename = 'quiz_image.' . $request->file('quiz_image')->extension();
            $request->quiz_image->storeAs('uploads/home_page', $filename, 'public');
            $data['quiz_image'] = $filename;
        }

        if ($request->hasFile('about_image')) {
            $request->validate(['about_image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/home_page/' . homePageContent('about_image'));
            $filename = 'about_image.' . $request->file('about_image')->extension();
            $request->about_image->storeAs('uploads/home_page', $filename, 'public');
            $data['about_image'] = $filename;
        }

        foreach ($this->keys as $key) {
            HomePageContent::updateOrCreate(['key' => $key], ['value' => $data[$key]]);
        }
        return redirect(route('home.page.index'))->with('success', 'Home Page Updated successfully');
    }
}
