<?php
namespace App\Http\Controllers;
use App\Models\Property;
use App\Payment\ProcessorFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Auth::user()->properties()
            ->with(['leases' => fn($q) => $q->where('status','active')->with('tenant'), 'applications' => fn($q) => $q->with('backgroundChecks')->orderByDesc('created_at')])
            ->latest()->get();
        return view('dashboard.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('dashboard.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string|size:2',
            'address_line1' => 'required|string|max:255',
            'city'          => 'required|string|max:100',
            'type'          => 'required|in:apartment,house,commercial,other',
            'bedrooms'      => 'nullable|integer|min:0|max:99',
            'postal_code'   => 'nullable|string|max:20',
        ]);

        if (!ProcessorFactory::supports($validated['country_code'])) {
            return back()->withErrors(['country_code' => 'Country not supported yet.'])->withInput();
        }

        $country = config('countries.'.$validated['country_code']);

        Auth::user()->properties()->create(array_merge($validated, [
            'currency_code'  => $country['currency'],
            'processor_slug' => $country['processor'],
        ]));

        return redirect()->route('properties.index')->with('success', 'Property added.');
    }

    public function show(Property $property)
    {
        $this->authorize('view', $property);
        $property->load(['leases' => fn($q) => $q->with(['tenant','payments','mandates'])]);
        return view('dashboard.properties.show', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $this->authorize('update', $property);
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string|size:2',
            'address_line1' => 'required|string|max:255',
            'city'          => 'required|string|max:100',
            'type'          => 'required|in:apartment,house,commercial,other',
            'bedrooms'      => 'nullable|integer|min:0|max:99',
            'postal_code'   => 'nullable|string|max:20',
        ]);
        $property->update($validated);
        return response()->json(['success' => true]);
    }

    public function destroy(Property $property)
    {
        $this->authorize('update', $property);
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted.');
    }
}
