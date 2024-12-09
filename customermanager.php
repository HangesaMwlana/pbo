<?php
class CustomerManager
{
    private $file;

    public function __construct()
    {
        $this->file = 'customer.json'; // File JSON untuk menyimpan data
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([])); // Buat file jika belum ada
        }
    }

    // Fungsi untuk mengambil semua customer
    public function getCustomer()
    {
        $data = file_get_contents($this->file);
        return json_decode($data, true);
    }

    // Fungsi untuk menambahkan customer
    public function tambahCustomer($nama, $email, $telepon)
    {
        $customers = $this->getCustomer();
        $id = count($customers) + 1; // ID otomatis
        $customers[] = [
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon
        ];
        file_put_contents($this->file, json_encode($customers, JSON_PRETTY_PRINT));
    }

    // Fungsi untuk menghapus customer
    public function hapusCustomer($id)
    {
        $customers = $this->getCustomer();
        $customers = array_filter($customers, function ($customer) use ($id) {
            return $customer['id'] != $id;
        });
        file_put_contents($this->file, json_encode(array_values($customers), JSON_PRETTY_PRINT));
    }
}
?>
