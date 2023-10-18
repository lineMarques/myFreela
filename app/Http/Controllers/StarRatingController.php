<?php

namespace App\Http\Controllers;

use App\Models\{
    Company,
    Freela,
    Invite,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarRatingController extends Controller
{

    protected $invite;
    protected $freela;

    public function __construct(Invite $invite, Freela $freela)
    {
        $this->invite = $invite;
        $this->freela = $freela;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $inviteUser = $this->invite->where('1', Auth::id()));
        return view('starRating.create-starRating', compact('inviteUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
