<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Event;
use App\Models\Player;
use App\Models\Team;
use App\Models\Post;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome() {
        $teams = Team::with('players')->get();
        $events = Event::orderBy('date')->take(4)->get();
        $posts = Post::orderBy('created_at')->take(3)->get();
        return view('welcome', compact(['teams', 'events', 'posts']));
    }

    public function csapatok(Request $request, int $id) {
        $team = Team::with('players')->find($id);
        return view('csapatok', compact(['team']));
    }

    public function hirek() {
        $posts = Post::orderBy('created_at')->get();
        return view('hirek', compact(['posts']));
    }

    public function hir(Request $request, int $id) {
        $post = Post::find($id);
        return view('hir', compact(['post']));
    }

    public function esemenyek() {
        $events = Event::orderBy('date', 'desc')->get();
        return view('esemenyek', compact(['events']));
    }

    public function edzesek() {
        return view('edzesek');
    }
}
