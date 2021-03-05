 <!-- Templat aufrufen -->
 <?php INCLUDE_ONCE("tpl/header.php") ?>

 <body>
     <?php INCLUDE_ONCE("tpl/nav.php") ?>
     <!-- HTML Tabelle -->
     <table id="customers">
         <thead>
             <tr>
                 <th>id</th>
                 <th>Artikelnummer</th>
                 <th>Match</th>
                 <th>Name</th>
                 <th>VPE</th>
             </tr>
         </thead>
         <tbody>
             <!-- 
###############################################################
##### Daten Aus der Datenbank in einer Tabelle anzeigen   #####
###############################################################
-->
             <?php 
    INCLUDE_ONCE("pagination.php");
    //echo var_dump($xml);
    $sql = "SELECT * FROM tb_artikel";
    while($row = mysqli_fetch_assoc($result)) {
    ?>
             <tr>
                 <div>
                     <?php
                    echo "<td>" .$row['id'] ."</td>";
                    echo "<td>" .$row['artikelnummer'] ."</td>";
                    echo "<td>" .$row['mengeneinheit'] ."</td>";
                    echo "<td>" .$row['artikelbezeichnung'] ."</td>";
                    echo "<td>" .$row['vpe'] ."</td>";
                  }
            ?>
                 </div>
             </tr>
         </tbody>
     </table>
     <br>
     <?php
     $pr_query = "select * from tb_artikel";
     $pr_result = mysqli_query($con,$pr_query);
     $total_record = mysqli_num_rows($pr_result );
     
     $total_page = ceil($total_record/$num_per_page);
    // letzte Seite
     if($page>1){
        echo "<a href='?page=".($page-1)."' class='btn-btn-danger'>Previous</a>'"; 
     }
    // Anzehl der Seiten 
     for($x=1; $x<$total_page;$x++){
         echo "<a href='?page=".$x."' class='btn btn-primary'>$x</a>'";
     }
    // nächste Seite
     if($x>$page){
        echo "<a href='?page=".($page+1)."' class='btn-btn-danger'>Next</a>'"; 
     }
     ?>
     <?php INCLUDE_ONCE("tpl/footer.php") ?>
 </body>
 </html>