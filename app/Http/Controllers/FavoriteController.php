<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store($micropostId)
    {
        \Auth::user()->favorite($micropostId);
        return redirect()->back();
    }
    
    public function destroy($micropostId)
    {
        \Auth::user()->unfavorite($micropostId);
        return redirect()->back();
    }
    
    // お気に入りした投稿
    public function favorites()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->favorites()->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
                //'count' => $this->count($user),
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        } else {
            return redirect('/');
        }
    }
}
