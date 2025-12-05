<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Show the application home dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminIndex()
    {
        if (Auth::user()->is_admin) {
            $articles = Article::paginate(10);
            return view('admin.dashboard', compact('articles'));
        }
        return redirect()->route('home'); // Redirect non-admins
    }

    /**
     * Show the author dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function authorIndex()
    {
        $articles = Auth::user()->articles()->paginate(10);
        return view('author.dashboard', compact('articles'));
    }
}
