<?php

namespace Database\Seeders;

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
        $this->call(UserRoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SecurityQuestionSeeder::class);
        $this->call(ContactPageTableSeeder::class);
        $this->call(HomePageTableSeeder::class);
        $this->call(AboutPageTableSeeder::class);
        
       
        // \App\Models\User::factory(10)->create();
    }
}
