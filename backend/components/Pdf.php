<?php


namespace app\components;

use Yii;
use yii\helpers\Html;
use mPdf;
class Pdf
{
    public function actionCreateMPDF()
    {

        // $mpdf = new mPDF();
        // $mpdf->WriteHTML($this->renderPartial('mpdf'));
        // $mpdf->Output();
        // exit;
    }
    public function actionSamplePdf()
    {
        $mpdf = new mPDF;
        $mpdf->WriteHTML('Sample Text');
        $mpdf->Output();
        exit;
    }
    public function actionForceDownloadPdf()
    {
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }
}