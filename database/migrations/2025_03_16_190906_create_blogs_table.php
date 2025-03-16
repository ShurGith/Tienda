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
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->longText('content')->nullable();
                $table->text('images')->nullable();
                $table->boolean('active')->default(0);
                $table->dateTime('date_published')->nullable();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('category_id')->nullable();
                $table->timestamps();
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('blogs');
        }
    };
