<?php

class Blog extends CI_Controller
{

  public function index()
  {
    $this->load->helper('url');
    $this->load->model('Blog_model');

    $posts = $this->Blog_model->get_posts();
    $data['posts'] = $posts;

    $this->load->view('read', $data);
  }

  public function create()
  {
    $this->load->helper('url');
    $this->load->view('blog_create');
  }

  public function create_process()
  {
    $data['judul'] = $this->input->post('judul');
    $data['konten'] = $this->input->post('konten');
    // $judul = $this->input->post('judul');
    // $konten = $this->input->post('konten');
    $this->load->helper('url');
    $this->load->model('blog_model');

    $this->blog_model->insert_post($data);
    redirect(base_url(), 'refresh');
  }

  public function delete($id)
  {
    $this->load->helper('url');
    $this->load->model('Blog_model');

    $this->Blog_model->delete_post($id);

    redirect(base_url(), 'refresh');
  }

  public function update($id)
  {
    $this->load->model('blog_model');
    $data['post'] = $this->blog_model->getUpdPost($id);
    $this->load->helper('url');
    $this->load->view('blog_update',$data);
  }

  public function update_process()
  {
    $data['judul'] = $this->input->post('judul');
    $data['konten'] = $this->input->post('konten');
    $id = $this->input->post('id');
    // $judul = $this->input->post('judul');
    // $konten = $this->input->post('konten');
    // $id = $this->input->post('id');

    $this->load->helper('url');
    $this->load->model('blog_model');

    $this->blog_model->update_post($data,$id);
    redirect(base_url(), 'refresh');
  }
}
