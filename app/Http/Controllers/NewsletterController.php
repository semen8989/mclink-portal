<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('page')){
            
            $page = $request->query('page');
        
        }else{

            $page = 1;
        }

        $title = 'Newsletter';

        $get = Http::get('https://newsletter.mclinkgroup.com/wp-json/wp/v2/posts?per_page=1&page='.$page.'&_embed');
        
        $posts = json_decode($get,true);
        
        $data = [
            'totalPages' => (int)$get->header('X-WP-TotalPages'),
            'currentPage' => $page
        ];
        
        return view('newsletter.index', compact('title','posts','data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get = Http::get('https://newsletter.mclinkgroup.com/wp-json/wp/v2/posts/'.$id.'?_embed');
        $post = json_decode($get,true);
        $title = mb_convert_encoding($post['title']['rendered'],'UTF-8','HTML-ENTITIES');
        
        return view('newsletter.show',compact('post','title'));
    }

}
