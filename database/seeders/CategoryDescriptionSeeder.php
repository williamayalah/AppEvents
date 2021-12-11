<?php

namespace Database\Seeders;

use App\Models\CategoryDescription;
use Illuminate\Database\Seeder;

class CategoryDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoryDescription1=new CategoryDescription();
        $categoryDescription1->name='Partido de Futbol';
        $categoryDescription1->language='es';
        $categoryDescription1->category_id=1;
        $categoryDescription1->save();
        
        $categoryDescription2=new CategoryDescription();
        $categoryDescription2->name='Soccer Game';
        $categoryDescription2->language='en';
        $categoryDescription2->category_id=1;
        $categoryDescription2->save();

        $categoryDescription3=new CategoryDescription();
        $categoryDescription3->name='Partido de Futbol';
        $categoryDescription3->language='gl';
        $categoryDescription3->category_id=1;
        $categoryDescription3->save();

        //
        $categoryDescription4=new CategoryDescription();
        $categoryDescription4->name='Obra de Teatro';
        $categoryDescription4->language='es';
        $categoryDescription4->category_id=2;
        $categoryDescription4->save();
        
        $categoryDescription5=new CategoryDescription();
        $categoryDescription5->name='Play';
        $categoryDescription5->language='en';
        $categoryDescription5->category_id=2;
        $categoryDescription5->save();

        $categoryDescription6=new CategoryDescription();
        $categoryDescription6->name='Xogar';
        $categoryDescription6->language='gl';        
        $categoryDescription6->category_id=2;
        $categoryDescription6->save();


    }
}
