<div class="container-fluid">
    <div class="row">
        <main class="col-12 p-4">

            <!-- Page Title -->
            <div class="mb-4">
                <h3 class="fw-bold">Quản lý danh mục</h3>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📂 Danh sách danh mục</h5>

                    <a href="admin.php?pageAdmin=addcateProductsF" class="btn btn-light btn-sm">
                        ➕ Thêm danh mục
                    </a>
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
                  <?php foreach ($categories as $category): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($category['id_danh_muc']); ?></td>
                    <td><?php echo htmlspecialchars($category['ten_danh_muc']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($category['anh_dai_dien']); ?>" alt="ảnh danh mục" width="80px"></td>
                    <td>
                      <a href="admin.php?pageAdmin=editCateProducts&id_dm=<?php echo $category['id_danh_muc']; ?>">
                        <button class="btn btn-sm btn-warning">Sửa</button>
                      </a>
                      <a href="admin.php?pageAdmin=deleteCategory&id_dm=<?php echo $category['id_danh_muc']; ?>">
                        <button class="btn btn-sm btn-danger">Xóa</button>
                      </a>
                    </td>
                    <?php endforeach; ?>
                  </tr>
              </tbody>
            </table>
            </div>

        </main>
    </div>
</div>
