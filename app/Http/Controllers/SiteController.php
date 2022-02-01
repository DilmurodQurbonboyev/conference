<?php

namespace App\Http\Controllers;

use App\Models\ListCategory;
use App\Models\Lists;
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

        // if (!$category) {
        //     return view('frontend.error', 'metaTitle');
        // }



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
}
