

<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .detail-header h1 {
        margin: 0;
    }

    .btn-print {
        background: #2f5ce0;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-print:hover {
        background: #244bc0;
    }

    .detail-card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .detail-info {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }

    .detail-info-item small {
        display: block;
        color: #777;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .detail-info-item strong {
        font-size: 14px;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    .product-table th,
    .product-table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    .product-table th {
        background: #f5f7fb;
        font-size: 13px;
    }

    .product-table td {
        font-size: 14px;
    }

    .product-table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .total-row {
        text-align: right;
        font-size: 17px;
        font-weight: 700;
        margin-top: 20px;
    }

    /* STRUK */
    .print-receipt {
        display: none;
    }

    @media print {

        body * {
            visibility: hidden;
        }

        .print-receipt,
        .print-receipt * {
            visibility: visible;
        }

        .print-receipt {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 280px;
            padding: 10px;
            background: white;
            color: #000;
            font-family: Arial, sans-serif;
        }

        .print-receipt h2 {
            text-align: center;
            font-size: 18px;
            margin: 0 0 5px;
        }

        .store-info {
            text-align: center;
            font-size: 11px;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }

        .receipt-info {
            font-size: 11px;
            line-height: 1.6;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 3px 0;
        }

        .receipt-table .right {
            text-align: right;
        }

        .receipt-total {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            font-weight: bold;
        }

        .receipt-footer {
            text-align: center;
            font-size: 10px;
            margin-top: 15px;
        }

        @page {
            size: 80mm auto;
            margin: 5mm;
        }
    }

    @media (max-width: 768px) {
        .detail-info {
            grid-template-columns: 1fr;
        }

        .detail-header {
            gap: 10px;
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>


<div class="detail-container">

    
    <div class="detail-header">

        <h1>Detail Penjualan</h1>

        <button type="button"
                class="btn-print"
                onclick="window.print()">
            🧾 Cetak Struk
        </button>

    </div>


    
    <div class="detail-card">

        <div class="detail-info">

            <div class="detail-info-item">
                <small>Kasir</small>
                <strong>
                    <?php echo e($sale->user->name); ?>

                </strong>
            </div>

            <div class="detail-info-item">
                <small>Tanggal Transaksi</small>
                <strong>
                    <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?>

                </strong>
            </div>

            <div class="detail-info-item">
                <small>Total Pembayaran</small>
                <strong>
                    Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                </strong>
            </div>

        </div>

    </div>


    
    <div class="detail-card">

        <table class="product-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $i = 1;
                ?>

                <?php $__currentLoopData = $sale->itempenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td>
                            <?php echo e($i++); ?>

                        </td>

                        <td>
                            <img
                                src="<?php echo e(asset('storage/' . $item->produk->foto)); ?>"
                                alt="<?php echo e($item->produk->nama); ?>"
                            >
                        </td>

                        <td>
                            <?php echo e($item->produk->nama); ?>

                        </td>

                        <td>
                            Rp <?php echo e(number_format($item->produk->harga_jual, 0, ',', '.')); ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

        <div class="total-row">
            Total:
            Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

        </div>

    </div>

</div>




<div class="print-receipt">

    <h2>POS HANA</h2>

    <div class="store-info">
        Point of Sale System
    </div>

    <div class="line"></div>

    <div class="receipt-info">

        <div>
            Tanggal :
            <?php echo e($sale->created_at->format('d-m-Y H:i:s')); ?>

        </div>

        <div>
            Kasir :
            <?php echo e($sale->user->name); ?>

        </div>

    </div>

    <div class="line"></div>

    <table class="receipt-table">

        <thead>
            <tr>
                <th>Produk</th>
                <th class="right">Harga</th>
            </tr>
        </thead>

        <tbody>

            <?php $__currentLoopData = $sale->itempenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td>
                        <?php echo e($item->produk->nama); ?>

                    </td>

                    <td class="right">
                        Rp <?php echo e(number_format($item->produk->harga_jual, 0, ',', '.')); ?>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

    <div class="line"></div>

    <div class="receipt-total">

        <span>TOTAL</span>

        <span>
            Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

        </span>

    </div>

    <div class="line"></div>

    <div class="receipt-footer">
        Terima kasih telah berbelanja
        <br>
        POS Hana
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos9\resources\views/penjualan/detail.blade.php ENDPATH**/ ?>