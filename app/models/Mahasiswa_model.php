<?php
 
class Mahasiswa_model{
    // private $mhs = [
    //     [
    //         "nama" => "Erick Oktavianto",
    //         "nim" => "2411500048",
    //         "email" => "Okt@atmaluhur.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],

    //     [
    //         "nama" => "Framlie DC",
    //         "nim" => "2411500057",
    //         "email" => "fram@atmaluhur.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],
        
    //     [
    //         "nama" => "Devid WH",
    //         "nim" => "2411500047",
    //         "email" => "WH@atmaluhur.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ]
    // ];
    private $table = 'mahasiswa';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    public function getAllMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

 public function tambahDataMahasiswa($data)
{
    $query = "INSERT INTO {$this->table} (`nama`, `nim`, `email`, `jurusan`)
              VALUES (:nama, :nim, :email, :jurusan)";
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();
    return $this->db->rowCount();
}

}

?>