<?php

namespace App\Controllers;

use App\Models\LinksModel;

class Home extends BaseController
{
    public function index()
    {
        return view('templates/header', ['title' => 'Url Shortner']) . view('index') . view('templates/footer');
    }

    public function createLink()
    {
        $model = model(LinksModel::class);

        if ($this->request->withMethod('post') && $this->validate([
                'link' => 'required|max_length[255]',
            ])) {

            $link = $model->where('link', '=', $this->request->getPost('link'))->first();
            if (is_null($link)) {
                $key = random_string('abcdefghktqrs', 6);
                $model->save([
                    'link' => $this->request->getPost('link'),
                    'key' => $key
                ]);
            } else {
                $key = $link->key;
            }

            return redirect()
                ->with('success', 'Link generated')
                ->with('link', $key);
        }
    }
}
