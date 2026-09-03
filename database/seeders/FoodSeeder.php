<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $foodsData = [
                [
                    'name' => 'Dada Ayam Panggang Herbal',
                    'category' => 'lunch',
                    'image' => 'https://images.unsplash.com/photo-1598103442097-8b74394b95c6?auto=format&fit=crop&w=800&q=80',
                    'calories' => 284.00,
                    'protein' => 31.00,
                    'carbohydrate' => 0.00,
                    'fat' => 3.60,
                    'description' => 'Dada ayam tanpa kulit dipanggang dengan baluran minyak zaitun, bawang putih, dan rempah herbal aromatik.',
                    'recipe' => [
                        'cooking_time' => 25,
                        'instructions' => [
                            'Cuci bersih dada ayam dan keringkan permukaannya dengan tisu dapur.',
                            'Lumuri dada ayam dengan minyak zaitun, bawang putih cincang, lada hitam, dan rosemary.',
                            'Diamkan marinasi selama minimal 15 menit agar bumbu meresap.',
                            'Panggang di grill pan panas hingga kedua sisi berwarna cokelat keemasan (6-8 menit per sisi).',
                            'Angkat dan istirahatkan selama 3 menit sebelum dipotong agar sari daging tetap juicy.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Dada Ayam Fillet', 'quantity' => '200 gr'],
                        ['name' => 'Minyak Zaitun', 'quantity' => '1 sdm'],
                        ['name' => 'Bawang Putih', 'quantity' => '2 siung'],
                        ['name' => 'Rosemary Kering', 'quantity' => '1/2 sdt'],
                        ['name' => 'Lada Hitam', 'quantity' => '1/4 sdt'],
                    ],
                    'barcode' => '899100110001',
                ],
                [
                    'name' => 'Nasi Merah Organik',
                    'category' => 'lunch',
                    'image' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=800&q=80',
                    'calories' => 216.00,
                    'protein' => 5.00,
                    'carbohydrate' => 45.00,
                    'fat' => 1.80,
                    'description' => 'Nasi merah pulen kaya serat alami yang menjaga rasa kenyang lebih lama dan mengontrol indeks glikemik.',
                    'recipe' => [
                        'cooking_time' => 35,
                        'instructions' => [
                            'Cuci bersih beras merah dengan air mengalir sebanyak 2-3 kali.',
                            'Masukkan beras merah ke rice cooker dengan perbandingan air 1:2.5.',
                            'Tekan tombol cook dan biarkan hingga matang sempurna.',
                            'Buka penutup dan aduk nasi perlahan agar uap panas merata.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Beras Merah Organik', 'quantity' => '150 gr'],
                        ['name' => 'Air Bersih', 'quantity' => '350 ml'],
                    ],
                    'barcode' => '899100110002',
                ],
                [
                    'name' => 'Oatmeal Buah Berry & Madu',
                    'category' => 'breakfast',
                    'image' => 'https://images.unsplash.com/photo-1517673400267-0251440c45dc?auto=format&fit=crop&w=800&q=80',
                    'calories' => 250.00,
                    'protein' => 7.00,
                    'carbohydrate' => 48.00,
                    'fat' => 4.50,
                    'description' => 'Semangkuk oatmeal hangat dengan paduan susu rendah lemak, buah berry segar, dan sentuhan madu hutan.',
                    'recipe' => [
                        'cooking_time' => 10,
                        'instructions' => [
                            'Masak rolled oats bersama susu rendah lemak di atas panci kecil dengan api sedang-kecil.',
                            'Aduk perlahan selama 4-5 menit hingga tekstur oatmeal mengental lembut.',
                            'Tuang ke dalam mangkuk saji.',
                            'Tata potongan stroberi dan blueberry segar di atasnya, lalu sirami dengan madu murni.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Rolled Oats', 'quantity' => '50 gr'],
                        ['name' => 'Susu Rendah Lemak', 'quantity' => '200 ml'],
                        ['name' => 'Stroberi Segar', 'quantity' => '4 buah'],
                        ['name' => 'Blueberry Segar', 'quantity' => '10 butir'],
                        ['name' => 'Madu Murni', 'quantity' => '1 sdm'],
                    ],
                    'barcode' => '899100110003',
                ],
                [
                    'name' => 'Salmon Panggang Lemon & Peterseli',
                    'category' => 'dinner',
                    'image' => 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?auto=format&fit=crop&w=800&q=80',
                    'calories' => 367.00,
                    'protein' => 34.00,
                    'carbohydrate' => 0.00,
                    'fat' => 22.00,
                    'description' => 'Ikan salmon kaya asam lemak omega-3 dipanggang dengan siraman lemon segar dan peterseli.',
                    'recipe' => [
                        'cooking_time' => 20,
                        'instructions' => [
                            'Keringkan potongan fillet salmon dengan tisu dapur.',
                            'Bumbui kedua sisi dengan sedikit garam laut dan lada putih.',
                            'Panaskan wajan dengan 1 sendok teh minyak zaitun, letakkan sisi kulit di bawah selama 4 menit.',
                            'Balik perlahan, beri perasan air lemon segar di atasnya, dan masak selama 3-4 menit.',
                            'Sajikan dengan taburan daun peterseli segar cincang.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Fillet Salmon Segar', 'quantity' => '180 gr'],
                        ['name' => 'Jeruk Lemon', 'quantity' => '1/2 buah'],
                        ['name' => 'Garam Laut', 'quantity' => 'sejumput'],
                        ['name' => 'Peterseli Segar', 'quantity' => '1 sdm cincang'],
                    ],
                    'barcode' => '899100110004',
                ],
                [
                    'name' => 'Salad Mediterania Segar',
                    'category' => 'dinner',
                    'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=800&q=80',
                    'calories' => 152.00,
                    'protein' => 4.00,
                    'carbohydrate' => 12.00,
                    'fat' => 9.50,
                    'description' => 'Kombinasi renyah daun selada romaine, tomat ceri manis, mentimun jepang, dan keju feta dengan olive oil dressing.',
                    'recipe' => [
                        'cooking_time' => 10,
                        'instructions' => [
                            'Cuci bersih selada romaine, tomat ceri, dan timun di bawah air mengalir.',
                            'Potong selada seukuran satu suapan, belah dua tomat ceri, dan iris tipis mentimun.',
                            'Campur seluruh sayuran dalam mangkuk besar dan tambahkan remahan keju feta.',
                            'Campurkan minyak zaitun dan air lemon dalam wadah kecil, kocok hingga emulsi, lalu siram ke salad.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Selada Romaine', 'quantity' => '100 gr'],
                        ['name' => 'Tomat Ceri', 'quantity' => '6 buah'],
                        ['name' => 'Mentimun Jepang', 'quantity' => '1/2 buah'],
                        ['name' => 'Keju Feta', 'quantity' => '30 gr'],
                    ],
                    'barcode' => '899100110005',
                ],
                [
                    'name' => 'Roti Gandum Panggang & Telur Rebus',
                    'category' => 'breakfast',
                    'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?auto=format&fit=crop&w=800&q=80',
                    'calories' => 230.00,
                    'protein' => 14.00,
                    'carbohydrate' => 24.00,
                    'fat' => 7.50,
                    'description' => 'Menu sarapan klasik padat protein dengan telur rebus setengah matang dan roti gandum renyah bergizi.',
                    'recipe' => [
                        'cooking_time' => 12,
                        'instructions' => [
                            'Rebus telur ayam dalam air mendidih selama 7 menit untuk tingkat kematangan pas.',
                            'Panggang lembaran roti gandum di toaster atau teflon tanpa mentega hingga renyah keemasan.',
                            'Kupas telur rebus, belah menjadi dua bagian.',
                            'Sajikan telur rebus di atas roti gandum dengan taburan sedikit lada hitam.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Telur Ayam', 'quantity' => '2 butir'],
                        ['name' => 'Roti Gandum Utuh', 'quantity' => '1 lembar'],
                    ],
                    'barcode' => '899100110006',
                ],
                [
                    'name' => 'Tumis Tempe & Kacang Panjang Gurih',
                    'category' => 'lunch',
                    'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80',
                    'calories' => 195.00,
                    'protein' => 15.00,
                    'carbohydrate' => 18.00,
                    'fat' => 7.00,
                    'description' => 'Olahan tempe kedelai fermentasi kaya probiotik dan kacang panjang yang ditumis dengan bumbu tradisional.',
                    'recipe' => [
                        'cooking_time' => 15,
                        'instructions' => [
                            'Potong tempe menjadi bentuk dadu kecil, sangrai sebentar di wajan anti lengket.',
                            'Tumis irisan bawang merah, bawang putih, dan cabai merah hingga tercium aroma harum.',
                            'Masukkan potongan kacang panjang dan tuang sedikit air (sekitar 50 ml).',
                            'Tambahkan tempe dan kecap manis rendah gula, masak hingga kacang panjang matang renyah.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Tempe Kedelai', 'quantity' => '100 gr'],
                        ['name' => 'Kacang Panjang', 'quantity' => '50 gr'],
                        ['name' => 'Bawang Merah', 'quantity' => '3 butir'],
                        ['name' => 'Cabai Merah Keriting', 'quantity' => '2 buah'],
                        ['name' => 'Kecap Manis Rendah Gula', 'quantity' => '1 sdm'],
                    ],
                    'barcode' => '899100110007',
                ],
                [
                    'name' => 'Smoothie Pisang Bayam Hijau',
                    'category' => 'snack',
                    'image' => 'https://images.unsplash.com/photo-1553530666-ba11a7da3888?auto=format&fit=crop&w=800&q=80',
                    'calories' => 180.00,
                    'protein' => 4.50,
                    'carbohydrate' => 38.00,
                    'fat' => 1.20,
                    'description' => 'Minuman segar bernutrisi tinggi dari perpaduan daun bayam organik, pisang manis alami, dan air kelapa segar.',
                    'recipe' => [
                        'cooking_time' => 5,
                        'instructions' => [
                            'Masukkan daun bayam segar yang telah dicuci, pisang beku, dan air kelapa ke blender.',
                            'Blender dengan kecepatan maksimal selama 1 menit hingga halus dan berwarna hijau cerah.',
                            'Tuangkan ke dalam gelas saji tinggi.',
                            'Taburkan chia seed di atasnya dan nikmati selagi dingin.',
                        ],
                    ],
                    'ingredients' => [
                        ['name' => 'Pisang Cavendish', 'quantity' => '1 buah'],
                        ['name' => 'Bayam Hijau Segar', 'quantity' => '1 genggam'],
                        ['name' => 'Air Kelapa Murni', 'quantity' => '200 ml'],
                        ['name' => 'Biji Chia (Chia Seeds)', 'quantity' => '1 sdt'],
                    ],
                    'barcode' => '899100110008',
                ],
            ];

            foreach ($foodsData as $item) {
                $food = Food::create([
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'image' => $item['image'],
                    'calories' => $item['calories'],
                    'protein' => $item['protein'],
                    'carbohydrate' => $item['carbohydrate'],
                    'fat' => $item['fat'],
                    'description' => $item['description'],
                ]);

                // Recipe
                $food->recipe()->create([
                    'cooking_time' => $item['recipe']['cooking_time'],
                    'instructions' => $item['recipe']['instructions'],
                ]);

                // Barcode
                $food->barcodes()->create([
                    'barcode' => $item['barcode'],
                ]);

                // Ingredients
                foreach ($item['ingredients'] as $ing) {
                    $ingredient = Ingredient::firstOrCreate(
                        ['name' => $ing['name']],
                        ['image' => null]
                    );

                    $food->ingredients()->attach($ingredient->id, [
                        'quantity' => $ing['quantity'],
                    ]);
                }
            }
        });
    }
}
