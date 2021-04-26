<!-- <script>
        try {
            theViewer.defaultViewer = new theViewer.Viewer({});
        } catch (e) {}
    </script> -->
    <?php $n = 1;
foreach ($ser as $key => $one) : ?>
    <div style="position: relative;">
        <div style="position: absolute;right: 50%; top: 80%;">
            <img class="bi x0 y0 w0 h1" alt="" src="../cer/qe.png" style="width: 129px; height: 129px;">
        </div>
    </div>
    <div id="pf1" class="pf w0 h0" data-page-no="1">
        <div class="pc pc1 w0 h0" >
            <img class="bi x0 y0 w0 h1" alt="" src="../cer/bg1.png">
            <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">O’zbekiston Respublikasi</div>
            <div class="t m0 x2 h3 y2 ff1 fs1 fc0 sc0 ls0 ws0">Malaka oshirish haqida</div>
            <div class="t m0 x3 h2 y3 ff1 fs0 fc0 sc0 ls0 ws0">SERTIFIKAT</div>
            <div class="t m0 x4 h2 y4 ff1 fs0 fc0 sc0 ls0 ws0">PO’ – MO <span class="ff2">№</span style="font-weight: 600;"><?= sprintf('%05d', $n++); ?></div>
            <div class="t m0 x5 h4 y5 ff1 fs3 fc0 sc0 ls0 ws0" style="font-family: sans-serif;font-weight: bold;"><?= $one['lname'] . ' ' . $one['fname'] . ' ' . $one['mname'] ?></div>
            <div class="t m0 x6 h5 y6 ff1 fs3 fc0 sc0 ls0 ws0">2021 yil 18-fevraldan 2021 25-fevralgacha</div>
            <div class="t m0 x7 h6 y7 ff1 fs3 fc0 sc0 ls0 ws0"> <span class="fs4">Davlat test markazi huzuridagi Ilmiy-o’quv </span></div>
            <div class="t m0 x8 h6 y8 ff1 fs4 fc0 sc0 ls0 ws0">amaliy markazida</div>
            <div class="t m0 x9 h6 y9 ff1 fs4 fc0 sc0 ls0 ws0">jami 36 soatlik </div>
            <div class="t m0 x7 h6 ya ff1 fs4 fc0 sc0 ls0 ws0">Bilimlarni baholash testlarini ishlab chiqish </div>
            <div class="t m0 xa h6 yb ff1 fs4 fc0 sc0 ls0 ws0">nazariyasi va amaliyoti kursi bo’yicha malakasini </div>
            <div class="t m0 xb h6 yc ff1 fs4 fc0 sc0 ls0 ws0">oshirdi. </div>

            <div class="t m0 xc h7 yd ff1 fs5 fc0 sc0 ls0 ws0">Muhr o’rni</div>
            <div class="t m0 xc h7 ye ff1 fs5 fc0 sc0 ls0 ws0">Boshliq <span class="ff3">________________</span> A.A.Baratov</div>
            <div class="t m0 xc h7 yf ff1 fs5 fc0 sc0 ls0 ws0">Sana <span class="ff3">_______________<span class="_ _0"> </span></span> Qayd raqami <span class="ff3">___________</span></div>
        </div>
    </div>
<?php endforeach; ?>