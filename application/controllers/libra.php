<?php defined('BASEPATH') or exit('No direct script access allowed');

class Libra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("libra_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('username')) {
        } else {
            redirect(base_url() . 'auth', 'refresh');
        }
    }

    public function index()
    {
        $title['title'] = 'Daftar buku';
        $data['libra'] = $this->libra_model->getAllDat();
        // kondisi ketika search
        if ($this->input->post('keyword')) {
            $data['libra'] = $this->libra_model->cariBuku();
        }
        $this->load->view('callbootstrap', $title);
        $this->load->view('index', $data);
    }

    public function create()
    {
        $title['title'] = 'Tambah Buku';
        $data['id_buku'] = $this->libra_model->getMaxId();
        $this->load->view('callbootstrap', $title);
        $this->load->view('create', $data);
    }

    public function create_process()
    {
        $this->form_validation->set_rules('id_buku', 'Id_buku', 'required|is_unique[buku.id_buku]', ['required' => 'Form ID harus diisi.', 'is_unique' => 'ID sudah digunakan.']);
        $this->form_validation->set_rules('judul', 'Judul', 'required', ['required' => 'Form judul harus diisi.']);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', ['required' => 'Form penulis harus diisi.']);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Form kategori harus diisi.']);
        $this->form_validation->set_rules('stock', 'Stock', 'required', ['required' => 'Form stock harus diisi.']);
        if ($this->form_validation->run() == true) {
            $data['id_buku'] = $this->input->post('id_buku');
            $data['judul'] = $this->input->post('judul');
            $data['penulis'] = $this->input->post('penulis');
            $data['kategori'] = $this->input->post('kategori');
            $data['stock'] = $this->input->post('stock');
            $this->libra_model->insert_buku($data);
            // Mengisi flashdata dengan perintah sesuai
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect(base_url() . 'libra', 'refresh');
        } else {
            $title['title'] = 'Tambah Buku';
            $data['id_buku'] = $this->libra_model->getMaxId();
            $this->load->view('callbootstrap', $title);
            $this->load->view('create', $data);
        }
    }

    public function update($id)
    {
        $title['title'] = 'Edit buku';
        $data['libra'] = $this->libra_model->getById($id);
        $this->load->view('callbootstrap', $title);
        $this->load->view('update', $data);
    }

    public function update_process()
    {
        $id = $this->input->post('id_buku');
        $this->form_validation->set_rules('judul', 'Judul', 'required', ['required' => 'Form judul harus diisi.']);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', ['required' => 'Form penulis harus diisi.']);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Form kategori harus diisi.']);
        $this->form_validation->set_rules('stock', 'Stock', 'required', ['required' => 'Form stock harus diisi.']);
        if ($this->form_validation->run() == true) {
            $data['judul'] = $this->input->post('judul');
            $data['penulis'] = $this->input->post('penulis');
            $data['kategori'] = $this->input->post('kategori');
            $data['stock'] = $this->input->post('stock');
            $this->libra_model->update_buku($data, $id);
            // Mengisi flashdata dengan perintah sesuai
            $this->session->set_flashdata('flash', 'diubah');
            redirect(base_url() . 'libra', 'refresh');
        } else {
            $title['title'] = 'Edit buku';
            $data['libra'] = $this->libra_model->getById($id);
            $this->load->view('callbootstrap', $title);
            $this->load->view('update', $data);
        }
    }

    public function delete($id)
    {
        $this->libra_model->delete_buku($id);
        // Mengisi flashdata dengan perintah sesuai
        $this->session->set_flashdata('flash', 'dihapus');
        redirect(base_url() . 'libra', 'refresh');
    }

    public function pinjam()
    {
        $id = $this->input->get('id');
        $stock = $this->input->get('stock');
        $this->session->kondisi = 0;
        $username = $this->session->username;
        $data['id_buku'] = $id;
        $data['username'] = $username;
        $this->libra_model->insert_pinjam($data);
        $this->libra_model->ubah_kondisi($username);
        $this->libra_model->kurangi_stock($id, $stock);
        // Mengisi flashdata dengan perintah sesuai
        $this->session->set_flashdata('flash', 'dipinjam');
        redirect(base_url() . 'libra', 'refresh');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('kondisi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect(base_url() . 'auth', 'refresh');
    }

    public function mengembalikan(){
        $title['title'] = 'Detail Buku';
        $username = $this->session->username;
        $data['libra'] = $this->libra_model->getPinjam($username);
        $this->load->view('callbootstrap', $title);
        $this->load->view('pengembalian', $data);
    }
    public function mengembalikan_process()
    {
        $this->session->kondisi = 1;
        $username = $this->session->username;
        $id = $this->libra_model->getIdBuku($username);
        $stock = $this->libra_model->getStock($id);
        $this->libra_model->del_pinjam($username);
        $this->libra_model->ubah_kondisi1($username);
        $this->libra_model->tambah_stock($id, $stock);
        // Mengisi flashdata dengan perintah sesuai
        $this->session->set_flashdata('flash', 'dikembalikan');
        redirect(base_url() . 'libra', 'refresh');
    }
}
