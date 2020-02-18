<?php require_once "header.php";?>

		<!--ขายปลีก---->
	<div class="content-grids">

	<h2 class="alert">สินค้าขายปลีก</h2>

  <hr>
	

	<div class="col-md-12 content-grid">
		<div class="row">
 <?php 
  //โค๊ดแบ่งหน้า
 $perpage = 12;
if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
            $start = ($page - 1) * $perpage;

 $sql = $conn->query("select * from product where Pro_SaleType = '0' order by Pro_ID desc limit $start,$perpage");

 $sql2 = $conn->query("select * from product where Pro_SaleType = '0' order by Pro_ID desc");
$total_record = $sql2->num_rows;
$total_page = ceil($total_record / $perpage);

       while ($show = $sql->fetch_assoc()){
              ?>

  
  <div class="col-sm-6 col-md-4 grid-product-in">
    <div class="thumbnail">
      <a href="view_product.php?id=<?php echo $show['Pro_ID'];?>" class="lot"><img class="img-responsive " width="140px" height="140px" src="images/product/<?php echo $show['Pro_Img'];?>" alt=""></a>
      <div class="caption">
        <h3><a href="view_product.php?id=<?php echo $show['Pro_ID'];?>"><?php echo iconv_substr($show['Pro_Name'],0,20,'UTF-8').'...';?></a></h3>
                <label  class="add-to">
                <?php echo number_format($show['Pro_Price'],0);?> บาท
            </label>
            จำนวนสั่งซื้อ: <?php echo $show['Pro_Buy'];?>
            <?php 
            $value = $show['Pro_ID'];
            $url = "window.location=?data=cart&pro_id=$value";
            $amount = $show['Pro_Amount'];
            
            $btnDanger = "btn btn-danger";
            $btnSuccess = "btn btn-success";
            $console = "<script>console.log('TEST')</script>";

           
            if($amount == 0){
              echo "<p><a><input name='' type='button' class='$btnDanger' value='สินค้าหมด'></a></p>";
            }else{
              echo "<p><a href='?data=cart&pro_id=$value'><input name='' type='button' class='$btnSuccess' value='เพิ่มสินค้า'></a></p>";
            }
            ?>
      </div>
    </div>
  </div>
	
	<?php }?>

  </div>
  
		</div>

		<div class="clearfix"> </div>

		<div align="center"><?php if($sql->num_rows==0){Chk_Row($sql);}else {?><nav>
 <ul class="pagination">
 <li>
 <a href="?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> </a> </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span> </a> </li>
 </ul>
 </nav><?php } ?></div>

	</div>

	<div class="clearfix"> </div>
	</div>
	<!--ขายปลีก-->

<?php require_once "footer.php";?>

</body>
</html>