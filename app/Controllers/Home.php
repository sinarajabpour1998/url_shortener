<?php

namespace App\Controllers;

use App\Models\LinksModel;

class Home extends BaseController
{
    public function index()
    {
        return view('templates/header', ['title' => 'Url Shortener']) . view('index') . view('templates/footer');
    }

    public function createLink()
    {
        if ($this->validate([
                'url' => 'required|max_length[255]|valid_url',
            ])) {

            $model = new LinksModel();
            $link = $model->where('link',$this->request->getPost('url'))->first();
            if (is_null($link)) {
                $key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(6/strlen($x)) )),1,6);
                $model = model(LinksModel::class);
                $model->save([
                    'link' => $this->request->getPost('url'),
                    'link_key' => $key
                ]);
            } else {
                $key = $link['link_key'];
            }

            return redirect()->route('generated_link' , [$key]);
        } else {
            return redirect()->back()
                ->with('error','Link is not valid');
        }
    }

    public function generatedLink($link)
    {
        $validator = $this->validateData([
            'link' => $link
        ], [
            'link' => 'required|max_length[255]',
        ]);
        if (!$validator) {
            return json_encode([
                'status' => 422,
                'message' => 'Link is not valid'
            ]);
        }
        $model = new LinksModel();
        $link = $model->where('link_key',$link)->first();
        if (is_null($link)) {
            return json_encode([
                'status' => 404,
                'message' => 'Link not found'
            ]);
        }

        return view('templates/header', ['title' => 'Url Shortener']) . view('show', ['link' => $link['link_key']]) . view('templates/footer');
    }

    public function showLink($key)
    {
        $validator = $this->validateData([
            'key' => $key
        ], [
            'key' => 'required|max_length[255]',
        ]);
        if (!$validator) {
            return json_encode([
                'status' => 422,
                'message' => 'Link is not valid'
            ]);
        }

        $model = new LinksModel();
        $link = $model->where('link_key',$key)->first();
        if (is_null($link)) {
            return json_encode([
                'status' => 404,
                'message' => 'Link not found'
            ]);
        }

        return redirect()->to($link['link']);
    }
}
