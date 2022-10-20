<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdmin')->except('create','store');

    }



    public function index()
    {
        $image = Image::all();

        return view('images.index', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /image
            $request->file->store('image', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $image = new Image([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName(),
//                "user_id" => Auth::user()->id
            ]);
            $image->user()->associate(Auth::user());

            $image->save(); // Finally, save the record.
        }
        return view('images.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $image = Image::find($id);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $image->name = $request->name;
            $image->file_path = $request->file->hashName();
            $request->file->store('image', 'public');
        }

        $image->save();
        return redirect('/images')->with('success', 'Image updated');

//        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete(); // Easy right?

        return redirect('/images')->with('success', 'Image removed.');

    }

    public function changeStatus(Request $request)
    {

        $image = Image::find($request->user_id);
        $image->status = $request->status;
        $image->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}

