<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    // 下面的代码表示：当我们使用Note::create()方法创建note的时候，这里只接受note字段和user_id字段的值；
    protected $fillable = ['note', 'user_id'];
}
