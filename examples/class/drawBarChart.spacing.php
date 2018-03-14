<?php

class BarChart
{

    public function __construct($DATA1,$DATA2,$DATA3)
    {
        $this->data1 = $DATA1;
        $this->data2 = $DATA2;
        $this->data3 = $DATA3;
    }
    public function barchartImg()
    {
        $BarchartName = "pictures/barchart.png";

        $MyData = new pData();
        $MyData->addPoints($this->data1,"电子产品");
        $MyData->addPoints($this->data2,"生活用品");
        //$MyData->setAxisName(0,"不知道");
        $MyData->addPoints($this->data3,"Months");
        //$MyData->setSerieDescription("Months","Month");
        $MyData->setAbscissa("Months");//标记横坐标的名称

        $myPicture = new pImage(840,230,$MyData);

        $myPicture->drawGradientArea(0,0,840,230,DIRECTION_VERTICAL,array("StartR"=>113,"StartG"=>253,"StartB"=>169,"EndR"=>128,"EndG"=>225,"EndB"=>250,"Alpha"=>100));
        $myPicture->drawGradientArea(0,0,840,230,DIRECTION_HORIZONTAL,array("StartR"=>128,"StartG"=>225,"StartB"=>250,"EndR"=>113,"EndG"=>253,"EndB"=>169,"Alpha"=>20));

        $myPicture->setGraphArea(60,40,650,200);

        $myPicture->setFontProperties(array("FontName"=>dirname(dirname(__FILE__))."/fonts/simhei.ttf","FontSize"=>11,"R"=>0,"G"=>0,"B"=>0));
        $scaleSettings = array("AxisR"=>0,"AxisG"=>0,"AxisB"=>0,"GridR"=>0,"GridG"=>0,"GridB"=>0,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE,"Mode"=>SCALE_MODE_START0);
        $myPicture->drawScale($scaleSettings);

         $myPicture->setFontProperties(array("FontName"=>dirname(dirname(__FILE__))."/fonts/simhei.ttf","FontSize"=>10));
        $myPicture->drawLegend(715,100,array("Style"=>LEGEND_ROUND,"Mode"=>LEGEND_VERTICAL,"BoxWidth"=>40,"Family"=>LEGEND_FAMILY_BOX,"R"=>113,"G"=>232,"B"=>253));

        $myPicture->setFontProperties(array("FontName"=>dirname(dirname(__FILE__))."/fonts/pf_arma_five.ttf","FontSize"=>8));
        $settings = array("Surrounding"=>0,"InnerSurrounding"=>0,"Interleave"=>2,"DisplayValues"=>TRUE);
        $myPicture->drawBarChart($settings);

        $myPicture->render($BarchartName);
        return $BarchartName;
    }
}


?>
