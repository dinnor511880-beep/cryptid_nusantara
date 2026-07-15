<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cryptid;
use App\Models\Sighting;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        // 1. Buat data Cryptids terlebih dahulu (sebagai referensi Sighting)
        $cryptids = [
            ['name' => 'Kuntilanak', 'description' => 'Hantu wanita dengan rambut panjang dan gaun putih. Sering tertawa melengking di malam hari, pertanda berlokasi di atas pohon beringin.', 'danger_level' => 'Medium', 'status' => 'approved', 'user_id' => $user->id],
            ['name' => 'Pocong', 'description' => 'Mayat terbungkus kain kafan yang meloncat-loncat. Berwajah pucat membusuk dengan kapas di hidung.', 'danger_level' => 'Low', 'status' => 'approved', 'user_id' => $user->id],
            ['name' => 'Genderuwo', 'description' => 'Makhluk besar berbulu lebat hitam, tinggi raksasa dengan mata merah menyala. Kerap tercium bau ubi bakar saat kemunculannya.', 'danger_level' => 'High', 'status' => 'approved', 'user_id' => $user->id],
            ['name' => 'Kuyang', 'description' => 'Kepala manusia (biasanya wanita) terbang beserta organ dalam tubuh yang bercahaya kemerahan. Haus akan darah ibu melahirkan.', 'danger_level' => 'Extreme', 'status' => 'approved', 'user_id' => $user->id],
            ['name' => 'Banaspati', 'description' => 'Sosok berupa wujud bola api terbang yang melayang di udara dan dipercayai mampu membakar korbannya jika disentuh.', 'danger_level' => 'Extreme', 'status' => 'approved', 'user_id' => $user->id],
        ];

        $insertedCryptids = [];
        foreach ($cryptids as $c) {
            $insertedCryptids[] = Cryptid::create($c);
        }

        // 2. Buat Laporan Penampakan bervariasi (10 Data)
        $sightings = [
            [
                'cryptid_id' => $insertedCryptids[0]->id, // Kuntilanak
                'user_id' => $user->id,
                'location' => 'Pohon Beringin Tua, Alun-alun Selatan',
                'sighting_date' => Carbon::now()->subDays(2)->toDateString(),
                'kronologi' => 'Saat melintas jam 11 malam, tercium bau melati yang sangat menyengat. Tiba-tiba terdengar suara tawa dari atas dahan pohon beringin. Saya tidak berani melihat ke atas dan langsung lari sekuat tenaga.'
            ],
            [
                'cryptid_id' => $insertedCryptids[1]->id, // Pocong
                'user_id' => $user->id,
                'location' => 'Jalan Setapak Dekat Makam Desa',
                'sighting_date' => Carbon::now()->subDays(5)->toDateString(),
                'kronologi' => 'Motor saya mogok secara tiba-tiba di dekat makam. Saat mencoba menyalakan mesin berulang kali, dari kaca spion saya melihat bayangan putih kusam melompat pelan ke arah saya.'
            ],
            [
                'cryptid_id' => $insertedCryptids[2]->id, // Genderuwo
                'user_id' => $user->id,
                'location' => 'Bambu Runcing, Persimpangan Lama',
                'sighting_date' => Carbon::now()->subDays(10)->toDateString(),
                'kronologi' => 'Awalnya tercium bau singkong yang hangus. Tak lama kemudian terlihat sosok sangat besar dan berbulu lebat mondar-mandir menutupi rembulan di bawah rumpun bambu. Matanya menyala merah terang.'
            ],
            [
                'cryptid_id' => $insertedCryptids[3]->id, // Kuyang
                'user_id' => $user->id,
                'location' => 'Desa Pedalaman Kalimantan',
                'sighting_date' => Carbon::now()->subMonths(1)->toDateString(),
                'kronologi' => 'Saya sedang bejaga di pos ronda. Tiba-tiba melihat kepala wanita berambut panjang melayang dengan organ tubuh yang menggantung bersinar kemerahan melintas tepat di atas atap.'
            ],
            [
                'cryptid_id' => $insertedCryptids[4]->id, // Banaspati
                'user_id' => $user->id,
                'location' => 'Hutan Lindung Lereng Gunung',
                'sighting_date' => Carbon::now()->subDays(15)->toDateString(),
                'kronologi' => 'Saat kemping, terlihat bola api seukuran drum melayang-layang berputar di antara pepohonan. Anehnya, api tersebut tidak membakar ranting di sekitarnya walau suhunya dari kejauhan sangat panas.'
            ],
            [
                'cryptid_id' => $insertedCryptids[0]->id, // Kuntilanak
                'user_id' => $user->id,
                'location' => 'Gedung Terbengkalai Pabrik Gula',
                'sighting_date' => Carbon::now()->subDays(4)->toDateString(),
                'kronologi' => 'Terdengar tangisan wanita tersedu-sedu dari lantai dua. Saat disorot memakai senter HP, terlihat bagian bawah gaun putihnya tembus pandang dan sosok itu langsung menghilang menembus tembok.'
            ],
            [
                'cryptid_id' => $insertedCryptids[1]->id, // Pocong
                'user_id' => $user->id,
                'location' => 'Pos Ronda Belokan Pak Haji',
                'sighting_date' => Carbon::now()->subDays(1)->toDateString(),
                'kronologi' => 'Ada sosok berdiri sangat kaku di sudut gelap dekat gardu listrik. Wajahnya tertutup ikatan kain lusuh, dan suasananya tiba-tiba memancarkan aura dingin yang membuat bulu kuduk berdiri otomatis.'
            ],
            [
                'cryptid_id' => $insertedCryptids[2]->id, // Genderuwo
                'user_id' => $user->id,
                'location' => 'Pekarangan Kosong Belakang Asrama',
                'sighting_date' => Carbon::now()->subDays(3)->toDateString(),
                'kronologi' => 'Anjing menggonggong tiada henti mengarah ke pohon mangga beringas. Saya paksa mengintip dari jendela dan tampak dada raksasa berbulu berkelebat pergi membawa sesuatu.'
            ],
            [
                'cryptid_id' => $insertedCryptids[0]->id, // Kuntilanak
                'user_id' => $user->id,
                'location' => 'Tanjakan Curam Jalan Lintas Provinsi',
                'sighting_date' => Carbon::now()->subMonths(2)->toDateString(),
                'kronologi' => 'Sosok misterius berdiri di tengah-tengah aspal sambil menunduk. Sayangnya, ketika saya secara refleks mengebor rem, sosok itu mengangkat wajah bopeng tersenyum lebar dan seketika lenyap.'
            ],
            [
                'cryptid_id' => $insertedCryptids[4]->id, // Banaspati
                'user_id' => $user->id,
                'location' => 'Perbatasan Sungai Jembatan Merah',
                'sighting_date' => Carbon::now()->subDays(12)->toDateString(),
                'kronologi' => 'Sedang asik memancing malam hari sekira jam 1 dini hari, lalu dari permukaan air sungai keluar pusaran yang berputar menjadi bola api melambung ke arah hutan sebelum sirna selamanya.'
            ],
        ];

        foreach ($sightings as $s) {
            Sighting::create($s);
        }
    }
}
