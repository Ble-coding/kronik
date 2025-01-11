<?php
// Activer les erreurs pour le débogage (à désactiver en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php'; // Charger PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// ✅ Clé secrète (à garder confidentielle)
$secret_key = 'MaCleUltraSecrete123!';

// 🔒 Vérifier la clé d'accès
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    http_response_code(403);
    echo "⛔ Accès interdit.";
    exit;
}

// 📂 Chemin du fichier Excel
$file = __DIR__ . '/../subscribers.xlsx';

// 📄 Si le fichier Excel n'existe pas, le générer à partir du CSV
$csvFile = __DIR__ . '/../subscribers.csv';
if (!file_exists($file)) {
    if (file_exists($csvFile)) {
        // Charger les données du CSV
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Abonnés Newsletter');

        // 📥 Lire les données CSV et les insérer dans Excel
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

        // 💾 Enregistrer le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save($file);
    } else {
        echo "❌ Aucun fichier d'abonnés trouvé.";
        exit;
    }
}

// 📥 Téléchargement du fichier Excel
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
