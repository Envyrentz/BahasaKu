<?php
namespace App\Exports;

use App\Invoice;
use App\Models\Content;
use App\Models\UserAssesment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserAssesmentExport implements FromView
{
    protected $content_id;

    public function __construct($content_id)
    {
        $this->content_id = $content_id;
    }

    public function view(): View
    {
        return view('exports.user-assesment', [
            'content' => Content::find($this->content_id),
            'datas' => UserAssesment::where('content_id', $this->content_id)->get()
        ]);
    }
}