<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Client;
use Illuminate\Http\Request;

class AttachCarController extends Controller
{
    public function attach(Client $client, Auto $auto)
    {
        // Привязка клиента к машине
        $auto->client_id = $client->id;
        $auto->save();

        return redirect()->route('clients.show', $client);
    }

    public function detach(Client $client, Auto $auto)
    {
        // Отвязка клиента от машины
        $auto->client_id = null;
        $auto->save();

        return redirect()->route('clients.show', $client);
    }
}
