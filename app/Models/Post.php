<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    // use Sluggable;

    protected $fillable = ['title', 'excerpt','image', 'body','category_id','user_id'];

    protected $guarded = ['id'];
    protected $with = ['category','user'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search']: false){
        //     return $query->where('title', 'like', '%'  .   $filters['search']  . '%')
        //                           ->orWhere('excerpt', 'like', '%'   .   $filters['search']   .  '%')
        //                           ->orWhere('body', 'like', '%'   .   $filters['search']   .  '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
                return $query->where('title', 'like', '%'  .   $search  . '%')
                                      ->orWhere('excerpt', 'like', '%'   .   $search   .  '%')
                                      ->orWhere('body', 'like', '%'   .   $search   .  '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
                return $query->whereHas('category', function($query) use ($category){
                    $query->where('slug', $category);
                });
        });

        $query->when($filters['user'] ?? false, function($query, $user){
                return $query->whereHas('user', function($query) use ($user){
                    $query->where('username', $user);
                });
        });

        
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }

    // jika ingin mengganti nama function
    // public function author(){
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
