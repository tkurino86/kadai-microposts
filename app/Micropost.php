<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿をお気に入りにしているユーザ。（ Userモデルとの関係を定義）
     */
    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
    
     /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        //$this->loadCount('microposts');
        //$this->loadCount(['microposts', 'followings', 'followers']);
        $this->loadCount(['microposts', 'followings', 'followers','favorites']);
    }
}
