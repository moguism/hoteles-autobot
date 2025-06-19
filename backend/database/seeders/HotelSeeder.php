<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Este primer hotel está para poder hacer una wishlist para un servicio de cualquier hotel
        Hotel::create([
            "id" => 1,
            "name" => "ANY",
            "address" => "ANY",
            "xotelo_hotel_key" => "-1"
        ]);

        Hotel::create([
            "id" => 2,
            "name" => "Iberostar Waves Malaga Playa",
            "address" => "Avenida Ferrara, S/N. Torrox Costa",
            "xotelo_hotel_key" => "g27428495-d1220086",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/d9/98/a6/iberostar-malaga-playa.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g27428495-d1220086-Reviews-Iberostar_Waves_Malaga_Playa-Urb_Cerro_Garbancito_Torrox_Costa_del_Sol_Province_of_M.html"
        ]);

        Hotel::create([
            "id" => 3,
            "name" => "Barcelo Malaga",
            "address" => "Estación Vialia Maria Zambrano, C. Héroe De Sostoa, 2",
            "xotelo_hotel_key" => "g187438-d650588",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/d0/88/d4/barcelo-malaga.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d650588-Reviews-Barcelo_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 4,
            "name" => "Hotel Costa Málaga (Adults recommended)",
            "address" => "Avenida de Isabel Manoja, 9",
            "xotelo_hotel_key" => "g187440-d507817",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/2a/5a/89/exterior-view.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187440-d507817-Reviews-Hotel_Costa_Malaga_Adults_recommended-Torremolinos_Costa_del_Sol_Province_of_Malaga_And.html"
        ]);

        Hotel::create([
            "id" => 5,
            "name" => "H10 Croma Málaga",
            "address" => "Calle Prim 4",
            "xotelo_hotel_key" => "g187438-d23843116",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/1d/5d/c4/plonge-pool.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d23843116-Reviews-H10_Croma_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 6,
            "name" => "Only You Hotel Málaga",
            "address" => "Calle Alameda Principal 1",
            "xotelo_hotel_key" => "g187438-d23354030",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1e/0b/cf/98/junior-suite.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d23354030-Reviews-Only_You_Hotel_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 7,
            "name" => "Ac Hotel Malaga Palacio",
            "address" => "Cortina Del Muelle, 1",
            "xotelo_hotel_key" => "g187438-d229663",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/d4/7b/19/exterior.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d229663-Reviews-Ac_Hotel_Malaga_Palacio-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 8,
            "name" => "Ilunion Málaga",
            "address" => "Paseo Maritimo Antonio Machado, 10",
            "xotelo_hotel_key" => "g187438-d530504",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2c/29/72/db/outdoor-pool.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d530504-Reviews-Ilunion_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 9,
            "name" => "NH Malaga",
            "address" => "Calle San Jacinto 2",
            "xotelo_hotel_key" => "g187438-d206956",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2e/19/03/aa/swimming-pool.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d206956-Reviews-NH_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 10,
            "name" => "Sallés hotel Málaga Centro",
            "address" => "Calle Marmoles 6",
            "xotelo_hotel_key" => "g187438-d231661",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2c/20/51/72/xgb.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d231661-Reviews-Salles_hotel_Malaga_Centro-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);

        Hotel::create([
            "id" => 11,
            "name" => "Petit Palace Plaza Malaga",
            "address" => "Calle de Nicasio Calle 3",
            "xotelo_hotel_key" => "g187438-d657274",
            "xotelo_photo_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2c/29/bd/c1/c73d21-guest-room.jpg",
            "xotelo_hotel_url" => "https://www.tripadvisor.com/Hotel_Review-g187438-d657274-Reviews-Petit_Palace_Plaza_Malaga-Malaga_Costa_del_Sol_Province_of_Malaga_Andalucia.html"
        ]);
    }
}
