<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarHomestay extends Model
{
    use HasFactory;

    protected $table      = 'kamar_homestay';
    protected $primaryKey = 'kamar_id';

    protected $fillable = [
        'homestay_id',
        'nama_kamar',
        'kapasitas',
        'fasilitas_json',
        'harga',
    ];

    protected $casts = [
        'fasilitas_json' => 'array',
    ];

    // Relasi ke Homestay
    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id');
    }

    // Relasi ke Media (foto kamar)
    // public function media()
    // {
    // return $this->hasMany(Media::class, 'kamar_id');
    // }

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
}
