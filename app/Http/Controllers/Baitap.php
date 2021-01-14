<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Baitap extends Controller
{
    public function  hienketqua($a,$b)
    {
        $kq ="";
        if($a==0){
            if($b==0){
                $kq = "phương trình vô số nghiệm";
            } else{
                $kq = "Phương trình vô số nghiệm";
            }
        }
        else{
            $x = -$b / $a;
            $kq  = "Phương trình có nghiệm là: ".$x;
        }

       return view("buoi2.hienketqua", compact('a','b','kq'));

    }

    // hàm buổi 3
    public function GiaiPhuongTrinhBaiTap1($a, $b){
        $kq ="";
        if($a==0){
            if($b==0){
                $kq = "phương trình vô số nghiệm";
            } else{
                $kq = "Phương trình vô số nghiệm";
            }
        }
        else{
            $x = -$b / $a;
            $kq  = "Phương trình có nghiệm là: ".$x;
        }

        return view("Buoi03.Baitap", compact('kq'));
    }


    public function getIndex(){
        return view('layout.index');
    }
    public function getHtml(){
        return view('layout.tranghtml');
    }
    public function getPhp(){
        return view('layout.trangphp');
    }

}
