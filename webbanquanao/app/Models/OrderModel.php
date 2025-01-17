<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class OrderModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'order';
    protected  $guarded = [];
    public function order_detail()
    {
        return $this->hasMany(OrderDetailModel::class, 'order_id', 'id');
    }
}
