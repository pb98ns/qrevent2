<?php

namespace App\Repositories;
use App\Qrcode;
use DB;

class QrcodeRepository extends BaseRepository{
    public function __construct(Qrcode $model)
    {
        $this->model = $model;
    }
    public function getAllQrcodes()
    {
        return $this->model->orderBy('image', 'asc')->get();
    }
   
}
?>