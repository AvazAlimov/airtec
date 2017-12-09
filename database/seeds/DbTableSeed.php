<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Tag;
use App\Product;
use App\User;
use App\File;



class DbTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Tag::truncate();
        Product::truncate();
        User::truncate();
        File::truncate();
        $user = new User;
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("password");
        $user->save();

        foreach (range(1,10) as $i){
            $product = new Product;
            $product->id = $i;
            $product->name = $faker->word;
            $product->price = random_int(1,20);
            $product->info = $faker->paragraph(6);
            $product->save();
            $file = new File;
            $file->file= "Faktur.png";
            $file->path = "/images/img2/";
            $product->images()->save($file);
        }
        foreach (range(1,10) as $i){
            $product = new Tag;
            $product->id = $i;
            $product->name = $faker->unique()->word;
            $product->save();
        }



    }
}
