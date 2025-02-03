<?php

namespace App\Models;

use App\Models\Sekolah;
use App\Models\DaftarLomba;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'id_sekolah',
        'email',
        'nomor_hp'
    ];

    /**
     * Get the sekolah that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }

    /**
     * Get the daftarLomba that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function daftarLomba(): BelongsTo
    {
        return $this->belongsTo(DaftarLomba::class);
    }
}
