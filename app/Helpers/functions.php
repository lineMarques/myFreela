<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists("getFreelancer")) {

    function getFreelancer($cargo)
    {
        $freelancer = DB::table('users')
            ->join('experiences', 'experiences.user_id', '=', 'users.id')
            ->join('star_ratings', 'star_ratings.user_id', '=', 'users.id')
            ->select('star_ratings.user_id', DB::raw('avg(star)'))
            ->groupBy('star_ratings.user_id')
            ->where('experiences.jobTitle', '=', $cargo)
            ->orderBy('avg', 'DESC')
            ->limit(10)
            ->get();

        return  $freelancer;
    }
}

if (!function_exists("avgUser")) {

    function avgUser()
    {
        $user = Auth::user();

        $avgUser = DB::table('star_ratings')
            ->select('star_ratings.user_id', DB::raw('avg(star)'))
            ->where('star_ratings.user_id', '=', $user->id)
            ->groupBy('star_ratings.user_id')
            ->first();

        return $avgUser;
    }
}
