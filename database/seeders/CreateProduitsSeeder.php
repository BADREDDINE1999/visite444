<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produits = [
                        [
                            'code_article' => '1',
                            'designation' => 'des1',
                            'prix' => '10',
                            'stock' => '40',
                            'fournisseur' => 'fourni12',
                            'marque' => 'marque301',
                            'note' => 'note14',
                            'type' => 'TYPE1',
                            'photo' => 'NULL'         
                        ],
                        [
                            'code_article' => '2',
                            'designation' => 'des2',
                            'prix' => '20',
                            'stock' => '60',
                            'fournisseur' => 'fourni60',
                            'marque' => 'marque310',
                            'note' => 'note15',
                            'type' => 'type2',
                            'photo' => 'NULL'         
                        ],
                        [
                            'code_article' => '3',
                            'designation' => 'des3',
                            'prix' => '30',
                            'stock' => '80',
                            'fournisseur' => 'fourni70',
                            'marque' => 'marque303',
                            'note' => 'note14',
                            'type' => 'TYPE3',
                            'photo' => 'note14'         
                        ]
                        ];
                        foreach ($produits as $key => $produit) {
                            Produit::create($produit);
                        }                
    }
}
