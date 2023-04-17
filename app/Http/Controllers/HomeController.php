<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\SEO;

class HomeController extends Controller
{
    public function index()
    {
        SEO::title('API | Polban News ')
            ->description('Aplikasi Polban News merupakan aplikasi yang dapat digunakan sebagai acuan untuk membantu warga Politeknik Negeri Bandung dalam mendapatkan berita aktual dan faktual mengenai seputar kampus dengan cepat dan tepat terutama bagi seluruh mahasiswa yang terdaftar sebagai mahasiswa aktif di kampus Politeknik Negeri Bandung. !')
            ->keywords('Polban', 'Polban News', 'polban', 'polban news', 'polbannews', 'Portal Berita', 'portal berita', 'berita kampus polban');
        return view('welcome');
    }
}
