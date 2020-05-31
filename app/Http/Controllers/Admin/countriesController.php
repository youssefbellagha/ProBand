<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\Citie;
use PragmaRX\Countries\Package\Countries;

class countriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $countries = Countries::all();
          $mycountries = Countrie::all();
          $mycitie = Citie::all();
 
        return view('Admin.Countries.index',compact('countries','mycountries','mycitie'));
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
        $this->validate($request,[
            'country' => ['required'],
            
         ]);
      $countries = Countries::where('name.common',$request->country);
 
        $contrey = new Countrie();
        $contrey->name = $countries->first()->name->common;
      
        $contrey->code = $countries->first()->cca3;
        $contrey->flag = $countries->first()->flag->emoji;
      

$contrey->save();
  return back();

    }


    public function storecitie(Request $request)
    {
       // dd($request);
         $this->validate($request,[
            'countre' => ['required'],
            'city' => ['required'],
           

            
         ]);
         $city = new Citie();
         $city->countrie_id = $request->countre;
         $city->name = $request->city;
     
         $city->save();
          return back();


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Countrie::find($id);
        $country->delete();
        return back();

    }
      public function destroycitie($id)
    {
        $city = Citie::find($id);
        $city->delete();
        return back();
    }
}
