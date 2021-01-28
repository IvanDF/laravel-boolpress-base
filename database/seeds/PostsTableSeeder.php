<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Faker\Generator as Faker;
Use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Post::truncate();

        for( $i = 0; $i < 20; $i++ ) {
            // Vars
            $title = $faker->text(50);
            $body = $faker->paragraphs(5, true);
            $slug = Str::slug($title, '-');
            $body = $faker->paragraphs(5, true);
            $author = $faker->text(50);

            $image = $faker->image();
            $imageFile = new File($image);
            // Create istance
            $newPost = new Post();

            $newPost->title = $title;
            $newPost->slug = $slug;
            $newPost->body = $body;
            $newPost->img_url = Storage::disk('public')->putFile('images', $imageFile);
            $newPost->author = $author;
            
            $newPost->save();
        }
    }
    
}
