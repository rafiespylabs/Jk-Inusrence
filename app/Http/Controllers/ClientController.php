<?php

namespace App\Http\Controllers;

use App\Models\Tbl_client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients=Tbl_client::all();
        return view('admin.clients',['clients'=>$clients]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_contact_number' => 'required|integer', 
            'client_gst' => 'required|string|max:15',
            'client_address' => 'nullable|string|max:500',
                      
        ]);

        try {
            $clients = new Tbl_client();
            $clients->client_name = $validatedData['client_name'];  
            $clients->client_contact_number = $validatedData['client_contact_number'];          
            $clients->client_gst = $validatedData['client_gst'];           
            $clients->client_address = $validatedData['client_address'];           
                   
            $clients->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Client created successfully',
                'data' => $clients,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Client : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $clients = Tbl_client::find($request->clients_id);
    
        if (!$clients) {
            return response()->json(['success' => false, 'message' => 'Client not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $clients
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_clients,id',
            'client_name' => 'required|string|max:255',
            'client_contact_number' => 'required|integer',
            'client_gst' => 'required|string|max:15',
            'client_address' => 'nullable|string|max:500',
            
            
        ]);

        $clients = Tbl_client::find($validatedData['id']);
        $clients->client_name = $validatedData['client_name'];             
        $clients->client_contact_number = $validatedData['client_contact_number'];             
        $clients->client_gst = $validatedData['client_gst'];             
        $clients->client_address = $validatedData['client_address'];             
        $clients->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Client updated successfully',
            'data' => $clients,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_clients,id',
        ]);

        $clients = Tbl_client::find($validatedData['id']);
        if (!$clients) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found',
            ], 404);
        }
        $clients->delete();

        return response()->json([
            'success' => true,
            'message' => 'Client deleted successfully',
        ]);
    } 
}
