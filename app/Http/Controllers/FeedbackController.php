<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view ('view.feedback', compact('feedbacks'));
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
        $validatedData = $request->validate([
            'keterangan' => 'required',
        ]);

        Feedback::create($validatedData);

        // $feedback = new Feedback();
        // $feedback->keterangan = $request->input('feedback');
        // $feedback->save();

        return redirect()->back()->with('success', 'Masukan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetakFeedback(){
        $dataCetakFeedback = Feedback::all();
        return view ('rekap.cetak-feedback', compact('dataCetakFeedback'));
    }
}
