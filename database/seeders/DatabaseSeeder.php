<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Message;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        fake()->seed(20260825);

        $categories = collect([
            ['name' => 'Coffee', 'description' => 'Kopi pilihan dengan biji lokal Indonesia.'],
            ['name' => 'Non-Coffee', 'description' => 'Minuman segar tanpa kopi untuk semua suasana.'],
            ['name' => 'Dessert', 'description' => 'Hidangan manis untuk teman minum dan bersantai.'],
            ['name' => 'Food', 'description' => 'Makanan ringan dan hidangan utama bergaya cafe.'],
        ])->mapWithKeys(function (array $attributes) {
            $category = MenuCategory::firstOrCreate(
                ['name' => $attributes['name']],
                ['description' => $attributes['description']],
            );

            return [$category->name => $category];
        });

        $items = [
            'Coffee' => [
                ['name' => 'Es Kopi Susu Gula Aren', 'description' => 'Espresso, susu segar, dan gula aren dengan rasa karamel lembut.', 'price' => 28000],
                ['name' => 'Kopi Tubruk Nusantara', 'description' => 'Kopi robusta lokal dengan seduhan tradisional yang harum.', 'price' => 22000],
                ['name' => 'Cappuccino', 'description' => 'Espresso dengan steamed milk dan busa susu yang lembut.', 'price' => 30000],
                ['name' => 'Cafe Latte', 'description' => 'Espresso dan susu creamy dengan rasa seimbang.', 'price' => 30000],
                ['name' => 'Americano', 'description' => 'Espresso dan air panas dengan karakter kopi yang clean.', 'price' => 24000],
            ],
            'Non-Coffee' => [
                ['name' => 'Matcha Latte', 'description' => 'Matcha Jepang dan susu segar dengan rasa earthy yang halus.', 'price' => 32000],
                ['name' => 'Cokelat Hazelnut', 'description' => 'Cokelat hangat dengan sentuhan hazelnut yang wangi.', 'price' => 30000],
                ['name' => 'Lychee Tea', 'description' => 'Teh melati dingin dengan leci dan aroma floral.', 'price' => 26000],
                ['name' => 'Lemon Tea', 'description' => 'Teh hitam dingin dengan perasan lemon segar.', 'price' => 22000],
                ['name' => 'Es Teh Manis', 'description' => 'Teh hitam klasik disajikan dingin dan menyegarkan.', 'price' => 12000],
            ],
            'Dessert' => [
                ['name' => 'Pisang Goreng Keju', 'description' => 'Pisang goreng renyah dengan keju dan susu kental manis.', 'price' => 28000],
                ['name' => 'Classic Cheesecake', 'description' => 'Cheesecake lembut dengan saus buah beri.', 'price' => 35000],
                ['name' => 'Chocolate Brownie', 'description' => 'Brownie cokelat fudgy dengan taburan kacang almond.', 'price' => 32000],
                ['name' => 'Pandan Waffle', 'description' => 'Waffle pandan harum dengan es krim vanila.', 'price' => 33000],
                ['name' => 'Es Cendol Cafe', 'description' => 'Cendol, santan, gula aren, dan es serut dalam sajian modern.', 'price' => 26000],
            ],
            'Food' => [
                ['name' => 'Nasi Goreng Kampung', 'description' => 'Nasi goreng dengan ayam suwir, telur, dan acar segar.', 'price' => 38000],
                ['name' => 'Mie Goreng Jawa', 'description' => 'Mie goreng dengan sayuran, ayam, telur, dan bumbu Jawa.', 'price' => 36000],
                ['name' => 'Chicken Katsu Rice', 'description' => 'Ayam katsu renyah dengan nasi dan saus kari Jepang.', 'price' => 45000],
                ['name' => 'Toast Ayam Sambal Matah', 'description' => 'Roti panggang isi ayam dengan sambal matah segar.', 'price' => 34000],
                ['name' => 'Kentang Goreng Truffle', 'description' => 'Kentang goreng renyah dengan aroma truffle dan parmesan.', 'price' => 32000],
            ],
        ];

        foreach ($items as $categoryName => $categoryItems) {
            foreach ($categoryItems as $attributes) {
                MenuItem::updateOrCreate(
                    ['category_id' => $categories[$categoryName]->id, 'name' => $attributes['name']],
                    $attributes + ['is_available' => true],
                );
            }
        }

        $reservations = [
            ['customer_name' => 'Aulia Rahma', 'phone' => '081234567890', 'email' => 'aulia.rahma@example.com', 'reservation_date' => now()->addDays(2)->toDateString(), 'reservation_time' => '18:00:00', 'guest_count' => 4, 'special_request' => 'Minta meja dekat jendela.', 'status' => 'confirmed'],
            ['customer_name' => 'Budi Santoso', 'phone' => '081298765432', 'email' => 'budi.santoso@example.com', 'reservation_date' => now()->addDays(3)->toDateString(), 'reservation_time' => '19:30:00', 'guest_count' => 2, 'special_request' => null, 'status' => 'pending'],
            ['customer_name' => 'Citra Lestari', 'phone' => '082112223333', 'email' => 'citra.lestari@example.com', 'reservation_date' => now()->subDays(4)->toDateString(), 'reservation_time' => '12:00:00', 'guest_count' => 3, 'special_request' => 'Perayaan ulang tahun kecil.', 'status' => 'completed'],
            ['customer_name' => 'Dimas Pratama', 'phone' => '085612345678', 'email' => 'dimas.pratama@example.com', 'reservation_date' => now()->addDays(5)->toDateString(), 'reservation_time' => '15:00:00', 'guest_count' => 5, 'special_request' => 'Mohon siapkan kursi bayi.', 'status' => 'confirmed'],
            ['customer_name' => 'Eka Wulandari', 'phone' => '089512345678', 'email' => 'eka.wulandari@example.com', 'reservation_date' => now()->subDays(8)->toDateString(), 'reservation_time' => '10:00:00', 'guest_count' => 2, 'special_request' => null, 'status' => 'cancelled'],
            ['customer_name' => 'Fajar Hidayat', 'phone' => '081377788899', 'email' => 'fajar.hidayat@example.com', 'reservation_date' => now()->addDays(7)->toDateString(), 'reservation_time' => '18:00:00', 'guest_count' => 6, 'special_request' => 'Butuh area yang tenang.', 'status' => 'pending'],
            ['customer_name' => 'Gita Maharani', 'phone' => '082233445566', 'email' => 'gita.maharani@example.com', 'reservation_date' => now()->subDays(10)->toDateString(), 'reservation_time' => '19:30:00', 'guest_count' => 4, 'special_request' => null, 'status' => 'completed'],
            ['customer_name' => 'Hendra Wijaya', 'phone' => '087788990011', 'email' => 'hendra.wijaya@example.com', 'reservation_date' => now()->addDays(10)->toDateString(), 'reservation_time' => '12:00:00', 'guest_count' => 8, 'special_request' => 'Pesanan tanpa kacang.', 'status' => 'confirmed'],
            ['customer_name' => 'Intan Permata', 'phone' => '081945678901', 'email' => 'intan.permata@example.com', 'reservation_date' => now()->addDays(12)->toDateString(), 'reservation_time' => '15:00:00', 'guest_count' => 3, 'special_request' => null, 'status' => 'pending'],
            ['customer_name' => 'Joko Saputra', 'phone' => '083812345678', 'email' => 'joko.saputra@example.com', 'reservation_date' => now()->subDays(14)->toDateString(), 'reservation_time' => '18:00:00', 'guest_count' => 2, 'special_request' => null, 'status' => 'cancelled'],
        ];

        foreach ($reservations as $reservation) {
            Reservation::factory()->create($reservation);
        }

        $messages = [
            ['name' => 'Nadia Putri', 'email' => 'nadia.putri@example.com', 'subject' => 'Pertanyaan menu vegan', 'message' => 'Apakah tersedia pilihan makanan vegan untuk makan siang?', 'status' => 'unread'],
            ['name' => 'Rizky Kurniawan', 'email' => 'rizky.k@example.com', 'subject' => 'Reservasi meja', 'message' => 'Saya ingin menanyakan ketersediaan meja untuk akhir pekan.', 'status' => 'read'],
            ['name' => 'Sari Amalia', 'email' => 'sari.amalia@example.com', 'subject' => 'Kerja sama acara', 'message' => 'Kami tertarik mengadakan acara komunitas kecil di Melody Cafe.', 'status' => 'unread'],
            ['name' => 'Taufik Haryono', 'email' => 'taufik.h@example.com', 'subject' => 'Jam operasional', 'message' => 'Mohon info jam operasional cafe pada hari Minggu.', 'status' => 'read'],
            ['name' => 'Vina Oktaviani', 'email' => 'vina.oktaviani@example.com', 'subject' => 'Saran untuk cafe', 'message' => 'Akan menyenangkan jika tersedia colokan tambahan di area kerja.', 'status' => 'read'],
            ['name' => 'Wahyu Setiawan', 'email' => 'wahyu.setiawan@example.com', 'subject' => 'Menu kopi', 'message' => 'Biji kopi apa yang digunakan untuk kopi susu gula aren?', 'status' => 'unread'],
            ['name' => 'Yuni Kartika', 'email' => 'yuni.kartika@example.com', 'subject' => 'Pesanan ulang tahun', 'message' => 'Apakah cafe dapat membantu menyiapkan dessert untuk ulang tahun?', 'status' => 'unread'],
            ['name' => 'Zaki Maulana', 'email' => 'zaki.maulana@example.com', 'subject' => 'Akses Wi-Fi', 'message' => 'Apakah tersedia Wi-Fi untuk pelanggan?', 'status' => 'read'],
        ];

        foreach ($messages as $message) {
            Message::factory()->create($message);
        }

        User::updateOrCreate(
            ['email' => 'admin@melodycafe.test'],
            [
                'name' => 'Melody Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => UserRole::Admin,
            ],
        );
    }
}
