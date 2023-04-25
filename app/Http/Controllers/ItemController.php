<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return response()->json(
            $item
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        if($request->file('image')){
            $file= $request->file('image');
            // $image_resize = Image::make($file->getRealPath())->resize(300, 100);
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/img'), $filename);
            // $file->save('public/img' . $filename, 80);
            // Storage::put('public/img/' . $filename, $image_resize);
            $item->image = $filename;
            $item->save();
        }
        return response()->json([
            $item
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return response()->json([
            $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        $item = Item::find($id);
        $item ->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/img'), $filename);
            $item['image']= $filename;
        }
        return response()->json([
            $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return response()->json([
            'Deleted successfully.'
        ]);
    }
}
