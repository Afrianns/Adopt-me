<?php

use App\Http\Controllers\AdoptController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrintOwnershipController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;



Route::get('/dashboard/pet/{slug}', [PostController::class, 'pet'])->middleware("auth");
Route::get('/dashboard/pet', [PostController::class, 'Collections'])->middleware("auth");
Route::get("/register", [RegisterController::class, "Register"])->middleware("guest");
Route::get("/admin/register", [RegisterController::class, "RegisterAdmin"])->middleware("guest");
Route::get('/login', [LoginController::class, "Login"])->middleware("guest");
Route::get('/', [LoginController::class, "redirect"]);

Route::view('/dashboard/about', 'dashboard.about', ['title' => 'About'])->middleware("auth");

Route::get("/dashboard/user/pet/{slug}", [PrintOwnershipController::class, 'printOwnership'])->middleware("auth");
Route::get("/dashboard/user/pet/print/{slug}", [PrintOwnershipController::class, 'print'])->middleware("auth");

Route::view('/profile', 'profile', ['title' => 'Profile'])->middleware("auth");

Route::get('/dashboard/pet/category/{category:slug}', function (Category $category) {
    return view("dashboard.category", [
        "title" => $category->name,
        "pets" => $category->library->load("category")
    ]);
})->middleware("auth");


Route::get('/dashboard/categories', function (Category $category) {
    return view("dashboard.categories", [
        "title" => "All Category",
        "Categories" => $category->load("category", "user")
    ]);
})->middleware("auth");


Route::get("/dashboard/pet/owner/{user:name}", function (User $user) {
    return view("dashboard.owner", [
        "title" => $user->name,
        "pets" => $user->library->load("category", "user")
    ]);
})->middleware("auth");

Route::get("/dashboard", [PostController::class, 'collections'])->middleware("auth");

Route::post("/register", [RegisterController::class, "ValidatedRegister"]);

Route::post("/admin/register", [RegisterController::class, "ValidatedRegisterAdmin"]);

Route::post("/login", [LoginController::class, "LoginAuth"])->name("login");

Route::post("/logout", [LoginController::class, "LogoutAuth"])->middleware("auth");

Route::resource("/dashboard/library", DashboardPostController::class)->parameters(["library" => "library:slug"])->middleware("auth")->middleware("is_admin");

Route::resource("/dashboard/profile", ProfileController::class)->middleware("auth");

Route::resource("/dashboard/user/pet", AdoptController::class)->middleware("auth")->names('dashboard.checkout');
