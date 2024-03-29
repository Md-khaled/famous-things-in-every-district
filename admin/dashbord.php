﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>        
        
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item w-100">
                <div class="row gap-20">
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Users</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                    <div class="peer">
                                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">
                                     <?php 
                                     $sql = "SELECT * FROM users";
                                     $user = $db->select($sql);
                                      $countUser = $user->num_rows;
                                      echo($countUser);
                                      ?>
                                      
                                    </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Product</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                    <div class="peer">
                                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">
                                       <?php 
                                     $sql = "SELECT * FROM product";
                                     $Product= $db->select($sql);
                                      $countProduct = $Product->num_rows;
                                      echo($countProduct);
                                      ?>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Delivery product</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                    <div class="peer">
                                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">
                                      <?php 
                                     $sql = "SELECT * FROM  cus_order where status='1'";
                                     $delivery= $db->select($sql);
                                      $countDelivery = $delivery->num_rows;
                                      $sql = "SELECT * FROM  cus_order where status='2'";
                                     $completedelivery= $db->select($sql);
                                     $countComDelivery=0;
                                     if ($completedelivery) {
                                       $countComDelivery = $completedelivery->num_rows;
                                     }
                                      
                                      echo($countComDelivery.' of  '.$countDelivery);
                                      ?>
                                    </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Sales amount</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                    <div class="peer">
                                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                       <?php 
                                     $sql = "SELECT *,SUM(amount) as revenue FROM  cus_order";
                                     $revenue= $db->select($sql)->fetch_assoc();
                                      echo(round($revenue['revenue']));
                                      ?>
                                    </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $getsalsstatic=$report->getAllVisitor();
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
 <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>';
                          $ss="";
                          $dd=0;
                          while($row = $getsalsstatic->fetch_assoc())  
                          {  
                            $ss=$row["city"];
                            $dd=$row["number"];
                               echo "['name :".$ss."',". $dd."],"; 
                             // echo("$ss."".$dd"); 
                              // echo('<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>$row['number']</b></div>');
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of visitors',  
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
            <div class="masonry-item col-12">
                <div class="bd bgc-white">
                    <div class="peers fxw-nw@lg+ ai-s">
                        <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                            <div class="layers">
                                <div class="layer w-100 mB-10">
                                    <h6 class="lh-1">Site Visits</h6>
                                </div>
                                <div class="layer w-100">
                                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?>           