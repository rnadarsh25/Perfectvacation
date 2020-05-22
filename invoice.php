<?php include "includes/db.php"?>
  <?php include "includes/functions.php"?>
   <?php
    ob_start();
//        ob_end_clean();
        if(isset($_POST['invoice'])){
        
        $firstname = escape($_POST['firstname']); 
        $lastname = escape($_POST['lastname']); 
        $mobile = escape($_POST['mobile']); 
        $email = escape($_POST['email']); 
        $adults = escape($_POST['adults']);     
        $visit_place = escape($_POST['visit_place']); 
        $visit_date = escape($_POST['visit_date']);
        $agent_name = escape($_POST['agent_name']);     
        $agent_mobile = escape($_POST['agent_mobile']); 
        $agent_email = escape($_POST['agent_email']); 
        $price = escape($_POST['price']);     
        $status = escape($_POST['status']);      
            
            
        require("fpdf/fpdf.php");
        $pdf = new FPDF();
        $pdf -> AddPage();
         
        $pdf->SetFont("Arial", "B", 16);
        $pdf->Cell(0,10,"TourGuide: Booking Invoice",1,1,'C');    
        $pdf->Cell(95,10,"Name: ",1,0);
        $pdf->Cell(95,10, $firstname." ".$lastname,1,1);
            
        $pdf->Cell(95,10,"Contact: ",1,0);
        $pdf->Cell(95,10, $mobile,1,1);
            
        $pdf->Cell(95,10,"Email: ",1,0);
        $pdf->Cell(95,10, $email,1,1);
            
        $pdf->Cell(95,10,"Adults: ",1,0);
        $pdf->Cell(95,10, $adults,1,1);
            
        $pdf->Cell(95,10,"Visiting Place: ",1,0);
        $pdf->Cell(95,10, $visit_place,1,1);
            
        $pdf->Cell(95,10,"Visiting Date: ",1,0);
        $pdf->Cell(95,10, $visit_date,1,1);
            
        $pdf->Cell(95,10,"Agent Assigned: ",1,0);
        $pdf->Cell(95,10, $agent_name,1,1); 
            
        $pdf->Cell(95,10,"Agent Contact: ",1,0);
        $pdf->Cell(95,10, $agent_mobile,1,1);
            
        $pdf->Cell(95,10,"Agent Email: ",1,0);
        $pdf->Cell(95,10, $agent_email,1,1);
            
        $pdf->Cell(95,10,"Total Cost: ",1,0);
        $pdf->Cell(95,10, $price,1,1);
        
        $pdf->Cell(95,10,"Payment Status: ",1,0);
        $pdf->Cell(95,10, $status,1,1);    
            
        $pdf->Output(); 
        } 
        
    ?>