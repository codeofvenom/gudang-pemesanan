					<?php 
                error_reporting(0);
                $b = $brg->row_array();
                ?>
					<table>
						<tr>
		                    <th style="width:200px;"></th>
							<th>Stok</th>
		                    <th>Satuan</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td style="width:200px;"></th>
							<td><input type="text" name="xstock" value="<?php echo $b['jumlah_stock']; ?>" style="width:70px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="xsatuan" value="<?php echo $b['satuan']; ?>" style="width:120px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="number" name="xqty" id="xqty" value="1" min="1" max="<?php echo $b['jumlah_stock']; ?>" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
