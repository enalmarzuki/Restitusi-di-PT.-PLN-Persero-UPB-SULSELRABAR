<?php defined('BASEPATH') OR exit('No direct script access allowed');

	Class Fungsi
{
    public function nominal($angka){
        return "Rp. ".number_format($angka, 0, ',', '.').",-";
    }
}
