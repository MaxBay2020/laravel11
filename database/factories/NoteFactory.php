<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 在这里来定义note表中的每个字段的值；
            // 这里必须和note表中的字段名匹配！
            // 使用fake()方法来创造假数据，使用realText()方法来定义此假数据并不是乱造的，而是真实的，最大长度是2000个字符；
            'note' => fake() -> realText(2000),
            // 指定所有的假数据的user_id字段的值都是1，写死了
            'user_id' => 1,
        ];
    }
}
