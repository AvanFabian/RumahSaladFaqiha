<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; 
use App\Models\Review;

class ReviewController extends Controller
{
    // Tampilkan Halaman Tambah Review
    public function create()
    {
        // return Inertia::render('CrudForm/CreateReview');
        // blade
        return view('admin.review.Create');
    }
    // Simpan Review ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
        ]);

        Review::create($request->all());

        return redirect()->route('review.create')
            ->with('success', 'Review created successfully.');
    }


    // Tampilkan Halaman Edit Review
    public function edit(Review $id_review)
    {
        return view('admin.review.Edit', [
            'review' => $id_review
        ]);
    }
    // Update Review ke Database
    public function update(Request $request, Review $id_review)
    {
        $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
        ]);

        $id_review->update($request->all());

        return redirect()->route('admin.review.Edit')
            ->with('success', 'Review updated successfully.');
    }
    // Hapus Review dari Database
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('home')
            ->with('success', 'Review deleted successfully.');
    }
}
