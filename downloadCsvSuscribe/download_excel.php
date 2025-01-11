<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require __DIR__ . '/../vendor/autoload.php';  // ✅ Inclusion du chargement automatique de Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Clé secrète
$secret_key = 'MaCleUltraSecrete123!';

// Vérification de la clé
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    http_response_code(403);
    echo "⛔ Accès interdit.";
    exit;
}

$file = __DIR__ . '/../subscribers.xlsx';
$csvFile = __DIR__ . '/../subscribers.csv';

if (!file_exists($file)) {
    if (file_exists($csvFile)) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Abonnés Newsletter');

        $row = 1;
        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                $col = 1;
                foreach ($data as $cell) {
                    $sheet->setCellValueByColumnAndRow($col, $row, $cell);
                    $col++;
                }
                $row++;
            }
            fclose($handle);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($file);
    } else {
        echo "❌ Aucun fichier d'abonnés trouvé.";
        exit;
    }
}

header('Content-Description: File Transfer');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="subscribers.xlsx"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
exit;
?>
