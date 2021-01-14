<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
        .container{
            padding-top: 30px;
        }
    </style>
</head>
<body>
@if(!isset($kq)){
    {{$kq=""}}
}
@endif
    <div class="container" >
        <div class="row">
            <table style="width:100%">
                <tr>
                    <th>STT</th>
                    <th>Phương Trình</th>
                    <th>Xử Lý</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <a>2x + 10 = 0 </a>
                    </td>
                    <td>
                        <a href="{{asset('GiaiPhuongTrinhI/2/10')}}" class="btn btn-primary">
                          Giải
                        </a>

                    </td>


                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <a>-3x + 8 = 0</a>
                    </td>
                    <td>
                        <a href="{{asset('/GiaiPhuongTrinhBaiTap1/-3/8')}}" class="btn btn-primary">
                            Giải
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <a >0x + 0 = 0</a>
                    </td>
                    <td>
                        <a href="{{asset('/GiaiPhuongTrinhI/0/0')}}" class="btn btn-primary">

                                Giải

                        </a>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <a >0x - 4 = 0</a>
                    </td>
                    <td>
                        <a href="{{asset('/GiaiPhuongTrinhI/0/-4')}}" class="btn btn-primary">

                                Giải

                        </a>
                    </td>
                </tr>


                <tr>
                    <td>5</td>
                    <td>
                        <a >5x -12 = 0</a>
                    </td>
                    <td>
                        <a href="{{asset('/GiaiPhuongTrinhI/5/-12')}}" class="btn btn-primary">

                                Giải

                        </a>
                    </td>
                </tr>


            </table>

            <p><strong>Tip:</strong> Kết Quả : <div class="text-danger font-weight-bold">{{$kq}}</div></p>

        </div>
    </div>

</body>
</html>
