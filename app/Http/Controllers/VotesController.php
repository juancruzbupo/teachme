<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Http\Requests;

class VotesController extends Controller
{
    public function submit($id)
    {
    	dd('votando por el ticket: ' . $id );
    }

    public function destroy($id)
    {
    	dd('quitando el voto al ticket: ' . $id );
    }
}
