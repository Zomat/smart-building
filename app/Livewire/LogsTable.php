<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Logs;

class LogsTable extends Component
{
    public function render()
    {
        return view('livewire.logs-table', [
            'logs' => Logs::with('user')->get(),
        ]);
    }
}
