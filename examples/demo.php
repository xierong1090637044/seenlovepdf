<?php
require_once ('tcpdf_include.php');

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
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 ?>
