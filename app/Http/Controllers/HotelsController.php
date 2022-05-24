<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $hotels = Hotel::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $hotels = Hotel::latest()->paginate($perPage);
        }

        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        if($request->hasFile('image')){
        $file = $request->file('image');
        $fname = time().$file->getClientOriginalName();
        $dest  = public_path('/hotels/');
        $image_url = asset('/hotels/'.$fname);
        $file->move($dest,$fname);
        $requestData['image'] = $image_url;

        }
//dd($requestData);
        Hotel::create($requestData);

        return redirect('admin/hotels')->with('flash_message', 'Hotel added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $hotel = Hotel::findOrFail($id);
        $hotel->update($requestData);

        return redirect('admin/hotels')->with('flash_message', 'Hotel updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Hotel::destroy($id);

        return redirect('admin/hotels')->with('flash_message', 'Hotel deleted!');
    }

    public function detail($id)
    {
        if(!$id){
            return false;
        }
        $data['hotel'] = Hotel::find($id);
        $data['hotels'] = Hotel::latest()->get();
        return view('admin.hotels.hotelDetail',$data);
    }
}
