<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $recentPartners = Partner::latest()->take(4)->get();
        return view('partners.index', compact('partners','recentPartners'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logoPath;
        }

        Partner::create($data);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully');
    }

    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.show', compact('partner'));
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, $id)
    {
        $data = $request->validated();
        $partner = Partner::findOrFail($id);

        if ($request->hasFile('logo')) {
           
            
            Storage::disk('public')->delete($partner->logo);

            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logoPath;
        }

        $partner->update($data);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully');
    }

    public function destroy($id)
    {
        
        $partner = Partner::findOrFail($id);
        Storage::disk('public')->delete($partner->logo); 
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully');
    }
}
