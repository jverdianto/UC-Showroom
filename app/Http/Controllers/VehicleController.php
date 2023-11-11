<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(5);

        return view('vehicles.index', compact('vehicles'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'model' => 'required',
            'tahun' => 'required',
            'jumlah_penumpang' => 'required',
            'manufaktur' => 'required',
            'harga' => 'required',
            'jenis' => 'required'
        ]);

        // Create a new vehicle instance with the common attributes
        $vehicle = new Vehicle([
            'model' => $request->input('model'),
            'tahun' => $request->input('tahun'),
            'jumlah_penumpang' => $request->input('jumlah_penumpang'),
            'manufaktur' => $request->input('manufaktur'),
            'harga' => $request->input('harga'),
            'jenis' => $request->input('jenis'),
        ]);

        $vehicle->save(); // Save the vehicle first

        // Save the Vehicle instance based on the selected jenis
        if ($request->input('jenis') == 'Mobil') {
            
            $request->validate([
                'tipe_bahan_bakar' => 'required',
                'luas_bagasi' => 'required',
            ]);

            // Create a new Car instance and associate it with the Vehicle
            $car = new Car([
                'tipe_bahan_bakar' => $request->input('tipe_bahan_bakar'),
                'luas_bagasi' => $request->input('luas_bagasi')
            ]);

            $vehicle->car()->save($car);

        } elseif ($request->input('jenis') == 'Motor') {
            
            $request->validate([
                'ukuran_bagasi' => 'required',
                'kapasitas_bensin' => 'required',
            ]);

            // Create a new Motor instance and associate it with the Vehicle
            $motor = new Motorcycle([
                'ukuran_bagasi' => $request->input('ukuran_bagasi'),
                'kapasitas_bensin' => $request->input('kapasitas_bensin')
            ]);

            $vehicle->motor()->save($motor);

        } elseif ($request->input('jenis') == 'Truk') {
            
            $request->validate([
                'roda_ban' => 'required',
                'luas_area_kargo' => 'required',
            ]);

            // Create a new Truk instance and associate it with the Vehicle
            $truk = new Truck([
                'roda_ban' => $request->input('roda_ban'),
                'luas_area_kargo' => $request->input('luas_area_kargo')
            ]);

            $vehicle->truk()->save($truk);
        }

        //redirect user and send friendly message
        return redirect()->route('vehicles.index')->with('success','Vehicle created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        // return Vehicle::find($vehicle->id)->orders;

        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Begin database transaction
        DB::beginTransaction();

        try {
            // Check if the jenis has changed
            if ($request->jenis != $vehicle->jenis) {
                // Hapus entri di tabel lama
                if ($vehicle->jenis == 'Mobil') {
                    $vehicle->car()->delete();
                } elseif ($vehicle->jenis == 'Motor') {
                    $vehicle->motor()->delete();
                } elseif ($vehicle->jenis == 'Truk') {
                    $vehicle->truk()->delete();
                }

                // Update common vehicle attributes
                $vehicle->update([
                    'model' => $request->model,
                    'tahun' => $request->tahun,
                    'jumlah_penumpang' => $request->jumlah_penumpang,
                    'manufaktur' => $request->manufaktur,
                    'harga' => $request->harga,
                    'jenis' => $request->jenis,
                ]);

                // Tambahkan entri baru di tabel yang sesuai dengan jenis yang baru
                if ($request->jenis == 'Mobil') {
                    Car::create([
                        'vehicle_id' => $vehicle->id,
                        'tipe_bahan_bakar' => $request->tipe_bahan_bakar,
                        'luas_bagasi' => $request->luas_bagasi,
                    ]);
                } elseif ($request->jenis == 'Motor') {
                    Motorcycle::create([
                        'vehicle_id' => $vehicle->id,
                        'ukuran_bagasi' => $request->ukuran_bagasi,
                        'kapasitas_bensin' => $request->kapasitas_bensin,
                    ]);
                } elseif ($request->jenis == 'Truk') {
                    Truck::create([
                        'vehicle_id' => $vehicle->id,
                        'roda_ban' => $request->roda_ban,
                        'luas_area_kargo' => $request->luas_area_kargo,
                    ]);
                }
            } else {
                // Jika jenis tidak berubah, update atribut umum saja
                $vehicle->update([
                    'model' => $request->model,
                    'tahun' => $request->tahun,
                    'jumlah_penumpang' => $request->jumlah_penumpang,
                    'manufaktur' => $request->manufaktur,
                    'harga' => $request->harga,
                    'jenis' => $request->jenis,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Redirect user and send friendly message
            return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
            
        } catch (\Exception $e) {
            // Rollback the transaction on exception
            DB::rollBack();

            // Handle the exception, log, or show an error message
            return redirect()->back()->with('error', 'Error updating vehicle: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        // Hapus terlebih dahulu entitas anak yang terkait (jika ada)
        if ($vehicle->car) {
            $vehicle->car->delete();
        } elseif ($vehicle->motor) {
            $vehicle->motor->delete();
        } elseif ($vehicle->truk) {
            $vehicle->truk->delete();
        }

        // Hapus entitas utama (vehicle)
        $vehicle->delete();

        //redirect user and display success message
        return redirect()->route('vehicles.index')->with('success','Vehicle deleted successfully');
    }
}
