<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pets = Pet::where("owner_id", Auth()->user()->id)->get();
        return view("dashboard.checkout", ['pets' => $pets]);
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
        $pet = Library::where("id", $request->id)->get();

        $collect = [
            "owner_id" => Auth()->user()->id,
            "title" => $pet[0]->title,
            "category_id" => $pet[0]->category_id,
            "user_id" => $pet[0]->user_id,
            "description" => $pet[0]->description,
            "slug" =>  $pet[0]->slug,
        ];
        $data = ["is_adopt" => true];
        Library::where("slug", $pet[0]->slug)->update($data);

        Pet::create($collect);

        return redirect('/dashboard/user/pet')->with("success", "Berhasil di Dapatkan:/");
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
        //
    }
}
