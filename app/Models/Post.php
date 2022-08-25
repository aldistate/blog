<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = ['id'];
    
    //untuk function eloquent relationship user dan category dibawah 
    protected $with = ['user', 'category'];

    // function fillter searcing
    public function scopeFillter($query, array $filters)
    {
        // mencari berdasarkan title atau body post
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
        });

        // mencari berdasarkan kategori
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // mencari berdasarkan user/author
        // versi arrow function
        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) =>
                $query->where('slug', $user)
            )
        );
    }

    // untuk eloquent relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // agar dalam method resource tidak mencari id lagi, melainkan slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // untuk otomatis di buatkan slug sesuai judul
    // harus menginstall packagenya terlebih dahulu
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
