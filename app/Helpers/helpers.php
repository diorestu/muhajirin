<?php

use App\Models\Contract;
use App\Models\Invoice;
use Carbon\Carbon;


function btnDelete()
{
    return "#e34b4b";
}
function btnTerima()
{
    return "#38a877";
}
function btnTolak()
{
    return "#e34b4b";
}

function nomorUrut($int)
{
    $no = 1;
    if ($int) {
        $latest = sprintf("%03s", abs($int + 1));
    } else {
        $latest = sprintf("%03s", $no);
    }
    return $latest;
}

function bulanRomawi()
{
    $a = Carbon::now();
    $romawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
    $b = $romawi[$a->month];
    return $b;
}

function hapusTitikAngka($int)
{
    $a = str_replace(".", "", $int);
    return $a;
}

function rupiah($nilai, $pecahan = 0)
{
    return "Rp. " . number_format($nilai, $pecahan, ',', '.');
}

function pecahTanpaRp($nilai, $pecahan = 0)
{
    return number_format($nilai, $pecahan, ',', '.');
}
function pecah2Desimal($nilai, $pecahan = 2)
{
    return number_format($nilai, $pecahan, ',', '.');
}

function ubahAngka($str)
{
    $a = (int) $str;
    return $a;
}

function penomoranSurat($kode, $urut, $init, $bulan, $tahun)
{
    $nomor = $kode . '' . $urut . '/' . $init . '/' . $bulan . '/' . $tahun;
    return $nomor;
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
    $temp = '';
    if ($nilai < 12) {
        $temp = ' ' . $huruf[$nilai];
    } elseif ($nilai < 20) {
        $temp = penyebut($nilai - 10) . ' belas';
    } elseif ($nilai < 100) {
        $temp = penyebut($nilai / 10) . ' puluh' . penyebut($nilai % 10);
    } elseif ($nilai < 200) {
        $temp = ' seratus' . penyebut($nilai - 100);
    } elseif ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . ' ratus' . penyebut($nilai % 100);
    } elseif ($nilai < 2000) {
        $temp = ' seribu' . penyebut($nilai - 1000);
    } elseif ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . ' ribu' . penyebut($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . ' juta' . penyebut($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . ' milyar' . penyebut(fmod($nilai, 1000000000));
    } elseif ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . ' trilyun' . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = 'minus ' . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
function removeNol($angka)
{
    $angkaTanpaNol = str_replace("0", "", $angka);
    return $angkaTanpaNol;
}
function tambahNol($angka)
{
    if (strlen($angka) == 1) {
        $angkaDenganNol = "0" . $angka;
    } else {
        $angkaDenganNol = $angka;
    }
    return $angkaDenganNol;
}

function getDay($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd');
}
function tanggalIndo($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd, LL');
}
function tanggalIndo2($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd, ll');
}
function tanggalIndoWaktu($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('ll HH:mm');
}
function tanggalIndoWaktu2($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd, ll HH:mm');
}
function tanggalIndoWaktu3($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('LL HH:mm');
}
function tanggalIndoWaktuLengkap($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd, LL HH:mm');
}
function tglIndo2($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('L');
}
function tanggalIndo3($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('ll');
}
function tanggalIndo6($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('dddd, ll');
}
function tglIndo4($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('LL');
}
function tglIndo5($date)
{
    $datetime = new DateTime($date);
    $newdate = $datetime->format(' d M Y ');
    return $newdate;
}
function TampilJamMenit($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('HH:mm');
}
function TampilTanggal($date)
{
    return Carbon::parse($date)->locale('id')->format('Y-m-d');
}
function TanggalBulan($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('D MMM');
}
function BulanTahun($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('MMMM Y');
}
function TanggalOnly($date)
{
    $tanggal = Carbon::parse($date)->locale('id')->format('d');
    $tgl     = ltrim($tanggal, '0');
    return $tgl;
}
function BulanOnly($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('MMM');
}
function BulanOnlyAngka($date)
{
    return Carbon::parse($date)->locale('id')->isoFormat('M');
}
function ago($date)
{
    return Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
}
function hoursandmins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
function isTelat($start_time, $finish_time, $shift)
{
    if ($shift == "L") {
        return false;
    } else {
        $jamawal        = Carbon::parse($start_time);
        $jamakhir       = Carbon::parse($finish_time);
        $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
        if ($totalDuration > 1) {
            return true;
        } else {
            return false;
        }
    }
}
function telat($start_time, $finish_time, $shift)
{
    if ($shift == "L") {
        echo "<span>-</span>";
    } else {
        $jamawal        = Carbon::parse($start_time);
        $jamakhir       = Carbon::parse($finish_time);
        $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
        $jam_menit      = hoursandmins($totalDuration, '%0dj, %02dm');

        if ($totalDuration > 1) {
            echo "<span class='text-danger'>" . $jam_menit . "</span>";
        } else {
            echo "<span>On time</span>";
        }
    }
}
function isMendahului($start_time, $finish_time, $shift)
{
    if ($shift == "L") {
        return false;
    } else {
        $jamawal        = Carbon::parse($start_time);
        $jamakhir       = Carbon::parse($finish_time);
        $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
        if ($totalDuration > 1) {
            return false;
        } else {
            return true;
        }
    }
}
function mendahului($start_time, $finish_time, $shift)
{
    if ($shift == "L") {
        echo "<span>-</span>";
    } else {
        $jamawal        = Carbon::parse($start_time);
        $jamakhir       = Carbon::parse($finish_time);
        $totalDuration  = $jamawal->diffInMinutes($jamakhir);
        $jam_menit      = hoursandmins($totalDuration, '%0dj, %02dm');

        if ($totalDuration > 1) {
            echo "<span class='text-success'>On time</span>";
        } else {
            echo "<span class='text-danger'>" . $jam_menit . "</span>";
        }
    }
}
function JamOnly($date)
{
    if ($date != null) {
        $jam    = Carbon::parse($date)->locale('id')->isoFormat('HH');
        $jam2   = str_replace("0", "", $jam);
    } else {
        $jam2 = 0;
    }
    return $jam2;
}
function Bulan($date)
{
    $dateObj   = DateTime::createFromFormat('!m', $date);
    return Carbon::parse($dateObj)->locale('id')->isoFormat('MMMM');
}
function BulanEng($date)
{
    $dateObj   = DateTime::createFromFormat('!m', $date);
    return Carbon::parse($dateObj)->isoFormat('MMMM');
}
function converttanggal($date)
{
    $temp = explode("-", $date);
    $tahun = $temp[0];
    $bl = $temp[1];
    $tanggal = $temp[2];
    $waktu = $bl . "/" . $tanggal . "/" . $tahun;
    return $waktu;
}
function inverttanggal($date)
{
    if ($date == "") {
        $tgl_ukur_bener = "0000-00-00";
    } else {
        $temp           = explode("/", $date);
        $bl             = $temp[0];
        $tanggal        = $temp[1];
        $tahun          = $temp[2];
        $tgl_ukur_bener = $tahun . "-" . $bl . "-" . $tanggal;
    }
    return str_replace(' ', '', $tgl_ukur_bener);
}
function ubahKeTanggal($datetime)
{
    $tanggal = date("Y-m-d", strtotime($datetime));
    return $tanggal;
}
function cvtdMYtoYmd($hari)
{
    $dates       = DateTime::createFromFormat('d M Y', $hari);
    $dama        = $dates->format('Y-m-d');
    return $dama;
}

function mkInitial1($string)
{
    $str2 = substr($string, 4);
    $words = explode(" ", $str2);
    $acronym = "";

    foreach ($words as $w) {
        $acronym .= mb_substr($w, 0, 1);
    }
    return $acronym;
}

function mkInitial2($string)
{
    $words = explode(" ", $string);
    $acronym = "";

    foreach ($words as $w) {
        $acronym .= mb_substr($w, 0, 1);
    }
    return $acronym;
}

function intToTime($int)
{
    $date = date("Y-m-d H:i:s", $int);
    return Carbon::parse($date);
}
function intToMonth($int)
{
    $date = date("m", $int);
    return $date;
}
function intToYear($int)
{
    $date = date("Y", $int);
    return $date;
}

function diffHuman($date)
{
    return Carbon::parse($date)->locale('id')->diffForHumans();
}

function ambilAngka($int)
{
    return preg_replace("/[^0-9]/", "", $int);
}
