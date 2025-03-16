<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Laravolt\Avatar\Facade as Avatar;
    
    class Blog extends Model
    {
        use HasFactory;
        
        protected $fillable = [
          'title', 'content', 'images', 'category_id', 'active',
          'date_published', 'user_id',
        ];
        
        protected $casts = [
          'images' => 'array',
          'active' => 'boolean',
          'category_id' => 'integer'
        ];
        
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
        
        public function getImgPal()
        {
            if (isset($this->images)) {
                if (count($this->images) > 0) {
                    return asset($this->images[0]);
                }
            }
            return Avatar::create($this->title)->toBase64();
        }
        
        public function category(): BelongsTo
        {
            return $this->belongsTo(Categoryblog::class);
        }
        
    }
