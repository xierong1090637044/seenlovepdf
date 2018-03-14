<?php

 include("../class/pPie.class.php");

 class RingChart
 {

    public function __construct($DATA1,$DATA2)
     {
         $this->data1 = $DATA1;
         $this->data2 = $DATA2;
     }
    public function ringImg()
     {
         $RingName = "pictures/RingChart.png";

         $MyData = new pData();
         $MyData->addPoints($this->data1,"a");
         $MyData->setSerieDescription("ScoreA","Application A");
         /* Define the absissa serie */
         $MyData->addPoints($this->data2,"Labels");
         $MyData->setAbscissa("Labels");//定义横坐标轴标签系列

         /* Create the pChart object */
         $myPicture = new pImage(350,260,$MyData);

         /* Draw a solid background */
         $Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
         $myPicture->drawFilledRectangle(0,0,350,260,$Settings);

         /* Overlay with a gradient */
         $Settings = array("StartR"=>129, "StartG"=>229, "StartB"=>255,"Alpha"=>100, "EndR"=>174, "EndG"=>238, "EndB"=>255, "Alpha"=>50);
         $myPicture->drawGradientArea(0,0,350,260,DIRECTION_VERTICAL,$Settings);
         $Setting1 = array("StartR"=>174, "StartG"=>238, "StartB"=>255, "Alpha"=>100,"EndR"=>66, "EndG"=>216, "EndB"=>255, "Alpha"=>50);
         $myPicture->drawGradientArea(0,0,350,260,DIRECTION_HORIZONTAL,$Setting1);

         $myPicture->setFontProperties(array("FontName"=>dirname(dirname(__FILE__))."/fonts/simhei.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

         /* Create the pPie object */
         $PieChart = new pPie($myPicture,$MyData);

         /* Draw an AA pie chart */
         $PieChart->draw2DRing(180,140,array("WriteValues"=>TRUE,"OuterRadius"=>11,"InnerRadius"=>1,"ValueR"=>0,"ValueG"=>0,"ValueB"=>0,"Border"=>TRUE));

         /* Write the legend box */
         $myPicture->setShadow(FALSE);
         $PieChart->drawPieLegend(45,40,array("Alpha"=>20));

         /* Render the picture (choose the best way) */
         $myPicture->render($RingName);
         return $RingName;
     }
 }

?>
