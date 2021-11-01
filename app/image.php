<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class image extends Model
{
    public  function getImage(Request $rq )
    {
        foreach ($rq->file('image') as $file) {
            $name = $file->getClientOriginalName();
            // tách chuỗi lấy đuôi file jpg
            $tach_chuoi = explode(".", $name);
            $end = end($tach_chuoi);
            $mytime = md5(Carbon::now());
            // mã hóa md5
            $hinh = md5($name);
            // đường dẫn của file
            $file_name = $mytime . $hinh . '.' . $end;

            $file->move(public_path() . '/storage/uploals/', $file_name);

            $data[] = 'uploals/' . $file_name;

            $list_file = implode(",", $data);
            return $list_file;
        }
    }
}
