<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\BidangMataLomba;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaftarLomba extends Model
{
    protected $table = 'daftar_lomba';

    protected $fillable = ['id_sekolah', 'id_bidang_mata_lomba', 'id_siswa', 'id_guru'];

    /**
     * Get the sekolah that owns the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }

    /**
     * Get the bidangMataLomba that owns the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidang_mata_lomba()
    {
        return $this->belongsTo(BidangMataLomba::class, 'id_bidang_mata_lomba');
    }

    /**
     * Get the siswa that owns the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    /**
     * Get the guru that owns the DaftarLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
