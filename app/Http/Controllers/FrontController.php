<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use DB;
class FrontController extends Controller
{
    //
    public function index(Request $request)
    {
        try{
            $blogs = DB::table('blogs')->whereNull('deleted_at')->paginate(5);
            if ($request->ajax()) {
                $query = $request->search_query;
                $order = $request->order;
                $date = $request->date;
                $blogs = Blog::getBlogs($query,$order,$date);
                if($blogs->isEmpty()){
                    return '<div class="d-flex"><h4 class="mx-auto">Data Not Found</h4></div>';
                }else{
                    return view('blog_data', compact('blogs'))->render();    
                }
            }
            return view('index', compact('blogs'));
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function get_blogs()
    {
        try{
            $blogs = Blog::whereStatus('active')
                        ->where('publish_date', '<=', \Carbon\Carbon::now())
                        ->with(['user'])
                        ->latest()
                        ->get();
            return $blogs;
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function blog_detail($id)
    {
        try{
            $blog = Blog::whereId($id)->with(['user'])->latest()->first();
            return $blog;
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    
}
