<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index',  compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('artists');

        Artist::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'age'=>$request->age,
            'image'=>$path
        ]);

        return redirect()->route('artists.index');
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit',compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $path=$artist->image;
        if($request->has('image')){
            Storage::delete($artist->image);

            $path = $request->file('image')->store('artists');
        }

        $artist->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'age'=>$request->age,
            'image'=>$path
        ]);
        return redirect()->route('artists.index');
    }

    public function destroy(Artist $artist)
    {
        Storage::delete($artist->image);

        $artist->delete();

        return redirect()->route('artists.index');
    }
}
