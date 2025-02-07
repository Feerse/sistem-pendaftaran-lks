<?php

namespace App\Models;

use App\Models\DaftarLomba;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BidangMataLomba extends Model
{
    use HasFactory;

    protected $table = 'bidang_mata_lomba';

    protected $fillable = ['nama_bidang_mata_lomba'];

    /**
     * Get the daftarLomba that owns the BidangMataLomba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function daftarLomba(): BelongsTo
    {
        return $this->belongsTo(DaftarLomba::class);
    }
}
