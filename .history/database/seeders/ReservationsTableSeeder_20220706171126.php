<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
            [
            'id'        => '1',
            'status'             => 'test1',
            'created_at'             =>  'test1',    
           
        ],
        [
            'id'        => '2',
            'status'             => 'test1',
            'created_at'             =>  'test1', 
        ],
        [
            'id'        => '3',
            'status'             => 'test1',
            'created_at'             =>  'test1', 
        ],
        [
            'id'        => '4',
            'status'             => 'test1',
            'created_at'             =>  'test1', 
        ],
            
        ];

      /* foreach ($articles as $article_data) {
            $article = Article::create($article_data);

            //event(new ArticleCreated($article));
        }

        Schema::enableForeignKeyConstraints();*/
        DB::table('reservations')->insert($reservations);
        
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
