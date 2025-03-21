<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\News;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Winningticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {   
     
       User::factory(1)->create();
    //    Event::factory(10)->create();
    //    News::factory(10)->create();
    //    Winningticket::factory(10)->create();
       

    }
}
