<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách bình luận</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Mã bình luận</th><th>Mã sách</th><th>Nội dung</th><th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($result as $row) {
							$item = <<< EOD
								<tr>
									<td>{$row['ID']}</td>
									<td>{$row['MASACH']}</td>
									<td>{$row['CONTENT']}</td>
									<td>
										<a href="admin.php?c=BinhLuan&act=Xoa&id={$row['ID']}" class="btn btn-danger">Xóa</a>
									</td>
								</tr>
EOD;
							echo $item;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>