<div class="clear">
</div>
</div>
<div class="clear">
</div>
<div id="site_info">

 <?php
        $query="select * from footer where id=1";
        $socialinfo=$db->select($query);
        while($result=mysqli_fetch_array($socialinfo)){           
	  ?> 
		 
	  <p> <?php echo $result['note'];?> <?php echo date('Y');?></p>


 <?php }?>
    

</div>
</body>

</html>