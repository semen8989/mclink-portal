<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = __('label.dashboard');
        $get = Http::get('https://newsletter.mclinkgroup.com/wp-json/wp/v2/posts?_embed');
        $posts = json_decode($get,true);
        
        return view('dashboard', compact('title','posts'));
    }

    public function content($id)
    {
        $get = Http::get('https://newsletter.mclinkgroup.com/wp-json/wp/v2/posts/'.$id.'?_embed');
        $post = json_decode($get,true);
        
        return view('newsletter.show',compact('post'));
    }

    
}
