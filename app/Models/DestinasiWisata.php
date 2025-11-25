<?php
namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;

    protected $table      = 'destinasi_wisata';
    protected $primaryKey = 'destinasi_id';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'rt',
        'rw',
        'jam_buka',
        'tiket',
        'kontak',
    ];

    public function scopeFilter(Builder $query, $request, $columns)
    {
        foreach ($columns as $col) {
            if ($request->filled($col)) {
                $query->where($col, $request->$col);
            }
        }

        return $query;
    }

    // === SEARCH ===
    public function scopeSearch(Builder $query, $request, $columns)
    {
        if (! $request->filled('search')) {
            return $query;
        }

        $value = $request->search;

        return $query->where(function ($q) use ($columns, $value) {
            foreach ($columns as $col) {
                $q->orWhere($col, 'LIKE', "%{$value}%");
            }
        });
    }
}
