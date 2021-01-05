<?php //include("header.php");?>
<?php $this->loadLayout("role/layout/header"); ?>

<?php  //echo BASE_URL;?>
 <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   -->
 <script src="<?php echo BASE_URL; ?>static/js/jquery-1.11.1.min.js"></script>  
<!-- jQuery -->
 
            <?php 
            if($page_view != 'login'){
        					echo "<br>";
        				}else{
        					echo "<br><br><br>";
                        }
                        
                        ?>
            <?php
			 
        				$xcrud->connection(DB_USERNAME,DB_PASSWORD,DB_NAME,DB_HOST);
        				$xcrud->language('th');
        				if($page_view != 'setting' && $page_view != 'committee' && $page_view !='productsetting'){
        					$xcrud->hide_button('save_new,save_edit');
        				}
        				if($page_view != 'order'){
        					?>
       
            <?php
        				}
        				$xcrud->set_lang('save_return','บันทึก');
        				$xcrud->set_lang('return','ย้อนกลับ');
        				$this->loadLayout('cope/page/'.$page_view);
        				?>
     
















<?php $this->loadLayout("role/layout/footer"); ?>

<?php //include("footer.php");?>