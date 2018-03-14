<?php
// Include the main TCPDF library (search for installation path).
require_once ('tcpdf_include.php');
require_once ('class/Odometer.php');
require_once ('class/aradar.php');
require_once ('class/draw2DRingValues.php');
require_once ('class/drawBarChart.spacing.php');
require_once ('datas.php');
date_default_timezone_set('Asia/Shanghai');

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
     $text1="数据由芯乐提供并制作";
     $text2 ='@2018 版权所有';
     $imgwidth =7;
     $image_file = K_PATH_IMAGES.'111.png';

     $this->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
     $this->Image($image_file, 15, 285, $imgwidth, '', 'PNG', '', 'T', false, 300, '', false, false, "T", false, false, false);
     $this->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
     $this->SetX(22);
     $this->Cell(176, 0, $text1, 'T', 1, 'L');
     $this->SetX(22);
     $this->Cell(176, 0, $text2, 0, 1, 'L');
    }
    // Page footer
    public function Footer() {
     $HeaderText = '某知名企业（上海）有限公司 2018 年竞争力报告';

     $this->SetY(10);
     $this->SetFont('helvetica', 'I', 8);
     $this->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
     $this->SetFont("simhei",'',10);
     $this->Cell(91.5, 5, $HeaderText, 'B', 1, 'L');
     $this->SetY(10);
     $this->SetX(106.5);
     $this->Cell(69.5, 5, '', 'B', 1, 'L');
     $this->SetFont('simhei');
     $this->SetY(10);
     $this->SetX(176);
     $this->Cell(22, 5, '第'.$this->getAliasNumPage().'页，共'.$this->getAliasNbPages().'页', 'B', 1, 'L');
    }
}
$data = array(70,80,60,50,50,40,10);
$data1 = array(2,3,1,1);
$data2 =array("A0","B1","C2","D3");
$data111 = array("个人情况111","信用情况111","经济实力111","稳定情况111","贷款情况111","工作情况111","保障情况111");
$data3 = 35;
$BarChartData = array(150,220,300,250.6,300);
$BarChartData1 = array(140,100,340,300,320);
$BarChartData2 = array("一月","二月","三月","四月","五月");
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->FunctionSet($title);
$pdf->BannerPage($company,$time,$pdfname,$produceby,$bannerimg,$companyimg);

$pdf->AddText("我不知道啊");

$pdf->AddRadarImage(new RadarChart($data,$data111));
$pdf->AddText("我不知道啊ddddddddddddddddddddddddddddddddddddddddddddddddddddd大
萨达所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所");
$pdf->AddRadarImage(new RadarChart($data,$data111));
$pdf->AddRadarImage(new RadarChart($data,$data111));
$pdf->AddPage();
$pdf->AddRingImage(new RingChart($data1,$data2));
$pdf->AddOdotutexImage(new OdometerChart($data3));
$pdf->AddBarchartImage(new BarChart($BarChartData,$BarChartData1,$BarChartData2));
$pdf->Output('seenlovepdf.pdf', 'I');
?>
