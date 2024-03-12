<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // show a single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create listing form
    public function create() {
        return view('listings.create');
    }

    // store new listing
    public function store(Request $request) {
        // validate the form
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }

        // store the listing
        Listing::create($formFields);

        // redirect to the homepage
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // update listing
    public function update(Request $request, Listing $listing) {

        // check logged in user is owner
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized!');
        }

        // validate the form
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')->ignore($listing->id)],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }

        // update the listing
        $listing->update($formFields);

        // redirect to the homepage
        return redirect('/')->with('message', 'Listing updated successfully!');
    }

    // delete listing
    public function destroy(Listing $listing) {

        // check logged in user is owner
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'Unauthorized!');
        }
        
        // delete the listing
        $listing->delete();

        // redirect to the homepage
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    // manage listings
    public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()]);
    }

    // public function manage() {
    //     return view('listings.manage', [
    //         'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
    //     ]);
    // }
}
