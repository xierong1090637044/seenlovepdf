<?php

 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pRadar.class.php");
 include("../class/pImage.class.php");

 class RadarChart
 {

     public function __construct($DATA,$DATA1)
     {
         $this->data = $DATA;
         $this->data1 = $DATA1;
     }
          public function aradarImg()
         {
             $AradarName ="pictures/dadasds.png";

             $MyData = new pData();
             $MyData->addPoints($this->data,"Score");
             $MyData->setSerieDescription("Score","Application A");
             $MyData->setPalette("Score",array("R"=>0,"G"=>84,"B"=>255));

             $MyData->addPoints($this->data1,"Families");
             $MyData->setAbscissa("Families");

             $myPicture = new pImage(400,300,$MyData);

             $myPicture->setFontProperties(array("FontName"=>dirname(dirname(__FILE__))."/fonts/simhei.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));

             $SplitChart = new pRadar();

             /* Draw a radar chart */
             $myPicture->setGraphArea(80,10,320,290);
             $Options = array("DrawPoly"=>TRUE,"Segments"=>4,"WriteValues"=>TRUE,"ValueFontSize"=>6,'DrawAxisValues'=>false,'FixedMax' =>100,"LabelPos"=>RADAR_LABELS_HORIZONTAL,
             "Layout"=>RADAR_LAYOUT_STAR,"BackgroundGradient"=>array("StartR"=>255,"StartG"=>255,"StartB"=>255,"StartAlpha"=>100,"EndR"=>207,"EndG"=>227,"EndB"=>125,"EndAlpha"=>50));
             $SplitChart->drawRadar($myPicture,$MyData,$Options);

             /* Render the picture (choose the best way) */
             $myPicture->render($AradarName);
             return($AradarName);
         }

 }


?>
