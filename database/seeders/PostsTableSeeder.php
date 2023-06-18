<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Proin ac leo quis turpis cursus pretium',
            'description' => 'Vivamus ut posuere orci, ut elementum est. Nulla vulputate nisi sit amet venenatis vulputate. Integer mollis, risus sed consequat ultricies, nulla purus pharetra mi, ut iaculis libero purus vel dui.'
        ]);

        Post::create([
            'title' => 'Nam at nisl vitae dui sollicitudin ornare ut eu quam',
            'description' => 'Donec sed quam nibh. Nam eros risus, condimentum eu odio nec, facilisis mattis tortor. Vivamus nec tortor nunc. Maecenas nec sapien lacus. Donec libero velit, iaculis in condimentum ac, accumsan ut leo. Morbi suscipit sagittis leo, in gravida ante vestibulum et. Aenean ultrices, arcu tincidunt vehicula aliquam, nulla quam mollis ligula, in venenatis urna quam id tortor. Sed pulvinar mi quis lectus fringilla, vel lacinia leo elementum. Integer eu elementum ante, sit amet iaculis orci. Fusce tincidunt nulla et laoreet scelerisque. Quisque sagittis rhoncus lorem vitae maximus.'
        ]);

        Post::create([
            'title' => 'Donec vitae risus vitae lacus pretium venenatis sed et tortor.',
            'description' => 'Vivamus ut posuere orci, ut elementum est. Nulla vulputate nisi sit amet venenatis vulputate. Integer mollis, risus sed consequat ultricies, nulla purus pharetra mi, ut iaculis libero purus vel dui.'
        ]);

        Post::create([
            'title' => 'Proin ac leo quis turpis cursus pretium',
            'description' => 'Nullam sit amet scelerisque ex. Fusce imperdiet mauris quam, nec fermentum nisl sagittis vitae. Nam aliquam pulvinar lacus, vel vulputate mi pellentesque in. Integer fringilla lacinia quam, ac placerat ante hendrerit facilisis. Sed vehicula dui vel tortor scelerisque aliquam. Praesent pulvinar interdum est, et egestas urna bibendum at. Nulla ornare aliquam nibh eu dapibus. Fusce tempus mattis molestie. Donec scelerisque velit tristique nisi semper convallis. Mauris ullamcorper enim id sapien dictum, in porttitor velit egestas.'
        ]);

        Post::create([
            'title' => 'Nulla vulputate nisi sit amet venenatis vulputate. Integer mollis, risus sed consequat ultricies',
            'description' => 'Aliquam aliquam purus lorem. Nam at nisl vitae dui sollicitudin ornare ut eu quam. Praesent justo urna, ornare non mi et, eleifend venenatis ante. Praesent vitae convallis justo. Proin ac leo quis turpis cursus pretium. Aliquam iaculis in dolor accumsan euismod.'
        ]);

        Post::create([
            'title' => 'Proin ac leo quis turpis cursus pretium',
            'description' => 'Vivamus ut posuere orci, ut elementum est. Nulla vulputate nisi sit amet venenatis vulputate. Integer mollis, risus sed consequat ultricies, nulla purus pharetra mi, ut iaculis libero purus vel dui.'
        ]);
    }
}
