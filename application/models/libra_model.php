<?php defined('BASEPATH') or exit('No direct script access allowed');
class libra_model extends CI_Model
{

    public function getAllDat()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('stock >', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_buku)
    {
        return $this->db->get_where('buku', ["id_buku" => $id_buku])->result();
    }

    public function getMaxId()
    {
        $this->db->select_max('id_buku');
        $this->db->from('buku');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_buku($data)
    {
        $this->db->insert('buku', $data);
    }

    public function update_buku($data, $id_buku)
    {
        $this->db->update('buku', $data, array('id_buku' => $id_buku));
    }

    public function delete_buku($id_buku)
    {
        $this->db->delete('buku', array('id_buku' => $id_buku));
    }

    public function insert_pinjam($data)
    {
        $this->db->insert('pinjam', $data);
    }

    public function ubah_kondisi($username)
    {
        $this->db->set('kondisi', 0);
        $this->db->where('username', $username);
        $this->db->update('user');
    }

    public function del_pinjam($username)
    {
        $this->db->delete('pinjam', array('username' => $username));
    }

    public function ubah_kondisi1($username)
    {
        $this->db->set('kondisi', 1);
        $this->db->where('username', $username);
        $this->db->update('user');
    }

    public function kurangi_stock($id, $stock)
    {
        $temp = $stock - 1;
        $this->db->set('stock', $temp);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }

    public function tambah_stock($id, $stock)
    {
        $temp = $stock + 1;
        $this->db->set('stock', $temp);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }

    // Function cari buku
    public function cariBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kategori', $keyword);
        return $this->db->get('buku')->result();
    }

    public function getPinjam($username){
        $query = $this->db->get_where('pinjam', ["username" => $username])->row();
        return $this->db->get_where('buku', ["id_buku" => $query->id_buku] )->result();
    }

    public function getIdBuku($username)
    {
        $query = $this->db->get_where('pinjam', ["username" => $username])->row();
        return $query->id_buku;
    }

    public function getStock($id)
    {
        $query = $this->db->get_where('buku', ["id_buku" => $id])->row();
        return $query->stock; 
    }
}
