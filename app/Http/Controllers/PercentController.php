<?php

namespace App\Http\Controllers;

use App\Models\Percent;
use Illuminate\Http\Request;

class PercentController extends Controller
{
    public function index()
    {
        $percent = Percent::all()->first();
        return view('admin.percent.index', compact('percent'));
    }
    public function store(Request $request)
    {
        Percent::create($request->all());
        return redirect()->route('admin.percent.index');
    }
    public function update(Request $request, Percent $percent)
    {
        $percent->update($request->all());
        return redirect()->route('admin.percent.index');
    }
}
