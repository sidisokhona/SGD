<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

 
        DB::table("discs")->insert(["name"=>"Victor Hugo","price"=>100,"author_id"=>1,"discType_id"=>1,"ray_id"=>1,"rayQuantity"=>20,"stockQuantity"=>40]);
        DB::table("discs")->insert(["name"=>"PC HP Pavillon","price"=>1000,"author_id"=>2,"discType_id"=>2,"ray_id"=>2,"rayQuantity"=>5,"stockQuantity"=>15]);
        DB::table("discs")->insert(["name"=>"Poivron","price"=>1,"author_id"=>3,"discType_id"=>3,"ray_id"=>3,"rayQuantity"=>4,"stockQuantity"=>24]);
        DB::table("discs")->insert(["name"=>"Rose","price"=>2,"author_id"=>4,"discType_id"=>4,"ray_id"=>4,"rayQuantity"=>10,"stockQuantity"=>65]);
        DB::table("discs")->insert(["name"=>"Orange","price"=>5,"author_id"=>5,"discType_id"=>5,"ray_id"=>5,"rayQuantity"=>4,"stockQuantity"=>100]);
        DB::table("discs")->insert(["name"=>"Savon marseiller","price"=>50,"author_id"=>6,"discType_id"=>6,"ray_id"=>6,"rayQuantity"=>20,"stockQuantity"=>20]);
        DB::table("discs")->insert(["name"=>"Air Max","price"=>250,"author_id"=>7,"discType_id"=>7,"ray_id"=>7,"rayQuantity"=>12,"stockQuantity"=>80]);
        DB::table("discs")->insert(["name"=>"Sac Gucci","price"=>125,"author_id"=>8,"discType_id"=>8,"ray_id"=>8,"rayQuantity"=>4,"stockQuantity"=>25]);
        DB::table("discs")->insert(["name"=>"Solar","price"=>400,"author_id"=>9,"discType_id"=>9,"ray_id"=>9,"rayQuantity"=>14,"stockQuantity"=>30]);
  
  
        DB::table('authors')->insert(["name"=>"Sidi"]);
        DB::table('authors')->insert(["name"=>"Victor"]);
        DB::table('authors')->insert(["name"=>"Idrissa"]);
        DB::table('authors')->insert(["name"=>"Morgane"]);
        DB::table('authors')->insert(["name"=>"Gabriel"]);
        DB::table('authors')->insert(["name"=>"Alex"]);
        DB::table('authors')->insert(["name"=>"Ben"]);
        DB::table('authors')->insert(["name"=>"Robert"]);
        DB::table('authors')->insert(["name"=>"Sarah"]);


        DB::table('rays')->insert(["name"=>"Livre"]);
        DB::table('rays')->insert(["name"=>"Appareil"]);
        DB::table('rays')->insert(["name"=>"Leguime"]);
        DB::table('rays')->insert(["name"=>"Lait"]);
        DB::table('rays')->insert(["name"=>"Fruit"]);
        DB::table('rays')->insert(["name"=>"Savon"]);
        DB::table('rays')->insert(["name"=>"Chaussure"]);
        DB::table('rays')->insert(["name"=>"Sac"]);
        DB::table('rays')->insert(["name"=>"Montre"]);

        DB::table('disc_types')->insert(["name"=>"Livre"]);
        DB::table('disc_types')->insert(["name"=>"Appareil"]);
        DB::table('disc_types')->insert(["name"=>"Leguime"]);
        DB::table('disc_types')->insert(["name"=>"Lait"]);
        DB::table('disc_types')->insert(["name"=>"Fruit"]);
        DB::table('disc_types')->insert(["name"=>"Savon"]);
        DB::table('disc_types')->insert(["name"=>"Chaussure"]);
        DB::table('disc_types')->insert(["name"=>"Sac"]);
        DB::table('disc_types')->insert(["name"=>"Montre"]);

    }
}
