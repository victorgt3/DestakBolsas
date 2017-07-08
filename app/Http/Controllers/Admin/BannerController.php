<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannerController extends Controller
{
    public function index()
    {
        return view('banner.index');
    }
    public function save(Request $request)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
