<div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            Danh sách sản phẩm
            <div>
            <a href="admin.php?pageAdmin=addProduct">
                <button>Thêm sản phẩm</button>
            </a>
          </div>
          </div>
          <div class="card-body">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Mô tả</th>
                  <th>Giá</th>
                  <th>Ảnh</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody id="productTable">
                <?php foreach($products as $p){ ?>
                <tr>
                  <td><?php echo $p['id_san_pham'] ?></td>
                  <td><?php echo $p['ten_san_pham'] ?></td>
                  <td><?php echo $p['mo_ta'] ?></td>
                  <td><?php echo $p['gia'] ?></td>
<<<<<<< Updated upstream
                  <td><img src="<?php echo $p['anh'] ?>" alt="ảnh sản phẩm" width="80px" ></td>
=======
                  <td><img src="<?php echo $p['anh'] ?>" alt="ảnh sản phẩm" width="80px"></td>
>>>>>>> Stashed changes
                  <td>
                    <a href="admin.php?pageAdmin=edit_form&idAdmin=<?php echo $p['id_san_pham'] ?>">
                      <button class="btn btn-sm btn-warning">Sửa</button>
                    </a>
                    
                    <a href="admin.php?pageAdmin=deleteFunction&idAdmin=<?php echo $p['id_san_pham'] ?>"><button class="btn btn-sm btn-danger">Xóa</button></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>