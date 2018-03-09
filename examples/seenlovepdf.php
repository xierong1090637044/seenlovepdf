<?php

// Include the main TCPDF library (search for installation path).
require_once ('tcpdf_include.php');
require_once ('datas.php');
require_once ('odotutex11.php');
require_once ('aradar.php');
require_once ('draw2DRingValues.php');
require_once ('drawBarChart.spacing.php');
date_default_timezone_set('Asia/Shanghai');

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
		$imgwidth =7;
        $text1="数据由芯乐提供并制作";
		$text2 ='@2018 版权所有';
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
        $this->SetY(10);
        $this->SetFont('helvetica', 'I', 8);
		$this->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
		$this->SetFont("simhei",'',10);
		$this->Cell(91.5, 5, '某知名企业（上海）有限公司 2018 年竞争力报告', 'B', 1, 'L');
		$this->SetY(10);
		$this->SetX(106.5);
		$this->Cell(69.5, 5, '', 'B', 1, 'L');
	    $this->SetFont('simhei');
		$this->SetY(10);
		$this->SetX(176);
        $this->Cell(22, 5, '第'.$this->getAliasNumPage().'页，共'.$this->getAliasNbPages().'页', 'B', 1, 'L');
    }
}

$text1 ="空书由候工几至等代话战观，引例难长活本次与实改，与形号该音红北强指。习起变包好严思置年，飞定感看置天立程满，往作可地红影。地是术料干且江太反山，收西连任向场龙五克，过龙意杏时么用。共每大列华机展通，值便料米三美，老社李困记期。先道会书报半广调接导，工今将始导题务间，矿区雪决广县贡。";
$text2 ='空书由候工几至等代话战观，引例难长活本次与实改，与形号该音红北强指。习起变包好严思置年，飞定感看置天立程满，往作可地红影。地是术料干且江太反山，收西连任向场龙五克，过龙意杏时么用。共每大列华机展通，值便料米三美，老社李困记期。先道会书报半广调接导，工今将始导题务间，矿区雪决广县贡。';
$text3 ='空书由候工几至等代话战观，引例难长活本次与实改，与形号该音红北强指。习起变包好严思置年，飞定感看置天立程满，往作可地红影。地是术料干且江太反山，收西连任向场龙五克，过龙意杏时么用。共每大列华机展通，值便料米三美，老社李困记期。先道会书报半广调接导，工今将始导题务间，矿区雪决广县贡。';
$text4 ='空书由候工几至等代话战观，引例难长活本次与实改，与形号该音红北强指。习起变包好严思置年，飞定感看置天立程满，往作可地红影。地是术料干且江太反山，收西连任向场龙五克，过龙意杏时么用。共每大列华机展通，值便料米三美，老社李困记期。先道会书报半广调接导，工今将始导题务间，矿区雪决广县贡。';

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('芯乐报告');
$pdf->SetSubject('芯乐pdf报告');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE,PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/chi.php')) {
	require_once(dirname(__FILE__).'/lang/chi.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->setPrintHeader(false); //设置打印页眉
$pdf->setPrintFooter(false); //设置打印页脚
// Add a page
$pdf->AddPage();
$pdf->setPrintHeader(true); //设置打印页眉
$pdf->setPrintFooter(false); //设置打印页脚

$pdf->Ln(100);
$pdf->SetFont('simhei', '', 14, '', true);

$pdf->Image('images/2222.png', 0, 40, 50, 50, 'PNG', '', '', true,300,'C');
$pdf->Cell(0, 0, company_name, 0, 1, 'C', 0, '', 0);
$pdf->Ln(10);
$pdf->SetFont('simhei', '', 17, '', true);
$pdf->Cell(0, 0, time, 0, 1, 'C', 0, '', 0);
$pdf->SetFont('simhei', '', 30, '', true);
$pdf->Text(20, 150, '竞争力报告',false,false,true,0,0,'C');
$pdf->Image('images/111.png', 0, 220, 20, 20, 'PNG', '', '', true,300,'C');
$pdf->SetFont('simhei', '', 15, '', true);
//$pdf->Cell(0, 100, '本报告由芯乐提供', 0, 1, 'C', 0, '', 0);
$pdf->Text(20, 240, '本报告由芯乐提供',false,false,true,0,0,'C');

//第二页
$pdf->AddPage();
$pdf->setPrintHeader(true); //设置打印页眉
$pdf->setPrintFooter(true); //设置打印页脚
$pdf->SetFont('simhei', '', 12,'',false);
$pdf->Ln(5);
//MultiCell(宽, 高, 内容, 边框,文字对齐, 文字底色, 是否换行, x坐标, y坐标, 变高, 变宽, 是否支持html, 自动填充, 最大高度)
$pdf->MultiCell(0, 0,$text1);

$pdf->Ln(5);
$pdf->MultiCell(0, 0,$text2);
//$pdf->Ln(5);
$pdf->Image('pictures/example.radar.values.png', '', '', 100, 70, 'PNG', '', '', true,300,'C');
$pdf->Ln(70);
$pdf->MultiCell(0, 0,$text3);
$pdf->Ln(5);
$pdf->Image('pictures/example.draw2DRingValue.png', '', '', 100, 70, 'PNG', '', '', true,300,'C');
$pdf->Ln(75);
$pdf->MultiCell(0, 0,$text4);

$pdf->AddPage();
$pdf->SetFont('simhei', '', 12,'',false);
$pdf->Ln(5);
$pdf->MultiCell(0, 0,$text4);
$pdf->Ln(5);
$pdf->Image('pictures/odotutex.png', '', '', 50, 39, 'PNG', '', '', true,300,'C');
$pdf->Ln(44);
$pdf->MultiCell(0, 0,$text1);
$pdf->Ln(5);
$pdf->Image('pictures/example.drawBarChart.spacing.png', '', '', 140, 60, 'PNG', '', '', true,300,'C');
$pdf->Ln(65);
$pdf->MultiCell(0, 0,"空书由候工几至等代话战观，引例难长活本次与实改，与形号该音红北强指。习起变包好严思置年，飞定感看置天立程满，往作可地红影。地是术料干且江太反山，收西连任向场龙五克，过龙意杏时么用。共每大列华机展通，值便料米三美，老社李困记期。先道会书报半广调接导，工今将始导题务间，矿区雪决广县贡。");
$pdf->Ln(10);
$pdf->MultiCell(0, 0,"--本报告内容完--",0,"C",false,0,'','',false);
$pdf->Output('seenlovepdf.pdf', 'I');
?>
