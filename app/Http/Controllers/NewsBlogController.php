<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactBody;
use App\Models\H_F_Wiget;
use App\Models\Post;
use App\Models\Widget;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Nette\Utils\first;
use Livewire\WithPagination;
use function Spatie\Ignition\ErrorPage\title;
use Carbon\Carbon;

class NewsBlogController extends Controller
{

    use WithPagination;

    public function index(){

        $category = Widget::find(1);

        $category1 = $category->firstCategory;
        $category1posts = Category::where('id', $category1)
            ->where('status',1)
            ->with('blog')
            ->orderBy('created_at', 'desc')
            ->first();

        $category2 = $category->secondCategory;
        $category2posts = Category::where('id', $category2)->where('status',1)->with('blog')->orderBy('created_at', 'desc')->first();

        $category3 = $category->thirdCategory;
        $category3posts = Category::where('id', $category3)->where('status',1)->with('blog')->orderBy('created_at', 'desc')->first();

        $category4 = $category->fourCategory;
        $category4posts = Category::where('id', $category4)->where('status',1)->with('blog')->orderBy('created_at', 'desc')->first();

        $oneMonthAgo = Carbon::now()->subMonth();

        $popularPosts = Blog::where('created_at', '>=', $oneMonthAgo)
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();


        return view('front.pages.home',[
            'blogs' => Blog::where('status', 1)->orderBy('created_at', 'desc')->get(),
            'sliders' =>Blog::where('status', 1)->where('addSlider',1)->orderBy('created_at', 'desc')->get() ,
            'categories' => Category::where('status', 1)->get(),
            'homeSetting' => Widget::find(1),
            'category1Posts' => $category1posts,
            'category2posts'=>$category2posts,
            'category3posts'=>$category3posts,
            'category4posts'=>$category4posts,
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'contact_body' => ContactBody::find(1)->first(),
            'popularPosts' => $popularPosts,
        ]);
    }

    public function contact(){
        $popularPosts = Blog::orderBy('count', 'desc')->get();

        return view('front.pages.contact',[
            'categories' => Category::where('status', 1)->get(),
            'contact_body' => ContactBody::find(1)->first(),
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'popularPosts'=>$popularPosts,
        ]);

    }

    public function single_page($slug){
        $blog = Blog::where('slug', $slug)->with('comments')->first();

        $SimilarPosts= Blog::where('status', 1)
            ->where('category_id',$blog->category_id)
            ->where('id', '!=', $blog->id)
            ->take(5)
            ->get();

        $popularPosts = Blog::orderBy('count', 'desc')->get();

        $view = $blog->id;
        $update = ['count'=>$blog->count+1,];
        Blog::where('id',$view)->update($update);

        $comments = Comment::with('visitor')
            ->where('blog_id', $blog->id)
            ->get();

        return view('front.pages.single-page',compact('comments','SimilarPosts'),[
            'breakingNews' => Blog::where('status', 1)->orderBy('created_at', 'desc')->get(),
            'categories' => Category::where('status', 1)->get(),
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'contact_body' => ContactBody::find(1)->first(),
            'blogs' => $blog,
            'homeSetting' => Widget::find(1),
            'popularPosts'=>$popularPosts,
        ]);
    }


    public function category($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        // Check if the category exists
        if (!$category) {
            abort(404); // or handle the case where the category is not found
        }

        $blogs = Blog::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $popularPosts = Blog::orderBy('count', 'desc')->limit(5)->get();


        return view('front.pages.category', [
            'categories' => Category::where('status', 1)->get(),
            'category' => $category,
            'homeSetting' => Widget::find(1),
            'blogs' => $blogs,
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'contact_body' => ContactBody::find(1)->first(),
            'popularPosts'=>$popularPosts,
        ]);
    }

}
