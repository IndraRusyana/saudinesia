<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
     //
     public function index()
     {
         $home = 'transport';
 
         $breadcrumbs = [
             ['label' => 'Home', 'url' => '/'],
             ['label' => 'Layanan', 'url' => null],
             ['label' => 'Transport', 'url' => null], // Aktif / halaman saat ini
         ];
 
         return view('user.serviceTransport', compact('home', 'breadcrumbs'));
     }

     public function detail()
     {
         $home = 'transport';
 
         $breadcrumbs = [
             ['label' => 'Home', 'url' => '/'],
             ['label' => 'Layanan', 'url' => null],
             ['label' => 'Transport', 'url' => null], // Aktif / halaman saat ini
         ];
 
         return view('user.detailTransport',  compact('home', 'breadcrumbs'));
     }
}
