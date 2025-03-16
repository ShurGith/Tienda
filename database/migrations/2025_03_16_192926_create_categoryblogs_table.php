<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up(): void
        {
            Schema::create('categoryblogs', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->boolean('ico_active')->default(0);
                $table->string('image')->nullable();
                $table->string('icon')->nullable();
                $table->string('color')->nullable();
                $table->string('bg_color')->nullable();
                
            });
        }
        
        public function down(): void
        {
            Schema::dropIfExists('categoryblogs');
        }
    };
