<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    public $data;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.report', [
            'invoices' => $this->data
        ]);
    }

    public function getDownloadByQuery($data){
        $this->data = $data;
        return $this;
    }
}
