<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    
    class Product extends Model
    {
        use HasFactory;
        
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
          'name',
          'description',
          'images',
          'features',
          'price',
          'active',
          'oferta',
          'descuento',
          'units',
          'stars',
          'user_id',
          'category_id',
        ];
        
        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
          'id' => 'integer',
          'images' => 'array',
          'active' => 'boolean',
          'oferta' => 'boolean',
          'user_id' => 'integer',
          'category_id' => 'integer',
        ];
        
        public function featuresproducts(): HasMany
        {
            return $this->hasMany(Featuresproduct::class);
        }
        
        public function tags(): BelongsToMany
        {
            return $this->belongsToMany(Tag::class);
        }
        
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
        
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
    }
