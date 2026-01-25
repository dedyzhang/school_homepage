<?php

namespace App\Exports;

use App\Models\spmb;
use App\Models\spmbSettings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InterviewExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $params;

    function __construct($params) {
        $this->params = $params;
    }

    public function view() : View
    {
        $interview_kuestioner = spmbSettings::where([
            ['id_sekolah','=',$this->params],
            ['jenis','=','interview_spmb']
        ])->first();

        if(isset($interview_kuestioner) && $interview_kuestioner->nilai != null) {
            $list_interview_kuestioner = unserialize($interview_kuestioner->nilai);
        } else {
            $list_interview_kuestioner = array();
        }
        $siswa = spmb::where('id_sekolah',$this->params)->orderBy('created_at')->orderBy('gelombang')->get();

        return view('spmb.cetak.interview',['siswa' => $siswa,'list_interview_kuestioner' => $list_interview_kuestioner]);
    }
}
