<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Panel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Filament\Panel\Concerns\HasAvatars;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar, MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles;

    //add spatie with Hasrole

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'avatar_url',
    // ];

    // protected $guarded = []

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //     public function canAccessPanel(): bool
    // {
    //     return $this->hasRole('admin');
    // }

    //Avatar
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::disk('public')
        ->url($this->avatar_url) : null;
        //return $this->avatar_url;
       // return asset($this->avatar_url);//replace with $this->photo
    }


    // public static function generatePassword($password){
    //     if($password == null){
    //         $password = Hash::make('password');
    //     }
    //     if(User::where('password', $password)->exists()){
    //         $newPassword = $password.Hash::make('password');
    //         $password =self::generatePassword($newPassword);
    //     }
    //     return $password;
    // }


    public function canAccessPanel(Panel $panel): bool
    {
       return true;
    }

    //relationship method
    public function keranjang() :HasMany{
        return $this->hasMany(Keranjang::class);
    }


}
