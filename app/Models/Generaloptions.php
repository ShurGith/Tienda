<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Generaloptions extends Model
    {
        use HasFactory;
        
        public $timestamps = false;
        
        protected $fillable = [
          'name',
          'value',
        ];
        protected $casts = [
          'id' => 'integer',
        ];
    }
