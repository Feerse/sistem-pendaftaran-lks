<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\BidangMataLomba;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaftarLomba extends Model
{
    protected $table = 'daftar_lomba';

    /**
     * Get all of the sekolah for the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sekolah(): HasMany
    {
        return $this->hasMany(Sekolah::class);
    }

    /**
     * Get all of the bidangMataLomba for the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bidangMataLomba(): HasMany
    {
        return $this->hasMany(BidangMataLomba::class);
    }

    /**
     * Get all of the siswa for the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    /**
     * Get all of the guru for the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guru(): HasMany
    {
        return $this->hasMany(Guru::class);
    }
}
