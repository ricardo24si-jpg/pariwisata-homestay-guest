<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $table      = 'homestay';
    protected $primaryKey = 'homestay_id';

    protected $fillable = [
        'pemilik_warga_id',
        'nama',
        'alamat',
        'rt',
        'rw',
        'fasilitas_json',
        'harga_per_malam',
        'status',
    ];

    protected $casts = [
        'fasilitas_json'  => 'array',
        'harga_per_malam' => 'decimal:2',
    ];

    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    // === SEARCH LIKE ===
    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }

    /**
     * Relasi ke tabel Warga (jika tabel warga ada)
     */
    public function pemilik()
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    /**
     * Relasi ke tabel KamarHomestay
     */
    public function kamars()
    {
        return $this->hasMany(KamarHomestay::class, 'homestay_id', 'homestay_id');
    }

}
