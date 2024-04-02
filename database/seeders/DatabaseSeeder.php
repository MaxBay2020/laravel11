<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // 这里创建了一个user假数据，指定了name和email的值；
        // 因为在NoteFactory.php文件中，指定了每一个note假数据的user_id的值都是1；
        // 因此，在这里指定此假user的userId的值为1；
        User::factory()->create([
            // 指定主键的值是1；
            'id' => 1,
            'name' => 'Test User',
            'email' => 'components@example.com',
            // 指定password的值；使用bcrypt()方法来对传入的密码进行加密；
            // 在这里，密码是123456，写死了；
            'password' => bcrypt('123456')
        ]);

        // 创建100条note假数据；
        Note::factory(100) -> create();
    }
}
