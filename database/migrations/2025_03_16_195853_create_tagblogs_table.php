<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('tagblogs', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->boolean('ico_active')->default(0);
                $table->string('image')->nullable();
                $table->string('icon')->nullable();
                $table->string('color')->nullable();
                $table->string('bg_color')->nullable();
                $table->foreignId('category_id')->constrained('category');
                
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('tagblogs');
        }
    };
