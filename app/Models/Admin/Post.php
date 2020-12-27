<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['name', 'display', 'category_id', 'image', 'image_small', 'slug', 'views', 'title', 'keyword', 'description', 'content', 'short_description', 'order', 'status', 'userCreated', 'userUpdated'];
    // protected $primaryKey = 'id';
    protected $guarded = [];
    public function userCre()
    {
        return $this->hasOne('App\Models\User', 'id', 'userCreated');
    }
    public function userUp()
    {
        return $this->hasOne('App\Models\User', 'id', 'userUpdated');
    }
    public function category()
    {
        return $this->hasOne('App\Models\Admin\PostCategory', 'id', 'category_id');
    }

    public function getAllPost()
    {
        return self::where('status', true)->get()->pluck('name', 'id')->toArray();
    }

    //liên kết n-n tag bài viết
    public function tags()
    {
        return $this->belongsToMany('App\Models\Admin\Tags', "posts_tags", 'post_id', 'tag_id')->withTimestamps();
    }
    //liên kết n-n bài viết liên quan
    public function postRelated()
    {
        return $this->belongsToMany('App\Models\Admin\Post', "posts_posts_related", 'post_id', 'related_id')->withTimestamps();
    }
    //liên kết n-n bài viết liên quan
    public function productRelated()
    {
        return $this->belongsToMany('App\Models\Admin\Product', "posts_products_related", 'post_id', 'product_id')->withTimestamps();
    }

}