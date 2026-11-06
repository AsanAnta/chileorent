<?php
/**
 * ==============================================================================
 * PERTEMUAN 7: WEB PROGRAMMING - MVC ARCHITECTURE
 * TASK 02: BUILD THE CONTROLLER (Controller/ChileorentController.php)
 * ==============================================================================
 * Tema: Chileorent - Marketplace Sewa & Solusi Alih Fungsi Kostum Cosplay
 *
 * Tanggung Jawab Controller:
 * - Menangani Request dari User (Request Handling).
 * - Menjalankan method Controller: index(), show(), process().
 * - Memanggil Model (Model/Chileorent.php) untuk mengelola data.
 * - Mengirimkan data yang telah diproses ke View (View/chileorent-page.php).
 * ==============================================================================
 */

require_once __DIR__ . '/../Model/Chileorent.php';

class ChileorentController
{
    private Chileorent $model;

    /**
     * Constructor: Inisialisasi Model Chileorent
     */
    public function __construct()
    {
        $this->model = new Chileorent();
    }

    /**
     * Method index(): Menampilkan Halaman Utama Chileorent
     * Memanggil seluruh data dari Model dan mengirimkannya ke View
     */
    public function index(): void
    {
        $profile      = $this->model->getProfile();
        $programs     = $this->model->getPrograms();
        $pillars      = $this->model->getPillars();
        $programStats = $this->model->getProgramStats();
        $escrowSteps  = $this->model->getEscrowSteps();
        $faqs         = $this->model->getFaqs();

        $data = [
            'controller'      => $this,
            'model'           => $this->model,
            'name'            => $this->model->getName(),
            'period'          => $this->model->getPeriod(),
            'tagline'         => $this->model->getTagline(),
            'profile'         => $profile,
            'programs'        => $programs,
            'pillars'         => $pillars,
            'programStats'    => $programStats,
            'escrowSteps'     => $escrowSteps,
            'faqs'            => $faqs,
            'activeMethod'    => 'index',
            'feedback'        => null,
            'selectedCostume' => null,
            'filterKeyword'   => '',
            'filterStatus'    => ''
        ];

        $this->renderView(__DIR__ . '/../View/chileorent-page.php', $data);
    }

    /**
     * Method show(): Menampilkan Detail Kostum Tertentu
     * Request handling untuk parameter ID kostum
     */
    public function show(?string $id = null): void
    {
        $costumeId = $id ?? ($_GET['id'] ?? 'c1');
        $costume   = $this->model->getProgramById($costumeId);

        $profile      = $this->model->getProfile();
        $programs     = $this->model->getPrograms();
        $pillars      = $this->model->getPillars();
        $programStats = $this->model->getProgramStats();
        $escrowSteps  = $this->model->getEscrowSteps();
        $faqs         = $this->model->getFaqs();

        $data = [
            'controller'      => $this,
            'model'           => $this->model,
            'name'            => $this->model->getName(),
            'period'          => $this->model->getPeriod(),
            'tagline'         => $this->model->getTagline(),
            'profile'         => $profile,
            'programs'        => $programs,
            'pillars'         => $pillars,
            'programStats'    => $programStats,
            'escrowSteps'     => $escrowSteps,
            'faqs'            => $faqs,
            'activeMethod'    => 'show',
            'feedback'        => $costume ? "Menampilkan detail kostum: {$costume['judul']} (ID: {$costumeId})" : "Kostum ID '{$costumeId}' tidak ditemukan.",
            'selectedCostume' => $costume,
            'filterKeyword'   => '',
            'filterStatus'    => ''
        ];

        $this->renderView(__DIR__ . '/../View/chileorent-page.php', $data);
    }

    /**
     * Method process(): Memproses Request Filter / Pencarian dari User
     */
    public function process(array $request = []): void
    {
        $input   = !empty($request) ? $request : ($_POST ?: $_GET);
        $keyword = trim($input['keyword'] ?? '');
        $status  = trim($input['status'] ?? '');

        // Panggil Model dengan parameter filter
        $filteredPrograms = $this->model->getPrograms($keyword, $status);

        $profile      = $this->model->getProfile();
        $pillars      = $this->model->getPillars();
        $programStats = $this->model->getProgramStats();
        $escrowSteps  = $this->model->getEscrowSteps();
        $faqs         = $this->model->getFaqs();

        $feedback = "Method process() berhasil menyaring data: " . count($filteredPrograms) . " kostum ditemukan";
        if (!empty($keyword)) {
            $feedback .= " dengan kata kunci '{$keyword}'";
        }
        if (!empty($status) && $status !== 'all') {
            $feedback .= " status '{$status}'";
        }
        $feedback .= ".";

        $data = [
            'controller'      => $this,
            'model'           => $this->model,
            'name'            => $this->model->getName(),
            'period'          => $this->model->getPeriod(),
            'tagline'         => $this->model->getTagline(),
            'profile'         => $profile,
            'programs'        => $filteredPrograms,
            'pillars'         => $pillars,
            'programStats'    => $programStats,
            'escrowSteps'     => $escrowSteps,
            'faqs'            => $faqs,
            'activeMethod'    => 'process',
            'feedback'        => $feedback,
            'selectedCostume' => null,
            'filterKeyword'   => $keyword,
            'filterStatus'    => $status
        ];

        $this->renderView(__DIR__ . '/../View/chileorent-page.php', $data);
    }

    /**
     * Helper Method: Mengirim data ke View
     */
    private function renderView(string $viewPath, array $data = []): void
    {
        extract($data);

        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "<h1>Error: View tidak ditemukan di {$viewPath}</h1>";
        }
    }
}
