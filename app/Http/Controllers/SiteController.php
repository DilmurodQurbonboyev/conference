<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\Management;
use App\Models\Register;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function category($slug)
    {
        $category = ListCategory::where('slug', $slug)->first();
        $metaTitle = $category->title ?? '';

        if (is_null($category)) {
            return view('frontend.error', compact('metaTitle'));
        }

        switch ($category->list_type_id) {
            case 1:
                $view = "frontend.news";
                break;
            case 5:
                $view = "frontend.error";
                break;
            case 7:
                $view = "frontend.photogallery";
                break;
            case 8:
                $view = "frontend.videogallery";
                break;
            case 10:
                $view = "frontend.management";
                break;
            default:
                break;
        }

        $lists = Lists::where('list_type_id', $category->list_type_id)
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view($view, compact('lists', 'metaTitle'));
    }

    public function news(Request $request, $slug)
    {
        $post = Lists::where('slug', $slug)->first();

        if (is_null($post)) {
            return view('frontend.error');
        }


        $postKey = 'news_' . $post->id;
        if (!session()->has($postKey)) {
            $post->increment('count_view');
            session()->put($postKey, 1);
        }

        return view("frontend.detail", compact('post'));
    }

    public function pages(Request $request, $slug)
    {
        $post = Lists::where('slug', $slug)->first();

        if (is_null($post)) {
            return view('frontend.error');
        }

        $postKey = 'news_' . $post->id;
        if (!session()->has($postKey)) {
            $post->increment('count_view');
            session()->put($postKey, 1);
        }
        return view("frontend.detail", compact('post'));
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function registerPost(RegisterRequest $request)
    {
        if (!file_exists('registers')) {
            mkdir('registers', 0755, true);
        }

        $path = "registers";

        $register = new Register();
        $register->last_name = $request->last_name;
        $register->first_name = $request->first_name;
        $register->middle_name = $request->middle_name;
        $register->fullName = $request->last_name . '' . $request->first_name . '' . $request->middle_name;
        $register->organization = $request->organization;
        $register->position = $request->position;
        $register->country = $request->country;
        $register->email = $request->email;
        $register->user_ip = $request->ip();
        $register->status = $request->status;
        $register->browser_agent = $request->header('User-Agent');

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('') . '.' . $extension;
            $file->move($path . "/", $filename);
            $register->photo = $path . '/' . $filename;
        }
        $register->save();
        return redirect()->back()->with('success', tr('ZOOM conference link sent to your email'));
    }

    public function leaders()
    {
        $leaders = Management::where('m_category_id', 1)
            ->orderBy('order', 'desc')
            ->where('status', 2)
            ->get();

        return view('frontend.managements', compact('leaders'));
    }
}
