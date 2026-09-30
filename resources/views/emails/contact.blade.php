<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 20px;
            color: #333;
        }

        .card {
            background: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #e1e8ed;
        }

        .header {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h2 {
            color: #2563eb;
            margin: 0;
        }

        .field {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #475569;
            font-size: 13px;
            text-transform: uppercase;
        }

        .value {
            font-size: 15px;
            margin-top: 5px;
        }

        .message-box {
            background: #f8fafc;
            padding: 15px;
            border-left: 4px solid #2563eb;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="header">
            <h2>Pesan Portofolio Baru</h2>
        </div>

        <div class="field">
            <div class="label">Nama Pengirim:</div>
            <div class="value"><strong>{{ $data['name'] }}</strong></div>
        </div>

        <div class="field">
            <div class="label">Email Pengirim:</div>
            <div class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></div>
        </div>

        <div class="field">
            <div class="label">Isi Pesan:</div>
            <div class="value message-box">
                {!! nl2br(e($data['message'])) !!}
            </div>
        </div>
    </div>

</body>

</html>
