
<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ExportExcel extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('login_model');
        $this->load->model('subscribe_model');
        
    }    
 
    // public function index() {
    //     $data['export_list'] = $this->login_model->get_sub();
     
    // }
    // create xlsx
    public function generateXls() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->login_model->get_sub();
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Month');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Total number of subscriptions per month');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Total value of subscriptions per month');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Total number of leads per month');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Payment Gateway');
        $objPHPExcel->getActiveSheet()->getStyle("A1:E1")->getFont()->setBold(true);
        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
       
        $objPHPExcel->getActiveSheet()->getStyle("A1:E1")->applyFromArray($style);
        // set Row
        $rowCount = 2;
        $total_monthly_count = 0;
        $total_amount_count = 0;
        $total_lead_count = 0;
        for ($i = 0 ; $i<count($listInfo); $i++) {
            $total_monthly_count = $total_monthly_count + $listInfo[$i][1]->MonthlyCount;
            $total_amount_count = $total_amount_count + $listInfo[$i][2]->Amount ;
            $total_lead_count =  $total_lead_count + $listInfo[$i][3]->MonthlyCountlead;
            $B = $listInfo[$i][1]->MonthlyCount ? $listInfo[$i][1]->MonthlyCount : "-";
            $C = $listInfo[$i][2]->Amount ? $listInfo[$i][2]->Amount : "-";
            $D = $listInfo[$i][3]->MonthlyCountlead ? $listInfo[$i][3]->MonthlyCountlead : "-";
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $listInfo[$i][0]);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $B);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $C);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $D);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "PAYTM");
            $rowCount++;
           
        }  
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, "TOTAL");
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount,$total_monthly_count);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount,$total_amount_count);
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $total_lead_count);
      $objPHPExcel->getActiveSheet()->getStyle("A$rowCount:D$rowCount")->getFont()->setBold(true);
       
        foreach(range('A','E') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $filename = "subscribe". date("Y-m-d-H-i-s").".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
        ob_end_clean();
        $objWriter->save('php://output'); 
 
    }
     
}
?>