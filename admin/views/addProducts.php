<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">

  <div class="container">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 600px; margin: auto;">
      <h3 class="text-center mb-4 fw-bold text-primary">Thêm sản phẩm</h3>

      <form method="post" enctype="multipart/form-data" action="admin.php?pageAdmin=addNewProduct">
        <div class="mb-3">
          <label class="form-label">Tên sản phẩm</label>
          <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" required name="ten">
        </div>

        <div class="mb-3">
          <label class="form-label">Mô tả</label>
          <input type="text" class="form-control" placeholder="Nhập mô tả" required name="mo_ta">
        </div>

        <div class="mb-3">
          <label class="form-label">Giá</label>
          <input type="number" class="form-control" placeholder="Nhập giá" required name="gia">
        </div>

        <div class="mb-3">
          <label class="form-label">Ảnh sản phẩm</label>
          <input type="file" class="form-control" accept="image/*" name="anh">
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Thêm sản phẩm</button>
      </form>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
