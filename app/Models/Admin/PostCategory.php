<?php

namespace App\Models\Admin;

use App\Support\DataTablePaginate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes, DataTablePaginate;

    protected $table = 'post_categories';
    protected $fillable = ['cateName', 'image', 'slug', 'parent_id', 'title', 'keyword', 'description', 'content', 'short_description', 'order', 'status', 'userCreated', 'userUpdated'];
    protected $filter = ['id', 'cateName', 'image', 'slug', 'parent_id', 'title', 'keyword', 'description', 'content', 'short_description', 'order', 'status', 'userCreated', 'created_at'];

    // protected $primaryKey = 'id';
    // protected $guarded = [];
    // private $cateArray = [];
    public function userCre()
    {
        return $this->hasOne('App\Models\User', 'id', 'userCreated');
    }
    public function createdBy()
    {
        return optional($this->userCre)->name;
    }
    // public function userUp()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'userUpdated');
    // }
    // public function parent()
    // {
    //     return $this->hasOne('App\Models\Admin\PostCategory', 'id', 'parent_id');
    // }

    // public function product()
    // {
    //     return $this->hasMany('App\Models\Admin\Products', 'cate_id', 'id');
    // }

    // /* lấy tất cả các xe trả về mảng với id=>Tên xe | phân cha con */
    // public function getCategoriesParents($parent = 0, $level = '--|')
    // {
    //     $data = self::select('id', 'cateName', 'parent_id')->where('status', true)->where('parent_id', $parent)->get();
    //     foreach ($data as $value) {
    //         $this->cateArray[$value->id] = $level . ' ' . $value->cateName;
    //         self::getCategoriesParents($value->id, $level . '--|');
    //     }
    //     return $this->cateArray;
    // }

}