<?php
class BarangManager {
    private $dataFile = 'data.json';
    private $barangList = [];

    public function __construct() {
        if (file_exists($this->dataFile)) { // Perbaikan dari file_exist ke file_exists
            $data = file_get_contents($this->dataFile); // Perbaikan dari tanda "-" ke "="
            $this->barangList = json_decode($data, true) ?? [];
        }
    }

    /// Menambahkan barang
    public function tambahBarang($nama, $harga, $stok) {
        $id = uniqid(); // Generate id unik
        $barang = new Barang($id, $nama, $harga, $stok);
        $this->barangList[] = $barang;
        $this->simpanData();
    }

    /// Mendapatkan semua barang
    public function getBarang() {
        return $this->barangList;
    }

    /// Menghapus barang berdasarkan id
    public function hapusBarang($id) { // Fungsi dimulai
        $this->barangList = array_filter($this->barangList, function($barang) use ($id) {
            return $barang['id'] !== $id;
        });
        $this->simpanData();
    } // Pastikan kurung kurawal ini ada

    /// Menyimpan data ke file JSON
    private function simpanData() {
        file_put_contents($this->dataFile, json_encode($this->barangList, JSON_PRETTY_PRINT));
    }
}
?>
