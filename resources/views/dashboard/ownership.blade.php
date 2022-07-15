<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Paper</title>
</head>

<body>
    <style>
        .card-container {
            margin-top: 20vh;
            margin: auto;
            font-family: sans-serif;
            width: 90%;
            border: 1px solid grey;
            background-color: rgb(255, 254, 253);
        }

        .pdf-card-header {
            margin: 0;
            padding: 1rem 0;
            background-color: #eaeaea;
        }

        .pdf-card-title {
            margin: .75rem 0;
            text-transform: uppercase;
        }

        .pdf-card-desc {
            margin: 1rem 0;
            padding: 1rem .75rem;
        }

        .pdf-card>* {
            text-align: center;
        }

        .pdf-bottom {
            margin-top: 1rem;
            display: flex;
            margin-bottom: 1.5rem;
        }

        .pdf-footer {
            margin: .75rem 0;
            text-align: center;
            font-size: .75rem;
        }

        .text-center {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
        }
    </style>
    <div class="border card-container">
        <div class="pdf-card">
            <div class="pdf-card-header">
                <h1>
                    {{ $title }}
                </h1>
                <hr>
            </div>
            <div class="card-body">
                <div class="pdf-card-title">
                    <p>Type</p>
                    <h3>
                        {{ $category }}
                    </h3>
                </div>
                <p class="pdf-card-desc">{!! strip_tags($description) !!}</p>

                <div class="pdf-bottom">
                    <p>New Owner : <strong>{{ $owner }}</strong></p>
                    <p>Old Owner : <strong>{{ $user }}</strong></p>
                </div>
            </div>
            <hr>
            <div class="pdf-footer">
                By Using This Platform, I Agree To our Policy
            </div>
        </div>
    </div>

    <div class="text-center">
        <h1>ADOPT ME - <strong>AGREEMENT DOCUMENT</strong></h1>
        <p>All Right Reserved</p>
    </div>
</body>

</html>