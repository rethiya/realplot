<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->id() != 1){
            return redirect()->to('/');
        }
        return view('lead/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->id() != 1){
            return redirect()->to('/');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'sqft' => 'required',
        ]);
        
        $lead = Lead::create(request(['name', 'email', 'phone', 'address', 'sqft']));
        
        
        
        return redirect()->to('/list-lead');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->id() != 1){
            return redirect()->to('/');
        }
       $singleLead = Lead::where('id',$id)->first();
       return view('lead/show', compact('singleLead'));
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        if(auth()->id() != 1){
            return redirect()->to('/');
        }
       $leads = Lead::orderBy('name')->get();
       
       return view('lead/list', compact('leads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->id() != 1){
            return redirect()->to('/');
        }
        $singleLead = Lead::where('id',$id)->first();
        return view('lead/edit',compact('singleLead'));
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'sqft' => 'required',
        ]);
        $lead = Lead::find($id);
        $lead->name =  $request->get('name');
        $lead->email = $request->get('email');
        $lead->phone = $request->get('phone');
        $lead->address = $request->get('address');
        $lead->sqft = $request->get('sqft');
        $lead->save();

        return redirect('list-lead')->with('success', 'Lead updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect('list-lead')->with('success', 'Lead is successfully deleted');
    }
}
