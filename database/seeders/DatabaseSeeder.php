<?php
    
    namespace Database\Seeders;
    
    use App\Models\Tag;
    use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    
    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            /*
            User::factory()->create([
              'name' => 'Juan Jota',
              'email' => 'esnola@gmail.com',
              'password' => Hash::make('12345678')
            ]);
            
            User::factory(30)->create();
            
            Generaloptions::factory()->create([
              'name' => 'hide_no_actives',
              'value' => 0
            ]);
            Generaloptions::factory()->create([
              'name' => 'hide_no_existences',
              'value' => 0
            ]);
            
            for ($i = 0; $i < 5; $i++) {
                Category::factory()->create([
                  'name' => fake()->firstName(),
                  'color' => fake()->colorName(),
                  'bgcolor' => fake()->colorName(),
                ]);
            }
            for ($i = 0; $i < 15; $i++) {
                Tag::factory()->create([
                  'name' => fake()->firstName(),
                  'color' => fake()->colorName(),
                  'bgcolor' => fake()->colorName(),
                  'category_id' => rand(1, 5),
                  'icon_active' => fake()->boolean(),
                ]);
            }
            for ($i = 0; $i < 250; $i++) {
                Product::factory()->create([
                  'name' => fake()->firstName(),
                  'description' => fake()->paragraph(5),
                  'price' => rand(1000, 125000),
                  'oferta' => fake()->boolean(),
                  'descuento' => rand(5, 85),
                  'units' => rand(0, 25),
                    //'tag_id' => rand(1, 10),
                  'user_id' => rand(1, 10),
                  'category_id' => rand(1, 5),
                  'active' => fake()->boolean(),
                ]);
            }
            
            for ($i = 0; $i < 200; $i++) {
                Blog::factory()->create([
                  'title' => fake()->sentence(3),
                  'content' => fake()->paragraph(5),
                  'user_id' => rand(1, 5),
                  'active' => rand(0, 1),
                
                ]);
            }*/
            function generateSlug($string)
            {
                $string = trim($string);
                // Convertir a minúsculas
                $string = mb_strtolower($string, 'UTF-8');
                
                // Reemplazar caracteres especiales con su equivalente sin tilde
                $string = preg_replace('/[áàäâ]/u', 'a', $string);
                $string = preg_replace('/[éèëê]/u', 'e', $string);
                $string = preg_replace('/[íìïî]/u', 'i', $string);
                $string = preg_replace('/[óòöô]/u', 'o', $string);
                $string = preg_replace('/[úùüû]/u', 'u', $string);
                $string = preg_replace('/[ñ]/u', 'n', $string);
                
                // Reemplazar cualquier carácter no alfanumérico por guiones
                $string = preg_replace('/[^a-z0-9]+/u', '-', $string);
                
                // Eliminar guiones al inicio y final
                $string = trim($string, '-');
                
                return $string;
            }
            
            $products = Tag::whereNull('slug')->orWhere('slug', '')->get();
            
            foreach ($products as $product) {
                $product->slug = generateSlug($product->name);
                $product->save();
            }
            
        }
    }
