<?php

namespace App\Exports;

use App\Models\Register;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class OfflineExport implements FromView
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.appeals', [
            'appeals' => Register::where('status', 1)->get()
        ]);
    }
}
