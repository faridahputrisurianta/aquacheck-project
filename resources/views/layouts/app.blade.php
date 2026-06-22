<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaCheck</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial,sans-serif;
            background:#eef2f7;
            color:#111827;
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            padding:20px;
            color:white;
            background:linear-gradient(180deg,#0d47a1,#1976d2);
            position:fixed;
            left:0;
            top:0;
            overflow-y:auto;
        }

        .sidebar h2{
            margin-bottom:30px;
            text-align:center;
            color:white;
            font-size:40px;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar li{
            margin-bottom:12px;
            padding:15px;
            border-radius:12px;
            background:rgba(255,255,255,0.12);
            transition:0.3s;
        }

        .sidebar li:hover{
            background:rgba(255,255,255,0.25);
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            font-size:20px;
        }

        .main{
            margin-left:250px;
            width:calc(100% - 250px);
            padding:30px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 3px 10px rgba(0,0,0,.08);
        }

        th{
            background:#1976d2;
            color:white;
        }

        th, td{
            border:1px solid #ddd;
            padding:14px;
            text-align:left;
        }

        .btn{
            display:inline-block;
            padding:10px 16px;
            border:none;
            border-radius:8px;
            color:white !important;
            text-decoration:none !important;
            cursor:pointer;
            font-size:14px;
            font-weight:bold;
        }

        .btn-primary{
            background:#1976d2;
        }

        .btn-warning{
            background:#f59e0b;
        }

        .btn-danger{
            background:#ef4444;
        }

        .btn:hover{
            opacity:0.9;
        }

        .badge-good{
            background:#22c55e;
            color:white;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
        }

        .badge-warning{
            background:#f59e0b;
            color:white;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
        }

        .badge-danger{
            background:#ef4444;
            color:white;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
        }

        /* RESPONSIVE HP */
        @media (max-width: 768px){

            .container{
                display:block;
            }

            .sidebar{
                position:relative;
                width:100%;
                min-height:auto;
                padding:15px;
            }

            .sidebar h2{
                font-size:32px;
                margin-bottom:20px;
            }

            .sidebar li{
                padding:12px;
                margin-bottom:10px;
            }

            .sidebar a{
                font-size:18px;
            }

            .main{
                margin-left:0;
                width:100%;
                padding:15px;
            }

            h1{
                font-size:28px !important;
            }

            h2{
                font-size:22px !important;
            }

            table{
                display:block;
                overflow-x:auto;
                white-space:nowrap;
            }

            .btn{
                width:100%;
                text-align:center;
                margin-top:8px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>AquaCheck</h2>

        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/water-quality">Monitoring Air</a></li>
            <li><a href="/map">Peta Lokasi</a></li>
            <li><a href="/history">Riwayat</a></li>
            <li><a href="/notifications">Notifikasi</a></li>
            <li><a href="/reports">Laporan</a></li>
        </ul>
    </div>

    <div class="main">
        @yield('content')
    </div>
</div>

</body>
</html>