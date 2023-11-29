<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function League\Flysystem\delete;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;


class BlogController extends Controller
{
    use WithPagination;

//    private $blog;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pages.blog.manage-blog',[
            'blogs' => Blog::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog.create-blog',[
            'categories'=>Category::where('status', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Blog::saveBlog($request);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                $blog = Blog::find($id);
                if ($blog->status == 1){
                    $blog->status = 0;
                }else{
                    $blog->status = 1;
                }
                $blog->save();
                return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('admin.pages.blog.edit-blog',[
            'blog' =>Blog::find($id),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Blog::saveUpdate($request, $id);
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(string $id)
//    {
//        $blog=Blog::find($id);
//        $blog->delete();
//        return back();
//
//    }
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            if (!empty($blog->image)) {
                // Get the image file path
                $imagePath = public_path($blog->image);

                // Check if the image file exists
                if (file_exists($imagePath)) {
                    // Delete the image file
                    unlink($imagePath);
                }

                // Delete the SubCategory record
                $blog->delete();
            }else{
                $blog->delete();
            }

        }
        return back();
    }

}
