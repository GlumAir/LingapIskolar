<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get("/", function () {
    if (Auth()->guest()) {
        return redirect("login");
    }
    return redirect("dashboard");
})->name("root");

Route::get("/login", function () {
    if (Auth()->check()) {
        return redirect("dashboard");
    }
    return view("routes.login");
})->name("login");

Route::post("/login", function (Request $request) {
    // TODO: Log In Function
    return response()->json(
        [
            "status" => 501,
            "comment" => "TODO: Implement Log In Authentication",
            "message" => "Not Implemented: Data still received.",
            "data" => $request->all(),
        ],
        501,
    );

    // You can use this if it fails for authentication.
    // return redirect("/login")
    //     ->withErrors("NotImplemented: Check web.php for implementation")
    //     ->withInput($request->only("username"));
});

Route::get("/signup", function () {
    if (Auth()->check()) {
        return redirect("dashboard");
    }
    return view("routes.signup");
})->name("signup");

Route::post("/signup", function (Request $request) {
    // TODO: Sign Up
    return response()->json(
        [
            "status" => 501,
            "comment" =>
                "TODO: Create account, authenticate user, and redirect to dashboard",
            "message" => "Not Implemented: Data still received.",
            "data" => $request->all(),
        ],
        501,
    );
});

Route::get("/dashboard", function () {
    return "dashboard";
})->name("dashboard");

Route::get("/ticket", function () {
    return "ticket";
})->name("ticket");

Route::get("/ticket/create", function () {
    return "tickets creation page";
})->name("ticket-create");

Route::get("/ticket/assign", function () {
    return "tickets assign page";
})->name("ticket-assign");

Route::get("/ticket/{id}", function (string $id) {
    return "ticket#" . $id;
})->name("ticket-details");

Route::get("/ticket/{id}/review", function (string $id) {
    return "ticket#" . $id . "-review";
})->name("ticket-detail-review");

Route::get("/ticket/{id}/inquire", function (string $id) {
    return "ticket#" . $id . "-message";
})->name("ticket-detail-inquire");
