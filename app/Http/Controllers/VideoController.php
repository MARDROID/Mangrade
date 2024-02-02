<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Http\Requests\StorevideoRequest;
use App\Http\Requests\UpdatevideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorevideoRequest $request)
    {
        // The input data is already validated and authorized by the StoreVideoRequest class
        // You can access the input data using the $request->input() method
        // You can create a new video using the Video model
        $video = new Video();
        $video->fill($request->all());
        $video->save();
          // You can return a response using the response() helper
          return response()->json([
            'message' => 'Video created successfully',
            'video' => $video,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(video $video)
    {
            // The video model instance is already injected by the route model binding
        // You can return a view or a JSON response
        if (request()->wantsJson()) {
            return response()->json([
                'video' => $video,
            ]);
        } else {
            return view('videos.show', [
                'video' => $video,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatevideoRequest $request, video $video)
    {
         // The input data is already validated and authorized by the UpdateVideoRequest class
        // The video model instance is already injected by the route model binding
        // You can update the video using the fill() and save() methods
        $video->fill($request->all());
        $video->save();

        // You can return a response using the response() helper
        return response()->json([
            'message' => 'Video updated successfully',
            'video' => $video,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(video $video)
    {
        
        // The video model instance is already injected by the route model binding
        // You can delete the video using the delete() method
        $video->delete();

        // You can return a response using the response() helper
        return response()->json([
            'message' => 'Video deleted successfully',
        ], 200);
    }
}
