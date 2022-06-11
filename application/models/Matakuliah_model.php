<?php
class Matakuliah_model extends CI_Model{
    public $id;
    public $nim;
    public $nama;
    public $sks;
    public $kode;
    public $dosen_pembimbing;

    public function getALL(){
        // menampilkan seluruh data yang ada di table matakuliah menggunakan query builder
        $query = $this->db->get('matakuliah');
        return $query->result();
    }
    public function getById($id){
        // menampilkan data berdasarkan id
        $query = $this->db->get_where('matakuliah', ['id' => $id]);
        return $query->row();
    }
    public function simpan($data){
        $sql = "INSERT INTO matakuliah (id,nim,nama,sks,kode,dosen_pembimbing) VALUES (?,?,?,?,?,?)";

        $this->db->query($sql, $data);
        $insert_id = $this->db->insert_id();
        return $this->getById($insert_id);
    }
    public function update($data){
        $sql = "UPDATE matakuliah SET id=?,nim=?,nama=?,sks=?,kode=?,dosen_pembimbing=? WHERE id=?";
        $this->db->query($sql,$data);
    }
    public function delete($data){
        // hapus data matakuliah
        $sql = "DELETE FROM matakuliah WHERE id=?";
        $this->db->query($sql,$data);
    }
}
?>