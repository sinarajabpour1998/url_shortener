<?php
namespace App\Models;

use CodeIgniter\Model;

class LinksModel extends Model
{
    protected $table = 'links';

    protected $allowedFields = ['link', 'link_key', 'created_at'];
}