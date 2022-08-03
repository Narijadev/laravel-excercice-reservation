<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'created_at'             =>  '2022-07-05 09:06:16',    
           
        ],
        [
            'id'        => '2',
            'status'             => 'test1',
            'created_at'             =>  '2022-07-06 19:06:16', 
        ],
        [
            'id'        => '3',
            'status'             => 'test1',
            'created_at'             =>  '2022-07-07 07:06:16', 
        ],
        [
            'id'        => '4',
            'status'             => 'test1',
            'created_at'             =>  '2022-07-08 09:06:16', 
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
