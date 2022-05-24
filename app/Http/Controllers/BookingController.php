<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class BookingController extends Controller
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
            $booking = Booking::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('prod_id', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('from_date', 'LIKE', "%$keyword%")
                ->orWhere('to_date', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('mobile', 'LIKE', "%$keyword%")
                ->orWhere('approve', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $booking = Booking::latest()->paginate($perPage);
        }

        return view('admin.booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.booking.create');
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

        Booking::create($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $booking = Booking::findOrFail($id);
        $booking->update($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect('admin/booking')->with('flash_message', 'Booking deleted!');
    }


    public function storeBooking(Request $request, $id)
    {

        $data = [
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'mobile' => $request->mobile ?? '',
            'user_id' => Auth::check() ? Auth::user()->name : '',
            'prod_id' => $id,
            'approve' => 0,
        ];
        $created = Booking::create($data);
        if ($created) {
            try {
                // Your Account SID and Auth Token from twilio.com/console
                $sid = env('TWILLIO_SID');
                $token = env('TWILLIO_TOKEN');
                $client = new Client($sid, $token);

                $otp = rand(100000, 10000000);

                $client->messages->create(
                // the number you'd like to send the message to
                    '+9779807214786',
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+14142969664',
                        // the body of the text message you'd like to send
                        'body' => 'Hello, Bokking is complete, we will get back to you!',
                    ]
                );
                return redirect('home');

            } catch (\Exception $exception) {
                dd($exception);
            }
        }


    }

    public function approve($id)
    {
        if (!$id) {
            return false;
        }
$created = Booking::find($id);
        if ($created) {
            $created->update(['approve' => 1]);
            try {
                // Your Account SID and Auth Token from twilio.com/console
                $sid = env('TWILLIO_SID');
                $token = env('TWILLIO_TOKEN');
                $client = new Client($sid, $token);

                $otp = rand(100000, 10000000);

                $client->messages->create(
                // the number you'd like to send the message to
                    '+9779807214786',
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+14142969664',
                        // the body of the text message you'd like to send
                        'body' => 'Hello, Booking Approved!, THanks',
                    ]
                );
                return back();

            } catch (\Exception $exception) {
                dd($exception);
            }
        }

    }
}
