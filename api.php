<?php header('Content-Type: application/json');
// Data dummy
$music = [
 [
 "id" => 1,
 "title" => "Sisa Rasa",
 "penyanyi" => "Mahalini",
 ],
 
];
// Mendapatkan metode HTTP yang digunakan (GET, POST, DELETE)
$method = $_SERVER['REQUEST_METHOD'];
// Mengatur respon berdasarkan metode HTTP
switch ($method) {
 case 'GET':
 // Mengembalikan semua data persons
 echo json_encode($music);
 break;
 case 'POST':
 // Mendapatkan data dari body request
 $input = json_decode(file_get_contents('php://input'), true);
 $input['id'] = end($music)['id'] + 1; // Menambahkan ID baru
 $music[] = $input; // Menambahkan data baru ke array
 echo json_encode($input);
 break;
 case 'DELETE':
 // Mendapatkan ID dari URL
 $url_parts = explode('/', $_SERVER['REQUEST_URI']);
 $id = end($url_parts);
 // Menghapus data berdasarkan ID
 $music = array_filter($music, function ($music) use ($id) {
 return $music['id'] != $id;
 });
 echo json_encode(["message" => "Data dengan ID $id telah dihapus"]);
 break;
 default:
 // Metode HTTP tidak didukung
 http_response_code(405);
 echo json_encode(["message" => "Metode HTTP tidak didukung"]);
 break;
}
?>