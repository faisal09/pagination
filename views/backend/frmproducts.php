	<h3 class="tit"><?=$title;?></h3>
	<?php
	   $mode=$this->uri->segment(4);
	   if($mode=='insert'):
	   		$id ='';
	   		$nm_prod = '';
	   		$desk = '';
			$u_pri='';
			$uis='';
			$uoo='';
	   else :	   		
	   		$id = $products->ProductID;
	   		$nm_prod = $products->ProductName;
	   		$desk = $products->QuantityPerUnit;
	   		$u_pri = $products->UnitPrice;
	   		$uis = $products->UnitsInStock;
	   		$uoo = $products->UnitsOnOrder;
			
	   endif;		

	?>
			<!-- Table (TABLE) -->
			<br /><br />
			
      <form id="commentForm" name="commentForm"  method="post" action="<?=site_url('backend/products/process/'.$mode.'/'.$id);?>">
      		<input type="hidden" name='id' value="<?=$id;?>">
      		<input type="hidden" name='mode' value="<?=$mode;?>">
			<fieldset>				
				<table class="nostyle">
					<tr>
						<td style="width:100px;">Product Name:</td>
						<td><input type="text" value="<?=$nm_prod;?>" size="40" name="ProductName" class="input-text" required="required" /></td>
					</tr>					
					<tr>
						<td class="va-top">QuantityPerUnit:</td>
						<td><input type="text" value="<?=$desk;?>" size="40" name="QuantityPerUnit" class="input-text" required="required" /></td>
					</tr>
					<tr>
						<td style="width:100px;">Unit Price:</td>
						<td><input type="text" value="<?=$u_pri;?>" size="40" name="UnitPrice" class="input-text" required="required" /></td>
					</tr>
					<tr>
						<td style="width:100px;">Units In Stock:</td>
						<td><input type="text" value="<?=$uis;?>" size="40" name="UnitsInStock" class="input-text" required="required" /></td>
					</tr>
					<tr>
						<td style="width:100px;">Units On Order:</td>
						<td><input type="text" value="<?=$uoo;?>" size="40" name="UnitsOnOrder" class="input-text" required="required" /></td>
					</tr>					
					<tr>
						<td colspan="2" class="t-right">
							<input type="submit" name="btnSimpan"  class="input-submit" value="Submit" /></td>
					</tr>
				</table>
			</fieldset>
      </form>

		