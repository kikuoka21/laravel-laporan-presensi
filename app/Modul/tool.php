<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/28/2019
 * Time: 11:34 AM
 */

namespace App\Modul;


//	use Illuminate\Http\Request;

use Carbon\Carbon;

class tool
{
    public function gettanggal()
    {
        return $this->hari_ini() . $this->bulan(Carbon::now()->format('F')) .
            Carbon::now()->format(' Y');
    }
    public function geubahtanggal($tgl)
    {
        return $this->bulan(Carbon::create($tgl)->format('F')) .
            Carbon::now()->format(' Y');
    }
    public function geubahtanggalbln($tgl)
    {
        return Carbon::create($tgl)->format('d ').$this->bulan(Carbon::create($tgl)->format('F')) .
            Carbon::create($tgl)->format(' Y');
    }

    private function hari_ini()
    {
        $hari = substr(Carbon::now()->format('l'), 0, 3);
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = Carbon::now()->format('l');
                break;
        }

        return $hari_ini . Carbon::now()->format(', d ');

    }

    public function pesan($key)
    {
        switch ($key) {
            case "TOKEN1":
                return "Token Sudah Tidak Valid, Silahkan Login Kembali";
            case "TOKEN2":
                return "Token Anda Salah, Silahkan Login Kembali";

            default:
                return "Generate Pesan salah";
        }
    }

    private function bulan($bulan)
    {
        switch (substr($bulan, 0, 3)) {
            case "Jan":
                return "Januari";

            case "Feb":
                return "Februari";

            case "Mar":
                return "Maret";

            case "Apr":
                return "April";

            case "May":
                return "Mei";

            case "Jun":
                return "Juni";

            case "Jul":
                return "Juli";

            case "Aug":
                return "Agustus";

            case "Sep":
                return "September";

            case "Oct":
                return "Oktober";

            case "Nov":
                return "November";

            case "Des":
                return "Desember";

            default:
                return $bulan;
        }
    }

}

