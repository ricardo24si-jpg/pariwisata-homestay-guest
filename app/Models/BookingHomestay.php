<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHomestay extends Model
{
    use HasFactory;

    protected $table = 'booking_homestay';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'kamar_id',
        'warga_id',
        'checkin',
        'checkout',
        'total',
        'status',
        'metode_bayar',
    ];

    protected $casts = [
        'checkin'  => 'date',
        'checkout' => 'date',
        'total'    => 'decimal:2',
    ];

    /** RELASI */
    public function kamar()
    {
        return $this->belongsTo(KamarHomestay::class, 'kamar_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'booking_homestay')
            ->orderBy('sort_order');
    }
}
