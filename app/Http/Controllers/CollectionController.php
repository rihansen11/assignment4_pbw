<?php

namespace App\Http\Controllers;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\DataTables\CollectionsDataTable;

// 6706220081_Rihansen Ulihdo Purba_4604

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view ('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameKoleksi' => ['required', 'string', 'max:100'],
            'jenisKoleksi' => ['required', 'integer', 'max:3'], // Sesuaikan validasi jenis koleksi sesuai kebutuhan
            'jumlahKoleksi' => ['required', 'integer'],
            // ... tambahkan validasi lainnya sesuai kebutuhan Anda ...
        ]);
        
        $collection = Collection::create([
            'nameKoleksi' => $request->nameKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            // ... tambahkan atribut lainnya sesuai kebutuhan Anda ...
        ]);
        
        return redirect()->route('koleksi.daftarKoleksi');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
