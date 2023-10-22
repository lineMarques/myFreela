<?php


use Illuminate\Support\Facades\DB;

if (!function_exists("getFreelancer")) {

    function getFreelancer($cargo)
    {
        /*  $freelancer = DB::table('star_ratings', 'av')
            ->join('users', 'av.ratingablle_id', '=', 'users.id')
            ->join('experiences', 'experiences.user_id', '=', 'users.id')
            ->select('ratingablle_id', DB::raw('avg(star)'))
            ->groupBy('ratingablle_id')
            ->where('experiences.jobTitle', '=', $cargo)
            ->orderBy('avg', 'DESC')
            ->limit(10)
            ->get();
 */
        $freelancer = DB::table('users')
            ->join('experiences', 'experiences.user_id', '=', 'users.id')
            ->join('star_ratings', 'star_ratings.ratingablle_id', '=', 'users.id')
            ->select('star_ratings.ratingablle_id', DB::raw('avg(star)'))
            ->groupBy('ratingablle_id')
            ->where('experiences.jobTitle', '=', $cargo)
            ->orderBy('avg', 'DESC')
            ->limit(10)
            ->get();

        return  $freelancer;
    }
}
