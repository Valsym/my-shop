<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MainPage;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $main = MainPage::first();

        // Данные по умолчанию (из ваших моков)
        $defaultText = 'Мы твердо уверены в том, что будущее за 3D-технологиями...';
        $defaultImages = [
            "https://i.ibb.co/WPmCWvw/3d-printer-44.jpg",
            "https://i.ibb.co/h1wvD7f/full-RZBx-Nezy.png"
        ];

        if (!$main) {
            return response()->json([
                'text' => $defaultText,
                'images' => $defaultImages
            ]);
        }

        return response()->json([
            'text' => $main->text,
            'images' => $main->images ?? $defaultImages
        ]);
    }
    public function index0()
    {
        $main = MainPage::first(); // предположим одна запись
        // можно также вернуть изображения, если они хранятся отдельно
        $images = [
            "https://i.ibb.co/WPmCWvw/3d-printer-44.jpg",
            "https://i.ibb.co/h1wvD7f/full-RZBx-Nezy.png"
        ];
        return response()->json([
            'text' => $main->text,
            'images' => $main->images ?? $images // если храните в JSON
        ]);
        //return response()->json($main);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MainPage $mainPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainPage $mainPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainPage $mainPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainPage $mainPage)
    {
        //
    }
}
