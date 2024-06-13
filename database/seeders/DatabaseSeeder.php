<?php

namespace Database\Seeders;

use App\Models\Makanan;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // Buat beberapa user dengan role driver
        User::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'password' => Hash::make('password'),
            'role' => 'driver',
        ]);

        User::create([
            'name' => 'Alice Williams',
            'email' => 'alice@example.com',
            'password' => Hash::make('password'),
            'role' => 'driver',
        ]);

        Makanan::create([
            'nama' => 'Pizza Pepperoni',
            'deskripsi' => 'Pizza dengan topping pepperoni dan keju mozzarella',
            'harga' => 50000,
            'gambar' => 'https://picsum.photos/200/300',
    
        ]);

        Makanan::create([
            'nama' => 'Spaghetti Bolognese',
            'deskripsi' => 'Spaghetti dengan saus daging bolognese',
            'harga' => 40000,
            'gambar' => 'https://picsum.photos/200/600',
        ]);

        Makanan::create([
            'nama' => 'Nasi Goreng Spesial',
            'deskripsi' => 'Nasi goreng dengan campuran sayuran dan daging',
            'harga' => 35000,
            'gambar' => 'https://picsum.photos/500',
        ]);

        $order1 = Order::create([
            'user_id' => 1,
            'status' => 'masuk',
            'tanggal_pesan' => '2023-06-01',
            'jenis_pesanan' => 'food',
            'alamat' => 'Jl. Sudirman No. 123, Kota A',
            'total_harga' => 90000,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'makanan_id' => 1,
            'kuantiti' => 1,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'makanan_id' => 2,
            'kuantiti' => 1,
        ]);

        $order2 = Order::create([
            'user_id' => 2,
            'status' => 'proses',
            'tanggal_pesan' => '2023-06-02',
            'jenis_pesanan' => 'pickup',
            'alamat' => 'Jl. Gambir No. 45, Kota B',
            'total_harga' => 35000,
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'makanan_id' => 3,
            'kuantiti' => 1,
        ]);

        $order3 = Order::create([
            'user_id' => 1,
            'status' => 'selesai',
            'tanggal_pesan' => '2023-06-03',
            'jenis_pesanan' => 'food',
            'alamat' => 'Jl. Sudirman No. 123, Kota A',
            'total_harga' => 120000,
        ]);

        OrderItem::create([
            'order_id' => $order3->id,
            'makanan_id' => 1,
            'kuantiti' => 2,
        ]);

        OrderItem::create([
            'order_id' => $order3->id,
            'makanan_id' => 3,
            'kuantiti' => 1,
        ]);

        $order4 = Order::create([
            'user_id' => 2,
            'status' => 'dibatalkan',
            'tanggal_pesan' => '2023-06-04',
            'jenis_pesanan' => 'pickup',
            'alamat' => 'Jl. Gambir No. 45, Kota B',
            'total_harga' => 75000,
        ]);

        OrderItem::create([
            'order_id' => $order4->id,
            'makanan_id' => 2,
            'kuantiti' => 1,
        ]);

        OrderItem::create([
            'order_id' => $order4->id,
            'makanan_id' => 3,
            'kuantiti' => 1,
        ]);

        $order5 = Order::create([
            'user_id' => 3,
            'status' => 'masuk',
            'tanggal_pesan' => '2023-06-05',
            'jenis_pesanan' => 'food',
            'alamat' => 'Jl. Merdeka No. 78, Kota C',
            'total_harga' => 105000,
        ]);

        OrderItem::create([
            'order_id' => $order5->id,
            'makanan_id' => 1,
            'kuantiti' => 1,
        ]);

        OrderItem::create([
            'order_id' => $order5->id,
            'makanan_id' => 3,
            'kuantiti' => 2,
        ]);

        $order6 = Order::create([
            'user_id' => 4,
            'status' => 'proses',
            'tanggal_pesan' => '2023-06-06',
            'jenis_pesanan' => 'pickup',
            'alamat' => 'Jl. Kemerdekaan No. 90, Kota D',
            'total_harga' => 80000,
        ]);

        OrderItem::create([
            'order_id' => $order6->id,
            'makanan_id' => 2,
            'kuantiti' => 2,
        ]);
    }
}
