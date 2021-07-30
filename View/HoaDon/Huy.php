<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Các đơn hàng</h3>
			</div>
			<div class="panel-body">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Hủy hóa đơn <?php echo $mahd; ?></h3>
					</div>
					<div class="panel-body">
						<?php
							if($kq === true)
							{
								echo "Hủy thành công";
							}
							else
							{
								echo "Hủy không thành công, hãy xem lại trạng thái hóa đơn";
							}
						?>
					</div>
					<a href="index.php?c=KhachHang&act=DonHangDaDat&makh=<?php echo $makh; ?>" class="btn btn-primary">Quay về</a>
				</div>
			</div>
		</div>
	</div>
</div>