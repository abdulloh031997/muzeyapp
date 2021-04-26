<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.03.2021
 * Time: 9:18
 */
?>
<!-- end of header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px"> <?= $model->cours->name_uz . ' ga ro\'yxatdan o\'tdingiz !' ?></h2>
</div> <!-- end of col -->
</div> <!-- end of row -->
</div> <!-- end of container -->
</header> <!-- end of ex-header -->
<div class="container card-body table-responsive card" id="source-html">
    <style>
        table {
            border-collapse: collapse;
            font-family: Sans-serif;
        }

        table, td, th {
            border: 1px solid black;
        }
    </style>
    <table style="width: 100%; padding: 2px;min-width: 700px; font-size: 12px" border="1">
        <tbody><tr>
            <td rowspan="1" style="vertical-align: top;text-align: center;" width="100px">
                <i>XABARNOMA</i>
            </td>
            <td colspan="5">
                Invoys raqami: <b style="font-size: 16px"><?=$model->invoice?></b><br>
                O'ZBEKISTON RESPUBLIKASI
                VAZIRLAR MAHKAMASI
                DAVLAT TEST MARKAZI HUZURIDAGI
                ILMIY-O'QUV AMALIY MARKAZI
            </td>
        </tr>
        <tr>
            <td rowspan="4" style="text-align: center;vertical-align: bottom;border-top:none">Xazinachi</td>
            <td style="padding: 2px;">Bank nomi</td>
            <td style="padding: 2px; font-family: Sans-serif" colspan="4">ATIB "IPOTEKA BANK" Yunusobod filiali</td>

        </tr>
        <tr>
            <td style="padding: 2px;">Bank kodi</td>
            <td style="padding: 2px;">00837</td>
            <td style="padding: 2px;">STIR</td>
            <td style="padding: 2px;" colspan="2">307823101</td>
        </tr>
        <tr>
            <td style="padding: 2px;">To'lovchi</td>
            <td style="padding: 2px;" colspan="4"><b style="text-transform: uppercase"><?=$model->lastname.' '.$model->name.' '.$model->fname ?></b> &nbsp; Imzo_______________</td>
        </tr>
        <tr>
            <td colspan="5" style="padding: 2px">
                STIR: <b>307823101</b>&nbsp; HISOB RAQAM: <b>20208000705295946001</b>
                <table style="text-align: center;width: 100%">
                    <tbody><tr>
                        <th style="text-align: center">To'lov turi</th>
                        <th style="text-align: center;width: 120px">Jami</th>
                    </tr>
                    <tr>
                        <td><b><?= $model->cours->name_uz ?></b></td>
                        <td style="font-size: 14px"><b><?=$model->summ?></b></td>
                    </tr>
                    </tbody></table>
                <div style="text-align: right">
                    <?php echo numberTowords($model->summ)?> </div>
            </td>

        </tr>
        </tbody>
    </table>
    <hr style="border: dashed black 1px;margin-top: 7px;margin-bottom: 7px;">
    <table style="width: 100%; padding: 12px;min-width: 700px; font-size: 12px" border="1">
        <tbody><tr>
            <td rowspan="5" style="text-align: center;vertical-align: bottom;" width="100px">
                <i>PATTA<br>Xazinachi</i></td>
            <td colspan="5" style="padding: 2px;">
                Invoys raqami: <b style="font-size: 16px"><?=$model->invoice?></b> <span style="color: red"></span><br>
                O'ZBEKISTON RESPUBLIKASI
                VAZIRLAR MAHKAMASI
                DAVLAT TEST MARKAZI HUZURIDAGI
                ILMIY-O'QUV AMALIY MARKAZI
            </td>
        </tr>
        <tr>
            <td style="padding: 2px;">Bank nomi</td>
            <td style="padding: 2px; font-family: Sans-serif" colspan="4">ATIB "IPOTEKA BANK" Yunusobod filiali</td>

        </tr>
        <tr>
            <td style="padding: 2px;">Bank kodi</td>
            <td style="padding: 2px;">00837</td>
            <td style="padding: 2px;">STIR</td>
            <td style="padding: 2px;" colspan="2">307823101</td>
        </tr>
        <tr>
            <td style="padding: 2px;">To'lovchi</td>
            <td style="padding: 2px;" colspan="4"><b style="text-transform: uppercase"><?=$model->lastname.' '.$model->name.' '.$model->fname ?></b>&nbsp; Imzo_______________</td>
        </tr>
        <tr>
            <td colspan="5" style="padding: 2px">
                STIR: <b>307823101</b>&nbsp; HISOB RAQAM: <b>20208000705295946001</b>
                <table style="text-align: center;width: 100%" border="1">
                    <tbody><tr>
                        <th style="text-align: center">To'lov turi</th>
                        <th style="text-align: center;width: 120px">Jami</th>
                    </tr>
                    <tr>
                        <td><b><?= $model->cours->name_uz ?></b></td>
                        <td style="font-size: 14px"><b><?=$model->summ?></b></td>
                    </tr>
                    </tbody></table>
                <div style="text-align: right">
                    <?php echo numberTowords($model->summ)?></div>
            </td>
        </tr>
        </tbody>
    </table>

</div>
<div class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <?=\yii\helpers\Html::a('<i class="fa far fa-file-pdf"></i> PDF Yuklab olish', ['/registered/print','id'=>$model->id], [
            'class'=>'btn btn-warning text-dark font-weight-bold',
            'target'=>'_blank',
            'data-toggle'=>'tooltip',
            'title'=>'Will open the generated PDF file in a new window'
            ]);?>
        </div>
    </div>
</div>
<script>
    function printdiv(printpage)
    {
        var WindowObject = window.open("", "printWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes", '_blank');
        WindowObject.document.writeln(printpage);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();

        return false;
    }
    function exportHTML(){
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = '<?=$model->name ?>.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }

</script>
