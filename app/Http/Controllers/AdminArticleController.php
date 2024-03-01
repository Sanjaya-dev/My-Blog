<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('User')->get();
        return view('admin.article.list',[
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.article.form',[
            'button' => 'Submit',
            'url' => 'admin.dashboard.article.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator =Validator::make($request->all(),[
            'title' => 'required',
            'photo' => 'required|image',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        

        $image = $request->file('photo');
        $filename = time().'.'.$image->getClientOriginalExtension();
        Storage::disk('local')->putFileAs('public/thumbnails',$image,$filename);
        Article::create([
            'title' => $request->input('title'),
            'user_id' => $request->input('user_id'),
            'photo' => $filename,
            'content' => $request->input('content'),
        ]);
        


        return redirect(route('admin.dashboard.article'))->with('success','Article '.$request->input('title').' berhasil di tambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        

        return view('admin.article.form',[
            'article' => $article,
            'button' => 'Update',
            'url' => 'admin.dashboard.article.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
         // Validate the request data
        $validator =Validator::make($request->all(),[
            'title' => 'required',
            'photo' => 'image',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/thumbnails',$image,$filename);
            $article->photo = $filename;
        }
        
        
            $article->title = $request->input('title');
            $article->user_id = $request->input('user_id');
            $article->content = $request->input('content');
            $article->save();

        return redirect(Route('admin.dashboard.article'))->with('update','Data article '.$article->title.' berhasil di perbarui'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(Route('admin.dashboard.article'))->with('delete','Data article '.$article->title.' berhasil di hapus'); 
    }
}
