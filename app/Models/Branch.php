<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'branches';
    protected $fillable = ['name', 'desc', 'status'];

    public function products(){
        return $this->hasMany(Product::class, 'branch_id')->withTrashed();
    }
}
