<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FavoritesController extends Controller
{
    /**
     * お気に入りを登録するアクション。
     *
     * @param  $micropostId  相手のid
     * @return \Illuminate\Http\Response
     */
    public function store($micropostId)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をお気に入り登録する
        \Auth::user()->favorite($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * お気に入りを削除するアクション。
     *
     * @param  $micropostId  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropostId)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をお気に入り解除する
        \Auth::user()->unfavorite($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
