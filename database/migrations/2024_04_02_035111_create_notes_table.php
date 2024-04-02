<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 创建notes表：
        // 默认状态下，laravel会自动创建id主键以及created_at字段和updated_at字段；
        // 我们在这里来定义table的字段；
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // 增加字段：使用longText()来定义字段类型，字段名叫note
            $table -> longText('note');
            // 增加字段：使用foreignId()方法来定义外键，字段名叫user_id，并指定和users表建立链接
            $table -> foreignId('user_id') -> constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
