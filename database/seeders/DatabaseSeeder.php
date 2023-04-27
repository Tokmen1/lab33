<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Carmodel;
use App\Models\Manufacturer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Country::create(['name' => 'Germany', 'code'=>'DE']);
        Country::create(['name' => 'Italy', 'code'=>'IT']);
        Country::create(['name' => 'France', 'code'=>'FR']);
        Country::create(['name' => 'Spain', 'code'=>'SP']);
        Country::create(['name' => 'Japan', 'code'=>'JP']);

        #approach #1 - create instance of manufacturer, call save on collection
        $france = Country::where('name', 'France')->first();
        $renault = new Manufacturer();
        $renault->name = 'Renault';
        $france->manufacturers()->save($renault);

        #approach #2 - use "create"  shortcut of collection
        $france->manufacturers()->create(['name' => 'Peugeot']);

        #approach #3 - calling "associate" on sub-object
        $germany = Country::where('name', 'Germany')->first();
        $audi = new Manufacturer();
        $audi->name = 'Audi';
        $audi->country()->associate($germany);
        $audi->save();

        $germany->manufacturers()->create(['name' => 'Volkswagen']);

        $spain = Country::where('name', 'Spain')->first();
        $spain->manufacturers()->create(['name' => 'Seat']);

        $japan = Country::where('name', 'Japan')->first();
        $japan->manufacturers()->create(['name' => 'Toyota']);
        
        $audi = Manufacturer::where('name', 'Audi')->first();
        $audi->carmodels()->create(['name' => 'A4']);
        $audi->carmodels()->create(['name' => 'A6']);
        $audi->carmodels()->create(['name' => 'Q3']);
        $audi->carmodels()->create(['name' => 'Q4']);
        $audi->carmodels()->create(['name' => 'Q5']);

        $vw = Manufacturer::where('name', 'Volkswagen')->first();
        $vw->carmodels()->create(['name' => 'Passat']);
        $vw->carmodels()->create(['name' => 'Golf']);
        $vw->carmodels()->create(['name' => 'Multivan']);

        $seat = Manufacturer::where('name', 'Seat')->first();
        $seat->carmodels()->create(['name' => 'Toledo']);
        $seat->carmodels()->create(['name' => 'Ibiza']);
    }
}