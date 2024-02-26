<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

class Pokemon
{
    public function __construct(
        public int $pokeId,
        public string $pokeUrlImg
    ) {
    }
}

$pokemons = [
    new Pokemon(
        90,
        "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/90.svg"
    ),
    new Pokemon(
        1,
        "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/1.svg"
    ),
    new Pokemon(
        25,
        "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/25.svg"
    ),
];
// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     )
// ];

// Route::get('/', function () use ($tasks) { //using use() statement we pass the annoymouse function ,
//     // so that we can use it inside the index view route
//     return view('index', [
//         'tasks' => $tasks
//     ]); //using associative array as second argument in the,view method
//     //we can pass key-value pairs to the blade template specified
// })->name("task.index");

// Route::get("/{id}", function ($id) {
//     return "returned one task, task id: {$id}";
// })->name("task.show");

// Route::get("/hallo", function () { //redirecting , using redirect() method we pass an argument as to which url to redirect
//     return redirect("/hi");
// });

// Route::get("/hi", function () {
//     return "hi";
// })->name("hi"); //naming routes uisng ->name() method, name will be showed when getting list of url in app using php artisan route:list

// Route::get("hii", function () {
//     return redirect()->route("hi"); //redirecting to named route using ->route() and passing name of route as param
// });

// //dynamic urls/routes
// Route::get("/person/{name}", function ($name) { //{name} will be passed to $name parameter of the function
//     return "Hello " . $name . " Gwapo!";
// });

// Route::fallback(function () { //default fallback route(undefined routes)
//     return "Route not defined!";
// })->name("fallback");

//!More examples <review this after ite16>
// Route::get("/age/{number}", function ($number) {
//     return "You are " . (int)$number . " years old";
// })->name("age-greeter");

// Route::get("/greet/fallback", function () {
//     return "Age not defined!";
// })->name("age-greeter-fallback");

// Route::get("/greet/{age}", function ($age) {
//     $numbers = (int) $age;
//     if (is_numeric($numbers) && ($numbers != 0)) {
//         return redirect()->route("age-greeter", ['number' => $numbers]);
//     } else if ($numbers == 0) {
//         return redirect()->route("age-greeter-fallback");
//     } else {
//         return redirect()->route("age-greeter-fallback");
//     }
// });