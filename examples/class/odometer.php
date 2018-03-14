<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_odo.php');

class OdometerChart
{

    function __construct($DATA)
    {
        $this->needledata = $DATA;
    }
    public function odotutexImg()
    {
        $OdotutexName ="pictures/odotutex.png";
        $add_data1 =25;
        $add_data2 =50;
        $add_data3 =75;
        $set_needle_data = $this->needledata;

        $graph = new OdoGraph(500*2,400*2);
        $graph->img->SetAntiAliasing(true);//设置抗锯齿

        $graph ->SetColor("white");
        $graph->SetFrame(false,'',0);
        $odo = new Odometer();

        $odo->AddIndication(0,$add_data1,"1");
        $odo->AddIndication($add_data1,$add_data2,"2");
        $odo->AddIndication($add_data2,$add_data3,"3");
        $odo->AddIndication($add_data3,100,"4");
        $odo->SetBase(true,0.1,"4","1","white");
        $odo->SetColor("white");
        $odo->SetBorder('white',1);
        $odo->SetCenterAreaWidth(0.5);  // Fraction of radius

        $odo->scale->SetTicks(-1,10);

        $odo->label->Set($set_needle_data);
        $odo->label->SetFont(FF_ARIAL,FS_BOLD,12*6);
        $odo->label->SetVPos(1.1);
        //设置指针样式
        $odo->needle->Set($set_needle_data);
        $odo->needle->SetColor('white');
        $odo->needle->SetLineWeight(2);
        $odo->needle->SetStyle(NEEDLE_STYLE_LARGE_TRIANGLE);
        $odo->needle->SetLength(1.1);
        $odo->needle->SetFillColor("3");

        //---------------------------------------------------------------------
        // Add the odometer to the graph
        //---------------------------------------------------------------------
        $odo->SetPos(123*4,160*4);
        $graph->Add($odo);

        $t = new Text('POOR',34*4,165*4);
        $t->SetAlign('center','top');
        $t->SetFont(FF_ARIAL,FS_BOLD,12*4);
        #$t->SetFont(FF_VERA,FS_BOLD,11);
        $t->SetColor('1');
        $graph->Add($t);

        $t = new Text('GOOD',215*4,165*4);
        $t->SetAlign('center','top');
        $t->SetFont(FF_ARIAL,FS_BOLD,12*4);
        #$t->SetFont(FF_VERA,FS_BOLD,11);
        $t->SetColor('4');
        $graph->Add($t);

        // ... and finally stroke and stream the image back to the browser
        @unlink($OdotutexName);
        $graph->Stroke($OdotutexName);
        return $OdotutexName;
    }
}


// EOF
?>
