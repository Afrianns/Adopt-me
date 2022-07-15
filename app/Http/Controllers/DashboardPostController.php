<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Library;
use App\Models\Category;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

use function Ramsey\Uuid\v1;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("dashboard.index", [
            "result" => Library::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view("dashboard.create", ["categories" => $category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;

        $request["user_id"] = auth()->user()->id;
        $request['slug'] = Str::slug($request->title);


        $validated = $request->validate([
            "title" => ["required", "min:10"],
            "category_id" => ["required"],
            "user_id" => ["required"],
            "image" => ['required', 'image', 'mimes:jpg,jpeg,png', "max:2024"],
            "description" => ["required", "min:50"],
            "slug" =>  ["required", "unique:libraries"]
        ]);

        $validated['image'] = $request->file("image")->store("files-photo");
        Library::create($validated);


        return back()->with("success", "Berhasil Untuk Menambahkan!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        return view("dashboard/show", [
            "book" => $library
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */

    // public $library;

    public function edit(Library $library)
    {
        // $this->library = $library;
        return view("dashboard.edit", ["library" => $library, "categories" => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        $request["user_id"] = auth()->user()->id;
        $request['slug'] = Str::slug($request->title);

        // if ($request->image) {
        //     return $request->image;
        // } else {
        //     return "h " . $request->image;
        // }

        if ($request['is_adopt']) {
            return redirect("/dashboard/library");
        }

        $ValidRule = [
            "title" => ["required", "min:10"],
            "category_id" => ["required"],
            "user_id" => ['required'],
            "description" => ["required", "min:50"]
        ];

        if ($request->slug != $library->slug) {
            $ValidRule += [
                "slug" =>  ["required", "unique:libraries"]
            ];
        }

        if ($request->image) {

            $ValidRule += ["image" => ['required', 'image', 'mimes:jpg,jpeg,png', "max:2024"]];
        }


        $data = $request->validate($ValidRule);

        if ($request->image) {
            Storage::delete($library->image);
            $data['image'] = $request->file("image")->store("files-photo");
        }

        $res = Library::where("slug", $library->slug)->update($data);

        if ($res) {
            return redirect("/dashboard/library")->with("success", "Post Berhasil di Update");
        } else {
            return redirect("/dashboard/library")->with("fail", "Post Gagal di Update");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();

        return back()->with("success", "Berhasil di Hapus");
    }
}
