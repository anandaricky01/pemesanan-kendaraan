<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::latest()->filter($request->only('search'))->paginate(5)->withQueryString();

        return view('dashboard.contact.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contact.create');
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
            'name' => ['required'],
            'no_hp' => ['required', 'max:13', 'unique:contacts,no_hp']
        ]);

        $contact = Contact::create($request->only(['name', 'no_hp']));
        $pesan = 'Kontak ' . $contact->name . ' berhasil dibuat!';
        return redirect(route('dashboard.contact.index'))->with('success', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::where('id', $id)->get()[0];

        return view('dashboard.contact.edit', [
            'contact' => $contact
        ]);
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
        $request->validate([
            'name' => ['required'],
            'no_hp' => ['required']
        ]);

        $contact_lama = Contact::where('id', $id)->get()[0];

        if($contact_lama->no_hp != $request->no_hp){
            if(Contact::where('no_hp', $request->no_hp)->count() > 0){
                return back()->with('danger', 'Nomor tersebut sudah dipakai oleh kontak lain!');
            }
        }

        $contact = Contact::where('id', $id)->update($request->only(['name', 'no_hp']));
        $pesan = 'Kontak berhasil diupdate!';
        return redirect()->route('dashboard.contact.index')->with('success', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id', $id)->delete();

        return redirect()->route('dashboard.contact.index')->with('success', 'Kontak berhasil dihapus!');
    }
}
