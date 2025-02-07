<?php

namespace App\Models;

use App\Models\Sekolah;
use App\Models\DaftarLomba;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'id_sekolah',
        'program_keahlian',
        'email',
        'nomor_hp'
    ];

    /**
     * Get the sekolah that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }

    /**
     * Get the daftarLomba that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function daftarLomba(): BelongsTo
    {
        return $this->belongsTo(DaftarLomba::class);
    }
}
