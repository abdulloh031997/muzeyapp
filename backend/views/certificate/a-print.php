<?php

use backend\components\QrCode as ComponentsQrCode;
use Da\QrCode\QrCode;
?>
<div>
<?php $n = 1 ; foreach ($model as $key => $one) : ?>
    <div style="position: relative;">
        <img alt="" src="../cer/ser.jpg" style="width: 100%;">
        <div style="position: absolute; top: 4.3cm; left: 7cm; text-align: center;font-size: 19px;">
            <h1 style="text-align: center;">O‘zbekiston Respublikasi</h1>
        </div>
        <div style="position: absolute; top: 6.5cm; left: 8.8cm; text-align: center; font-size: 18px;">
            <h2 style="text-align: center;">Malaka oshirish haqida</h2>
        </div>
        <div style="position: absolute; top: 8cm; left: 9.5cm; text-align: center;">
            <h1 style="text-align: center;">SERTIFIKAT</h1>
        </div>
        <div style="position: absolute; top: 10cm; left: 9.8cm; text-align: center;">
            <h1 style="text-align: center;">MO <span>№</span><?= sprintf('%05d', $n++); ?></h1>
        </div>
        <div style="position: absolute; top: 12.5cm; left:60%; transform: translateX(-50%); text-align: center;">
            <div style="text-align: center; font-size: 20px; font-weight: bolder;"><?= $one['lname'] . ' ' . $one['fname'] . ' ' . $one['mname'] ?></div>
        </div>
        <div style="position: absolute; top: 13.4cm; left: 5.8cm; text-align: center;">
            <h3 style="text-align: center; line-height: 0.81cm;">
                2021 yil 18-fevraldan 25-fevralgacha <br>
                Davlat test markazi huzuridagi Ilmiy-o‘quv amaliy markazida <br>
                jami 36 soatlik <br>
                Bilimlarni baholash testlarini ishlab chiqish <br>
                nazariyasi va amaliyoti kursi bo‘yicha malakasini <br>
                oshirdi.
                <br>
            </h3>
        </div>
        <div style="position: absolute; top: 21.5cm; left: 6.5cm; text-align: center;">
            <div style="text-align: center;">
                Muhr o‘rni
            </div>
        </div>

        <div style="position: absolute; top: 22.5cm; left: 6.5cm; text-align: center;">
            <h3 style="text-align: center;">
                Boshliq <span>________________</span> A.A.Baratov
            </h3>
        </div>
        <div style="position: absolute; top: 24.3cm; left: 6.5cm; text-align: center;">
            <h3 style="text-align: center;">
                Sana <span>_______________<span> </span></span> Qayd raqami <span>___________</span>
            </h3>
        </div>
        <div style="position: absolute; top: 25.5cm; right: 1.5cm; text-align: center;">
            <?php $qr = (new QrCode('http://ilmiy.dtm.uz/certificate/view?id='.$model['id']))->setSize(89, 89)
                ->setMargin(10)
                ->useForegroundColor(0, 0, 0);
            echo '<img src="' . $qr->writeDataUri() . '">'?>
        </div>
    </div>
<?php endforeach;?>
</div>
<script type="text/javascript">
    window.print();
    document.addEventListener('keydown', function (event) {
        const key = event.key; // const {key} = event; in ES6+
        if (key === "Escape") {
            window.close();
        }
    });
</script>