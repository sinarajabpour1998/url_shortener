<?php
namespace App\Models;

use CodeIgniter\Model;

class LinksModel extends Model
{
    protected $table = 'links';

    protected $allowedFields = ['link', 'key', 'created_at'];
}