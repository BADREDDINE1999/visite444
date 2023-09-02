<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
class CreateClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'nom_client' => 'BADREDDINE HOUSSNI',
                'societe' => 'BEH',
                'c_client' => '1',
                'tele_client' => '0642415688',
                'tele_client2' => '0670569002',
                'ville' => 'SETTAT',
                'region' => 'SETTAT',
                'localisation' => 'PAM',
                'photo' => 'NULL',
                'game_commercialise' => 'GAMME15',
                'marque_commercialise' => 'MARQUE2',
                'fournisseur' => 'FOURNISSEUR10',
                'user_id' => '1'

            ],
            [
                'nom_client' => 'YOUNESS MORCHID',
                'societe' => '  OPTECH',
                'c_client' => '2',
                'tele_client' => '0697005538',
                'tele_client2' => '0707070707',
                'ville' => 'SETTAT',
                'region' => 'SETTAT',
                'localisation' => 'MJMKH',
                'photo' => 'NULL',
                'game_commercialise' => 'GAMME66',
                'marque_commercialise' => 'MARQUE99',
                'fournisseur' => 'FOURNISSEUR100',
                'user_id' => '1'
            ],
            /*[
                'nom_client' => '',
                'societe' => '',
                'c_client' => 'NULL',
                'tele_client' => '',
                'tele_client2' => '',
                'ville' => '',
                'region' => '',
                'localisation' => '',
                'photo' => '',
                'game_commercialise' => '',
                'marque_commercialise' => '',
                'fournisseur' => '',
                'user_id' => '1'
            ],
            [
                'nom_client' => '',
                'societe' => '',
                'c_client' => 'NULL',
                'tele_client' => '',
                'tele_client2' => '',
                'ville' => '',
                'region' => '',
                'localisation' => '',
                'photo' => '',
                'game_commercialise' => '',
                'marque_commercialise' => '',
                'fournisseur' => '',
                'user_id' => '1'
            ], */   
        ];
        foreach ($clients as $key => $client) {
            Client::create($client);
        }
    }
}
