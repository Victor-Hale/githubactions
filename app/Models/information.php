<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    protected $table = "information";
    public $timestamps = true;
    protected $primaryKey ="id";
    protected $guarded =[];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public static function putinto($user_id,$active_name,$active_place,$time_begin,$time_end,$active_nature,$special_resources,$form){
        try {
             $date = self::create([
                 'user_id'=>$user_id,
                 'active_name'=>$active_name,
                 'active_place'=>$active_place,
                 'time_begin'=>$time_begin,
                 'time_end'=>$time_end,
                 'active_nature'=>$active_nature,
                 'special_resources'=>$special_resources,
                 'form'=>$form,
             ]);
            return $date;
        }catch (\Exception $e){
            echo '捕获异常: ', $e->getMessage(),'<br>';
            return false;
        }
    }


    public static function looks($user_id){
        try {
            $date = self::join('user','information.user_id','user.id')->where('user.id',$user_id)->get();
            return $date;
        }catch (\Exception $e){
            echo '捕获异常: ', $e->getMessage(),'<br>';
            return false;
        }
    }
}
