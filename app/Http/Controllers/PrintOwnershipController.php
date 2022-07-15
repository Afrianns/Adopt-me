<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintOwnershipController extends Controller
{

    public function printOwnership($slug)
    {
        $res = Pet::where("owner_id", Auth()->user()->id)->orWhere("slug", $slug)->get();

        $res = Pet::where("owner_id", Auth()->user()->id)->orWhere("slug", $slug)->get();

        $data = [
            'title' => $res[0]->title,
            'category_id' => $res[0]->category_id,
            "description" => $res[0]->description,
            "category" => $res[0]->category->name,
            "user" => $res[0]->user->name,
            "owner" => Auth()->user()->name,
        ];

        $pdf = PDF::loadView('dashboard.ownership', $data)->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif']);
        return $pdf->stream("ownership.pdf");
    }
}
