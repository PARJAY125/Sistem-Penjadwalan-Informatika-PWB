<?php
// Masukkan file koneksi database Anda di sini
include 'conn.php';

// Menjalankan query untuk mengambil data jadwal kuliah, dosen, mata kuliah, dan kelas dari database
$sql = "SELECT jadwal_kuliah.id as nomor, user.username as nama_dosen, mata_kuliah.nama_mata_kuliah, kelas.nama_kode_kelas, jadwal_kuliah.waktu_kuliah, jadwal_kuliah.lokasi
        FROM jadwal_kuliah
        INNER JOIN mata_kuliah ON jadwal_kuliah.id_mata_kuliah = mata_kuliah.id
        INNER JOIN dosen ON mata_kuliah.id_dosen = dosen.id
        INNER JOIN user ON dosen.id_user = user.id
        INNER JOIN kelas_partisipan_pada_jadwal_kuliah ON jadwal_kuliah.id = kelas_partisipan_pada_jadwal_kuliah.id_jadwal_kuliah
        INNER JOIN kelas ON kelas_partisipan_pada_jadwal_kuliah.id_kelas = kelas.id";

$result = $conn->query($sql);

// // Mulai membuat struktur HTML tabel
echo "<table>
      <tr>
        <th>Nomor</th>
        <th>Nama Dosen</th>
        <th>Mata Kuliah</th>
        <th>Kode Kelas</th>
        <th>Hari, Tanggal, Waktu</th>
        <th>Lokasi</th>
        <th>Komentar</th>
      </tr>";

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nomor"]. "</td>
                <td>" . $row["nama_dosen"]. "</td>
                <td>" . $row["nama_mata_kuliah"]. "</td>
                <td>" . $row["nama_kode_kelas"]. "</td>
                <td>" . date('D, d M Y H:i', strtotime($row["waktu_kuliah"])). "</td>
                <td>" . $row["lokasi"]. "</td>
                <td>" . $row["komentar"]. "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>0 results</td></tr>";
}
echo "</table>";

// Menutup koneksi database
$conn->close();
?>
