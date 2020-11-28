<?php

namespace App\Services;

use App\Models\User;
use App\Models\Resident;

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

    public static function CheckResidentString($string)
    {
        if($string != ''){
            $residents = Resident::where('resident_name', 'like','%'.$string.'%')
                                    ->simplePaginate(5);
        }else{
            $residents = Resident::orderBy('created_at', 'desc')
                        ->simplePaginate(5);
        }

        return $residents;
    }
}