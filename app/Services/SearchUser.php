<?php

namespace App\Services;

use App\Models\User;

class SearchUser {
    public static function CheckString($string)
    {
        // 検索ワード(人名)が入力されているかどうか。
        if($string != ''){
            $users = User::where('name', 'like','%'.$string.'%')
                            ->simplePaginate(5);
        }else{
            $users = User::orderBy('id', 'asc')
                    ->with('unit')        
                    ->simplePaginate(5);
        }

        return $users;
    }
}