<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Post extends Model
{
    use HasFactory;

    // 接続指定
    protected $connection = 'mysql2';  // もしmysqlという接続先を使いたいならここを 'mysql' に変更

}
