<?php
/**
 * ==============================================================================
 * PERTEMUAN 7: WEB PROGRAMMING - MODEL VIEW CONTROLLER (MVC)
 * ==============================================================================
 * File        : index.php (Front Controller & Router)
 * Tema        : Chileorent - Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay
 *
 * Capaian Praktikum Pertemuan 7:
 * - Task 01: Design the MVC Structure
 *   [x] Model ditentukan      : Model/Chileorent.php
 *   [x] View ditentukan       : View/chileorent-page.php
 *   [x] Controller ditentukan : Controller/ChileorentController.php
 *   [x] Tanggung jawab masing-masing jelas:
 *       - Model      : Mengelola data kostum, profil, dan aturan bisnis platform.
 *       - View       : Menampilkan antarmuka pengguna (HTML/UI responsif).
 *       - Controller : Menangani request pengguna, memanggil model, dan mengirim data ke view.
 *
 * - Task 02: Build the Controller (REQUEST -> CONTROLLER)
 *   [x] Controller berjalan
 *   [x] Request diterima (GET/POST params)
 *   [x] Method dapat dijalankan: index(), show(), process()
 *   [x] Model dapat dipanggil
 *   [x] View dapat ditampilkan
 *
 * - Task 03: Connect Model, Controller & View (MODEL -> CONTROLLER -> VIEW)
 *   [x] Data berasal dari Model
 *   [x] Controller memproses data
 *   [x] Data dikirim ke View
 *   [x] View menampilkan data
 *   [x] Tidak ada error
 * ==============================================================================
 */

// 1. Memuat Komponen Model & Controller
require_once __DIR__ . '/Model/Chileorent.php';
require_once __DIR__ . '/Controller/ChileorentController.php';

// 2. Request Handling: Menangkap Parameter Request dari Pengguna
$action = strtolower($_GET['action'] ?? 'index');
$id     = $_GET['id'] ?? null;

// 3. Router: Menginisialisasi Controller
$controller = new ChileorentController();

// 4. Dispatcher: Menjalankan Method Controller Sesuai Request (index, show, process)
switch ($action) {
    case 'show':
        $controller->show($id);
        break;

    case 'process':
        $controller->process();
        break;

    case 'index':
    default:
        $controller->index();
        break;
}
