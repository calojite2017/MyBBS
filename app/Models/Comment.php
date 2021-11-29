<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];

    // viewで「$comment->post」を使って関連ポストを抜き出したい。$this->belongsTo()は、現インスタンスのレコードは特定の投稿(Post::class)に紐づいており、postプロパティにcommentsテーブルのレコードを入れ込むよ、という作業。
    public function post()
    {
        // モデル同士の関係を指定。特定のポストに対してコメントが複数ある。
        return $this->belongsTo(Post::class);
    }
}
