

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Produk</h2>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">+ Tambah Produk</a>
    </div>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <form method="GET" class="mb-3 d-flex" action="<?php echo e(route('products.index')); ?>">
        <input type="text" name="q" class="form-control me-2" placeholder="Cari produk..." value="<?php echo e(request('q')); ?>">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </form>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->product_id); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td>Rp <?php echo e(number_format($product->price,0,',','.')); ?></td>
                            <td><?php echo e($product->category->name ?? '-'); ?></td>
                            <td>
                                <a href="<?php echo e(route('products.edit', $product->product_id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('products.destroy', $product->product_id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Aplikasi\laragon\laragon\www\gudang-app\resources\views/products/index.blade.php ENDPATH**/ ?>