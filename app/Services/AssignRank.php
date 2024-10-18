<?php

namespace App\Services;

class AssignRank
{
    public static function calculate($users){
        $rank = 1;
        foreach ($users as $index => $user) {
            if ($index > 0 && $users[$index - 1]->points != $user->points) {
                $rank = $rank + 1;
            }
            $user->rank = $rank;
            $user->save();
        }
    }
}