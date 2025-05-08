<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuttowifController extends Controller
{
         //
         public function index()
         {
             $home = 'muttowif';
     
             $breadcrumbs = [
                 ['label' => 'Home', 'url' => '/'],
                 ['label' => 'Layanan', 'url' => null],
                 ['label' => 'Muttowif', 'url' => null], // Aktif / halaman saat ini
             ];
     
             return view('user.serviceMuttowif', compact('home', 'breadcrumbs'));
         }
}
