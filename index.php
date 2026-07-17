<?php
require 'data.php';

// Map category_id -> tên danh mục
$categoryMap = [];

foreach ($categories as $category) {
    $categoryMap[$category['id']] = $category['name'];
}

$totalInventory = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>MiniShop - Catalog (Buoi 1)</title>

    <style>
        body{
            font-family: Arial;
            margin:40px;
        }

        table{
            border-collapse: collapse;
            width:100%;
        }

        table,th,td{
            border:1px solid #000;
        }

        th,td{
            padding:10px;
            text-align:center;
        }

        h2{
            margin-bottom:20px;
        }
    </style>

</head>
<body>

<h2>MiniShop - Catalog (Buoi 1)</h2>

<table>

    <tr>
        <th>SKU</th>
        <th>Tên</th>
        <th>Danh mục</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>

<?php foreach($products as $product): ?>

<?php
    $lineTotal = $product['price'] * $product['qty'];
    $totalInventory += $lineTotal;
?>

<tr>

<td><?= htmlspecialchars($product['sku']) ?></td>

<td><?= htmlspecialchars($product['name']) ?></td>

<td><?= htmlspecialchars($categoryMap[$product['category_id']]) ?></td>

<td><?= number_format($product['price']) ?></td>

<td><?= $product['qty'] ?></td>

<td><?= number_format($lineTotal) ?></td>

</tr>

<?php endforeach; ?>

</table>

<h3>Tổng giá trị kho = <?= number_format($totalInventory) ?></h3>

<h3>Số sản phẩm = <?= count($products) ?></h3>

<pre>
<?php
var_dump($products);
?>
</pre>

<!-- MS_EXPECT product_count=8 inventory_value=41380000 -->

</body>
</html>