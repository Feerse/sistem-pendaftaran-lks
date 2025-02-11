<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\DaftarLomba;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sekolah extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    protected $table = 'sekolah';

    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'email',
        'email_verified_at',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
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
            'password' => 'hashed'
        ];
    }

    public function getFilamentName(): string
    {
        return $this->getAttributeValue('nama_sekolah');
    }

    /**
     * Get all of the siswa for the Sekolah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    /**
     * Get all of the guru for the Sekolah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guru(): HasMany
    {
        return $this->hasMany(Guru::class);
    }

    /**
     * Get all of the daftarLomba for the BidangMataLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daftarLomba(): HasMany
    {
        return $this->hasMany(DaftarLomba::class);
    }
}
