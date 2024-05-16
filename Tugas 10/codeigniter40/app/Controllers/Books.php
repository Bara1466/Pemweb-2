<?php

namespace App\Controllers;

use App\Models\booksModel;

class Books extends BaseController
{
    protected $booksModel;
    public function __construct()
    {
        $this->booksModel = new booksModel();
    }
    public function index()
    {
        //$buku = $this->booksModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->booksModel->getBuku()
        ];

        return view('books/index', $data);
    }


    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->booksModel->getBuku($slug)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku ' . $slug . ' Tidak ditemukan.');
        }


        return view('books/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('books/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[books.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah dimasukan.'
                ]
            ]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/books/create')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->booksModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $this->booksModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/books');
    }
}
