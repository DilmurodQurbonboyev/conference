<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Country;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\ListsTranslation;
use App\Models\Management;
use App\Models\Register;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

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
                switch ($category->id) {
                    case 1:
                        $view = "frontend.news";
                        break;
                    case 19:
                        $view = "frontend.press";
                        break;
                }
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
            ->orderBy('order', 'desc')
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
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
        $countries = Country::get();
        return view('frontend.register', compact('countries'));
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
        $register->fullName = $request->last_name . ' ' . $request->first_name . ' ' . $request->middle_name;
        $register->organization = $request->organization;
        $register->position = $request->position;
        $register->gender = $request->gender;
        $register->country = $request->country;
        $register->email = $request->email;
        $register->user_ip = $request->ip();
        $register->status = $request->status;
        $register->participation_format = $request->participation_format;
        $register->breakout_session = $request->breakout_session;
        $register->browser_agent = $request->header('User-Agent');

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('') . '.' . $extension;
            $file->move($path . "/", $filename);
            $register->photo = $path . '/' . $filename;
        }
        $register->save();

        Mail::to($register->email)->send(new WelcomeMail($register->fullName));

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
