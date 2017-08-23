

<!-- Main content -->
    <section class="content">
	<?php 
	
	if($order){
				$no = 1;
				foreach($order as $order) { 
				
					$transfer = $this->m_transfer->my_list_order_buyer($order->user_id,$order->order_id); 
					echo form_open('transfer/accept_transfer');	
					 ?>
					 
				  <div class="row">
					
					<!-- left column -->
					<div class="col-md-12">
					  <!-- general form elements -->
					  <div class="small-box bg-white img-bordered-sm2">
						  
						<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
					  
						  <table class="table table-bordered table-hover">
							<tr>
							  <th>No</th>
							  <th style="width: 1000px" colspan='2'>Produk</th>
							  <th style="width: 10px" >Status</th>
							</tr>
							
								<tr>	
									<td style="width: 10px">
										<?php echo $no;?>
									</td>					
									<td style="width: 50px">
										<b><?php echo $order->buyer_name; ?></b><br><br>
										<b>Alamat :</b><br>
										<?php echo $order->address; ?><br><br>
										<b>Telp :</b><br>
										<?php echo $order->nohp; ?><br><br>
									</td>
									<td style="width: 200px">
										<b>Kd. Transaksi : </b><?php echo $order->order_id; ?><br><br>
											<?php echo form_input($qty['qid'],$order->qid)?>	
											<?php echo form_input($qty['user_id'],$order->user_id)?>	
											<?php echo form_input($qty['order_id'],$order->order_id)?>	
											<?php echo form_input($qty['store_id'],$order->store_id)?>
											<?php if(count($transfer)!=0) {
													echo form_input($qty['image1'],$order->image1);				
													echo form_input($qty['image2'],$order->image2);
												} else {
												} 
										?>			
											
										
										<table class="table table-bordered ">
											<tr>
												<td><b>No</b></td>
												<td colspan='2'><b>Nama Produk</b></td>
												<td><b>Harga</b></td>
												<td><b>Qty</b></td>
												<td><b>Jumlah</b></td>
												
											</tr>
											<?php $detail_order= $this->m_order->detail_order_process_buyer($order->order_id,$order->user_id); 
											$no2 = 1; 
											foreach ($detail_order as $detail_order){
											?>
											
											
											<tr>
												<td><?php echo $no2++;?></td>
												<td style="width: 10px"><img src="<?php echo base_url();?>upload/product/<?php echo $detail_order->image2;?>"width="40" height="40" align="center"></td>
												<td><?php echo $detail_order->name;?></td>
												<td><?php echo number_format($detail_order->price,0,",",".");?></td>
												<td><?php echo number_format($detail_order->qty_order,0,",",".");?></td>
												<td><?php echo number_format($detail_order->total,0,",",".");?></td>
											</tr>
											<?php } ?>
												<?php 
												$n = 0;
												$detail_order2= $this->m_order->detail_order_process_buyer($order->order_id,$order->user_id); 
												foreach($detail_order2 as $detail_order2){
													$n = $n + $detail_order2->total;
												}
												?>
												<?php echo form_input($qty['total'],$n)?>	
												<td colspan="5" align="center"> Jumlah Yang Di Bayar </td>
												<td style="color:green;"><b><?php echo number_format($n,0,",",".");?></b></td>
										</table>
										
									</td>
									<td><?php if(count($transfer)!=0) {
													echo "<span class='label label-success'>Uang Telah Di Transfer</span><br>";
													echo "<span class='label label-default'>Menunggu Transfer Uang</span><br><br>"; 
													echo '<a href="'.base_url().'upload/transfer/'.$order->image1.'"  target="_blank" ><img src="'.base_url().'upload/transfer/'.$order->image1.'" width="100" height="100"></a><br><br>';
													echo '<button type="submit" class="btn btn-primary btn-xs btn-flat" >Konfirmasi Transfer</button></center>';
												} else {
													echo "<span class='label label-warning'>Menunggu Transfer Uang</span><br>";
												} 
											?>
										</td>
								</tr>
						
								
								 <?php echo form_close();?>
								
							
						  </table>
						</div>
						 <!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>
					<!--/.col (left) -->
				  </div>
				  <!-- /.row -->
	  <?php $no++;
				}
		} else {				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Data Tidak Ada!</h4>
				</div>
		<?php } ?>
    </section>

    <!-- /.content -->
  <!-- /.content-wrapper -->