<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div style="width: 60%; margin: 0 auto;margin-top: 200px;">
        <div class="card text-center">
            <?php if ($model->ser == 1) : ?>
                <div class="card-header bg-success text-white font-weight-bold">
                    Sertifikat berilgan
                </div>
            <?php elseif($model->ser == 0) : ?>
                <div class="card-header bg-danger text-white font-weight-bold">
                    Sertifikat berilmagan
                </div>
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?=$model['fname'].' '.$model['lname'].' '.$model['mname']?></h5>
                <p class="card-text">Bilimlarni baholash testlarini ishlab chiqish <br>
                nazariyasi va amaliyoti kursi bo’yicha malakasini <br>
                oshirdi.</p>
                <a href="https://dtm.uz/page/ilmiy_markaz" class="btn btn-primary">Go</a>
            </div>
            <div class="card-footer text-muted">
                Ilmiy-o’quv amaliy markazi
            </div>
        </div>
    </div>
</body>

</html>