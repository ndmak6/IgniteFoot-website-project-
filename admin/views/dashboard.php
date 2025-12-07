  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-md-2 bg-light border-end min-vh-100 p-3">
        <h5 class="text-secondary">Menu</h5>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active text-primary fw-bold" href="#">📊 Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">📦 Quản lý sản phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="#">👥 Quản lý user</a></li>
          <li class="nav-item"><a class="nav-link" href="#">📑 Báo cáo</a></li>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-md-10 p-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <h3 class="card-title">Chào mừng đến Admin Panel</h3>
            <p class="text-muted">Giao diện quản trị hiện đại với Bootstrap 5.</p>
          </div>
          <div>
            <a href="admin.php?pageAdmin=addProduct">
                <button>Thêm sản phẩm</button>
            </a>
          </div>
        </div>

        <!-- Example Table -->
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            Danh sách sản phẩm
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
                  <td><?php echo $p['anh'] ?></td>
                  <td>
                    <button class="btn btn-sm btn-warning">Sửa</button>
                    <button class="btn btn-sm btn-danger">Xóa</button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

    <!-- Bootstrap JS + Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>