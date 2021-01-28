<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Front-End',
            'Back-End',
            'Full-Stack',
            'HTML',
            'CSS',
            'SCSS',
            'JavaScript',
            'Typescript',
            'Framework',
            'Tutorial',
        ];

        foreach ($tags as $tag) {
            // create new istance
            $newTag = new Tag();

            // Assignement
            $newTag->name = $tag;

            // save
            $newTag->save();
        }
    }
}
