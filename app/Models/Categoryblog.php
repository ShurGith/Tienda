<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    
    class Categoryblog extends Model
    {
        public $timestamps = false;
        
        protected $fillable = [
          'name', 'image', 'icon', 'ico_active', 'color', 'bg_color'
        ];
        protected $casts = [
          'name' => 'string',
          'image' => 'string',
          'ico_active' => 'boolean',
          'color' => 'string',
          'icon' => 'string',
          'bg_color' => 'string',
        ];
        
        
        public function blog(): BelongsToMany
        {
            return $this->belongsToMany(Blog::class);
        }
        
        public function tagblogs(): HasMany
        {
            $this->hasMany(Tagblog::class);
        }
    }
