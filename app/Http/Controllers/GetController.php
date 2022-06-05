<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Models\Users;
use Illuminate\Http\Request;

class GetController extends Controller
{
    /**
     * 表单填写
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   public function TakeForm(Request $request){
       $state = auth('api')->user()->state;
       if($state == 0){
       $user_id = auth('api')->user()->id;
       $active_name=$request['active_name'];
       $active_place=$request['active_place'];
       $time_begin=$request['time_begin'];
       $time_end=$request['time_end'];
       $active_nature=$request['active_nature'];
       $special_resources=$request['special_resources'];
       $form=$request['form'];

       $res = information::putinto($user_id,$active_name,$active_place,$time_begin,$time_end,$active_nature,$special_resources,$form);
              Users::state($user_id);
       return $res ?
           json_success('操作成功',$res,200):
           json_fail('操作失败',false,100);
       }
       else
           return   json_fail('您已经添加过表单！无法再次添加',false,101);
   }

    /**
     * 表单查看
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function look(){
        $user_id = auth('api')->user()->id;
        $res = information::looks($user_id);
        return $res ?
            json_success('操作成功',$res,200):
            json_fail('操作失败',false,100);
    }
}
