<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Concert;
use App\Models\CatType;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $concerts = Concert::all();
        $catTypes = CatType::all();
        return view('tickets.create', compact('concerts', 'catTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'cat_id' => 'required|exists:cat_types,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|string|max:255',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $concerts = Concert::all();
        $catTypes = CatType::all();
        return view('tickets.edit', compact('ticket', 'concerts', 'catTypes'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'cat_id' => 'required|exists:cat_types,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|string|max:255',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
