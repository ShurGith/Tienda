<?php
    
    namespace App\Models;
    
    use Filament\Models\Contracts\FilamentUser;
    use Filament\Models\Contracts\HasAvatar;
    use Filament\Panel;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Support\Str;
    
    class User extends Authenticatable implements FilamentUser, HasAvatar, MustVerifyEmail
    {
        use HasFactory, Notifiable;
        
        protected $fillable = [
          'name', 'email', 'password', 'avatar',
        ];
        
        protected $hidden = [
          'password', 'remember_token',
        ];
        
        public function canAccessPanel(Panel $panel): bool
        {
            if ($panel->getId() === 'admin') {
                return $this->isAdmin();
            }
            return true;
        }
        
        public function isAdmin(): bool
        {
            return $this->id === 1;
        }
        
        // Relación con órdenes como comprador
        
        public function purchases(): HasMany
        {
            return $this->hasMany(Order::class, 'buyer_id');
        }
        
        public function purchasesCount(): int
        {
            return Order::where('buyer_id', $this->id)->count();
        }
        
        // Relación con órdenes como vendedor
        public function sales(): HasMany
        {
            return $this->hasMany(Order::class, 'seller_id');
        }
        
        public function salesCount(): int
        {
            return Order::where('seller_id', $this->id)->count();
        }
        
        public function getFilamentAvatarUrl(): ?string
        {
            if ($this->avatar) {
                return '/'.$this->avatar;
            } else {
                return null;
            }
        }
        
        public function getCountProducts()
        {
            return Product::where('user_id', $this->id)->count();
            
        }
        
        /* public function getCountPosts(): int
         {
             return Blog::where('user_id', $this->id)->count();
             
         }*/
        
        public function products(): HasMany
        {
            return $this->hasMany(Product::class);
        }
        
        public function blog(): HasMany
        {
            return $this->hasMany(Blog::class);
        }
        
        public function initials(): string
        {
            return Str::of($this->name)
              ->explode(' ')
              ->map(fn(string $name) => Str::of($name)->substr(0, 1))
              ->implode('');
        }
        
        protected function casts(): array
        {
            return [
              'email_verified_at' => 'datetime',
              'password' => 'hashed',
            ];
        }
    }
