<?php

namespace App\Http\Controllers;

use App\Models\Library;
// use Illuminate\Http\Request;

class PostController extends Controller
{

    public function Collections()
    {
        $res = request("search");
        if ($res) {
            $pets = Library::with("category", "user")->where("title", "LIKE", "%" . $res . "%")->orWhere("description", "LIKE", "%" . $res . "%")->paginate(15);
        } else {
            $pets = Library::with("category", "user")->paginate(15);
        }

        return view("dashboard.home", ['title' => "Pets", 'name' => $pets]);
    }

    public function Pet($slug)
    {
        $pet = Library::firstWhere("slug", $slug);
        return view("dashboard.pet", ['title' => "Pet", "pet" => $pet, "pets" => $slug]);
    }
}
