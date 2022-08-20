<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // User::create([
        //     'name' => 'Aldi Putra Nawasta',
        //     'email' => 'aldistate@yahoo.com',
        //     'slug' => 'aldi-putra-nawasta',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Eliza Alya Safira',
        //     'email' => 'elizaalya@gmail.com',
        //     'slug' => 'eliza-alya-safira',
        //     'password' => bcrypt('12345')
        // ]);

        // User::factory(5)->create();

        // Category::create([
        //     'name' => 'Programmer',
        //     'slug' => 'programmer'
        // ]);

        // Category::create([
        //     'name' => 'Designer',
        //     'slug' => 'designer'
        // ]);

        // Category::create([
        //     'name' => 'Multimedia',
        //     'slug' => 'multimedia'
        // ]);

        Post::factory(10)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam, magnam enim molestias vel iure itaque harum repellat veniam aliquid? Tenetur eius omnis excepturi sequi alias',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam, magnam enim molestias vel iure itaque harum repellat veniam aliquid? Tenetur eius omnis excepturi sequi alias, cupiditate optio amet odit nesciunt harum nobis maiores deserunt dignissimos dolorum ab ut iste aliquid, natus id ex nisi saepe quae sunt ea. Dolorum, cumque aperiam. Commodi, eaque laborum sint nobis maiores ad cumque consequuntur iusto quibusdam. Doloribus animi explicabo voluptas repellat esse sunt hic, ipsa, facilis quis, veritatis suscipit odio vero accusantium! Quo corrupti deleniti nam non pariatur esse praesentium illum ratione, quas, aspernatur officia inventore, eos in nisi sapiente! Neque, nesciunt a.'
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam, magnam enim molestias vel iure itaque harum repellat veniam aliquid? Tenetur eius omnis excepturi sequi alias',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea alias iste fugiat iusto soluta pariatur sunt optio quo quas omnis necessitatibus, provident reiciendis quos vero reprehenderit fuga commodi tempore voluptas at rem consequuntur, voluptatem nam nostrum magnam! Eos veritatis natus vitae a fugiat repellendus esse, ea tempora fugit quo aut quam incidunt libero dolore voluptatem suscipit laborum quisquam quos aliquid consectetur illo. Deleniti nam deserunt magni reprehenderit, impedit enim maiores voluptate autem quisquam ea aliquam tenetur dolore, consequuntur animi harum ipsum beatae qui mollitia, accusantium blanditiis adipisci ullam minima. Quos temporibus porro commodi facere omnis. Eaque a esse inventore aut quos eius voluptatem. Fugit earum molestias doloribus quos atque porro asperiores? Voluptas, eligendi. Quisquam reprehenderit in, quaerat voluptas laboriosam officiis rerum illo mollitia adipisci dolores dolorem, tempore laborum deleniti, dicta reiciendis quas non quod qui ipsam autem! Perspiciatis amet exercitationem, distinctio, voluptatem velit placeat cumque odit laudantium ipsam expedita reprehenderit deleniti quia, est maiores autem saepe ut accusamus porro accusantium sed veniam. Quasi eius laborum vel est iusto sequi atque incidunt facilis expedita beatae corporis in tempora saepe rerum itaque facere tempore mollitia, iste libero blanditiis! Itaque eos est ut quam, cumque vero magnam sapiente laudantium cupiditate doloremque voluptatum non!'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam, magnam enim molestias vel iure itaque harum repellat veniam aliquid? Tenetur eius omnis excepturi sequi alias',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis, minus dolor numquam facere inventore, eveniet aliquam quas porro repudiandae dicta sit doloremque delectus assumenda aut quo facilis exercitationem! Porro impedit vel ex eveniet provident dolorum vero minus? Aperiam itaque saepe consectetur placeat officiis! Maxime, pariatur.'
        // ]);
    }
}
