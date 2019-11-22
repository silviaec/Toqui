<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hashtag = new Hashtag;
        $hashtag->hashtag = $request->hashtag;
        $hashtag->klass_id = session('current_klass');
        $hashtag->color = $this->getRandomColor();
        $hashtag->save();
        return $hashtag->id;
    }

    function getRandomColor() {
        $color[] = '#cc66ff';
        $color[] = '#cc33ff';
        $color[] = '#9900cc';
        $color[] = '#ff99ff';
        $color[] = '#ff99cc';
        $color[] = '#ff33cc';
        $color[] = '#ff0066';
        $color[] = '#cc0066';
        $color[] = '#660033';
        $color[] = '#ff9933';
        $color[] = '#ff6600';
        $color[] = '#ff3300';
        $color[] = '#ff0000';
        $color[] = '#ff9900';
        $color[] = '#99cc00';
        $color[] = '#666633';
        $color[] = '#669900';
        $color[] = '#009900';
        $color[] = '#33cc33';
        $color[] = '#009933';
        $color[] = '#003300';
        $color[] = '#006600';
        $color[] = '#00cc00';
        $color[] = '#00cc66';
        $color[] = '#00cc99';
        $color[] = '#009999';
        $color[] = '#33cccc';
        $color[] = '#ffcc99';
        $color[] = '#1ad1ff';
        $color[] = '#00ccff';
        $color[] = '#0099ff';
        $color[] = '#0066ff';
        $color[] = '#3399ff';
        $color[] = '#66ccff';
        $color[] = '#5271ff';
        $color[] = '#99acff';
        $color[] = '#002ae6';
        $color[] = '#666699';
        $color[] = '#996633';
        $color[] = '#0033cc';
        return $color[rand(0, 39)];
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return json_encode(Hashtag::where('klass_id', session('current_klass'))->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(Hashtag $hashtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Hashtag $hashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hashtag $hashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hashtag $hashtag)
    {
        //
    }
}
