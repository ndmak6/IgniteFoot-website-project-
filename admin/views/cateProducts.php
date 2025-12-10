<div class="container-fluid">
    <div class="row">

      <!-- Main Content -->
      <main class="col-md-10 p-4">

        <!-- Card title -->
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <h3 class="card-title">Quản lý danh mục</h3>
          </div>

          <div class="px-3 pb-3">
            <a href="admin.php?pageAdmin=addcateProductsF">
                <button class="btn btn-primary">Thêm danh mục</button>
            </a>
          </div>
        </div>

        <!-- Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary-subtle">
                <strong>Danh sách danh mục</strong>
            </div>


          <div class="card-body">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Tên danh mục</th>
                  <th>Ảnh</th>
                  <th>Hành động</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                    <?php foreach ($categories as $category): ?>
                        <td><?php echo htmlspecialchars($category['id_danh_muc']); ?></td>
                        <td><?php echo htmlspecialchars($category['ten_danh_muc']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($category['anh_dai_dien']); ?>" alt="ảnh danh mục" width="80px"></td>
                        <td>
                            <button class="btn btn-sm btn-warning">Sửa</button>
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </td>
                    <?php endforeach; ?>
                </tr>
              </tbody>

            </table>
          </div>
        </div>

      </main>
    </div>
</div>
