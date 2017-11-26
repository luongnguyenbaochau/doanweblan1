
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm gần đây</h3>
    		</div>
    		<div class="see">
    			
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
           <?php
      $sql="SELECT sanpham.tensanpham, sanpham.giakhuyenmai,sanpham.masanpham,
hinh.tenhinh, hinh.hientrang FROM sanpham
INNER JOIN hinh ON hinh.masanpham = sanpham.masanpham where hientrang=1 ";
      $datasp = $db->exeQuery($sql);             
          ?> 
          <?php
              
                 foreach($datasp as $k=>$r)
                  { 
                    ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="index.php?menu=sanpham&act=chitiet&masanpham=<?php echo $r['masanpham'] ?>"><img src="img/<?php echo $r["tenhinh"];?>" alt="" /></a>
					 <h2><?php echo $r["tensanpham"];?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?php echo number_format ($r["giakhuyenmai"],0,'.','.'); ?><sup>đ</sup></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="#">Thêm vào giỏ hàng</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					
				</div>
                
                <?php
				
				  }
				  ?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm bán chạy</h3>
    		</div>
    		<div class="see">
    			
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
           <?php
      $sql="SELECT sanpham.tensanpham, sanpham.giagoc,sanpham.giakhuyenmai,
hinh.tenhinh, hinh.hientrang FROM sanpham
INNER JOIN hinh ON hinh.masanpham = sanpham.masanpham where hientrang=2 ";
      $datasp = $db->exeQuery($sql);             
          ?> 
          <?php
              
                 foreach($datasp as $k=>$r)
                  { 
                    ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="#"><img src="img/<?php echo $r["tenhinh"];?>" alt="" /></a>
					 <h2><?php echo $r["tensanpham"];?></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?php echo number_format ($r["giakhuyenmai"],0,'.','.'); ?><sup>đ</sup></span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="#">Thêm vào giỏ hàng</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					
				</div>
                
                <?php
				
				  }
				  ?>
				
			</div>
    