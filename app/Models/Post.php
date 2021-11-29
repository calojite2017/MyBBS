<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    // viewで「$post->comments」を使って関連コメントを抜き出したい。$this->hasMany()は、現インスタンスのComment::classプロパティ(comments)に、commentsテーブルのデータ(複数)を紐づけて入れ込む作業。
    public function comments()
    {
        // モデル同士の関係を指定。特定のポストに対してコメントが複数ある。
        return $this->hasMany(Comment::class);
    }
}
