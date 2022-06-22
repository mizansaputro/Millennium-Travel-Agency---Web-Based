<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function all(Request $request){
        $user = $request->user();

        $booking = Booking::where('user_id',$user->id)->get();

        return response()->json([
            "status" => "success",
            'message' => 'Berhasil mendapatkan data booking',
            'data' => $booking,
        ], 200);
    }

    public function store(Request $request){
        $id = $request->user()->id;

        $booking = Booking::create([
            "user_id" => $id,
            "nama" => $request['nama'],
            "tgl_perjalanan" => $request['tgl_perjalanan'],
            "paket_wisata" => $request['paket_wisata'],
            "metode_pembayaran" => $request['metode_pembayaran'],
            'harga' => $request['harga'],
            'invoice' => $request['invoice']
        ]);
        
        return response()->json([
            "status" => "success",
            'message' => 'Berhasil Login',
            'data' => $booking,
        ], 201);
    }
}
