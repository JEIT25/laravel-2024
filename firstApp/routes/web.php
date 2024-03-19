<?php
use App\Http\Requests\TaskRequest; //!import for grouping same validations
use App\Models\Task; //import task model
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; //!import request , can be use to test print in rout egives access to data being sent
use Illuminate\Http\Response;

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

Route::get("/", function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () { //using use() statement we pass the annoymouse function ,
    // so that we can use it inside the index view route
    return view('index', [
        'tasks' => Task::latest()->paginate(10) //all() //gets all tasks available,
        // pagiante() automatically divide result to different pages,accepts param can divide items per page
    ]); //!using associative array as second argument in the,view method
    //!we can pass key-value pairs to the blade template specified
    //!example use using where:
    //? App\Models\Task::latest()->where("title","Study programming")->get()
})->name("tasks.index");

Route::view(
    '/tasks/create',
    'create'
)->name("tasks.create"); //use view() directly in routing when u simply create something and not request

Route::get("/tasks/{task}/edit", function (Task $task) {
    return view("edit", [
        'task' => $task //call abort function if something is not found
    ]);
})->name("tasks.edit");

//!toggle completed or not completed
Route::put("/tasks/{task}/toggle-completed", function (Task $task) {
    $task->toggleCompleted();
    return redirect()->back()->with('success', 'Task Updated Successfully');
})->name('tasks.toggleCompleted');

Route::get("/tasks/{task}", function (Task $task) {
    // $task = collect($tasks)->firstWhere("id", $id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    return view("show", [
        "task" => $task //call abort function if something is not found
    ]);
})->name("tasks.show");

//! storing(post,saving) data form databse using forms
Route::post('/tasks', function (TaskRequest $request) {
    //request ->validate(), validates the data from form using the defined validations keys inside the array
    // $validated_data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required'
    // ]);

    //!using TaskRequest instance model we can group validations that are the same
    $validated_data = $request->validated();
    $new_task = Task::create($validated_data);

    // //?create new task using the Task Model,
    // //?set values using the validated data above
    // $new_task = new Task;
    // $new_task->title = $validated_data['title'];
    // $new_task->description = $validated_data['description'];
    // $new_task->long_description = $validated_data['long_description'];

    // //?save new task to database
    // $new_task->save();

    //?then redirect to  a page or something , here we redirecto to the newly added task
    return redirect()->route('tasks.show', ['task' => $new_task->id])
        ->with('success', 'Task created successfully!'); //for display flash messages , if refresh dissappers
    //output found in  show blade template

    // dd($request -> all());;//!dd() method,USE FOR TESTING, test print something meaning dump and die,
})->name('tasks.store');


//! updating(put,saving) existing data form databse using forms
Route::put('/tasks/{task} ', function (Task $task, TaskRequest $request) {
    //request ->validate(), validates the data from form using the defined validations keys inside the array
    // $validated_data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required'
    // ]);

    //!using TaskRequest instance model we can group validations that are the same
    $validated_data = $request->validated();
    $task->update($validated_data);

    // //?set found task id in params as new and find in database using Task Model,
    // //?set values using the validated data above
    // $new_task = $task;
    // $new_task->title = $validated_data['title'];
    // $new_task->description = $validated_data['description'];
    // $new_task->long_description = $validated_data['long_description'];

    // //?save new task to database
    // $new_task->save();

    //?then redirect to  a page or something , here we redirecto to the newly added task
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!'); //for display flash messages , if refresh dissappers
    //output found in  show blade template

    // dd($request -> all());;//!dd() method,USE FOR TESTING, test print something meaning dump and die,
})->name('tasks.update');

//delete task using route model binding
Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task Deleted Successfully');
})->name("tasks.destroy");









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

// class Pokemon
// {
//     public function __construct(
//         public int $pokeId,
//         public string $pokeUrlImg
//     ) {
//     }
// }

// $pokemons = [
//     new Pokemon(
//         90,
//         "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/90.svg"
//     ),
//     new Pokemon(
//         1,
//         "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/1.svg"
//     ),
//     new Pokemon(
//         25,
//         "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/25.svg"
//     ),
//     new Pokemon(
//         5,
//         "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/5.svg"
//     ),
//     new Pokemon(
//         21,
//         "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/21.svg"
//     )
// ];

// Route::get('/', function () use ($pokemons) {
//     return view(
//         "index",
//         ["pokemons" => $pokemons]
//     );
// })->name("pokemon.index");

// Route::get("/{pokeId}", function ($pokeId) use ($pokemons) {
//     $currentPokeImgUrl = null;
//     foreach ($pokemons as $pokemon) {
//         if ($pokemon->pokeId == $pokeId) {
//             $currentPokeImgUrl = $pokemon->pokeUrlImg;
//         }
//     };
//     return "Pokemon Id: " . $pokeId . " - img url: {$currentPokeImgUrl}";
// })->name("pokemon.show");