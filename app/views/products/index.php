<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewora Coffee Shop - Menu</title>

    <!-- ================================
         COFFEE DASHBOARD CSS
    ================================= -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #3e2723;
            background: #f8f3ef;
        }

        /* NAVBAR */
        .navbar {
            min-height: 75px;
            padding: 15px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            background: #3e2723;
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #8d6e63;

            font-weight: bold;
        }

        .brand-name {
            font-size: 21px;
            font-weight: bold;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .username {
            color: #efebe9;
        }

        .logout {
            padding: 9px 15px;
            border-radius: 8px;

            background: #795548;
            color: white;

            text-decoration: none;
            font-weight: bold;
        }

        .logout:hover {
            background: #6d4c41;
        }

        /* MAIN */
        .container {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .welcome h1 {
            margin-bottom: 8px;
            color: #3e2723;
        }

        .welcome p {
            margin-top: 0;
            color: #795548;
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 30px 0;
        }

        .stat-card {
            padding: 23px;

            background: #fffaf5;
            border: 1px solid #e0d4cd;
            border-radius: 15px;

            box-shadow: 0 8px 20px rgba(62, 39, 35, 0.08);
        }

        .stat-card h3 {
            margin: 0 0 10px;
            color: #795548;
            font-size: 14px;
        }

        .stat-card strong {
            font-size: 27px;
            color: #6f4e37;
        }

        /* MENU CARD */
        .menu-card {
            background: #fffaf5;
            border: 1px solid #e0d4cd;
            border-radius: 18px;
            overflow: hidden;

            box-shadow: 0 10px 25px rgba(62, 39, 35, 0.08);
        }

        .menu-header {
            padding: 22px 25px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            background: #efebe9;
        }

        .menu-header h2 {
            margin: 0 0 5px;
        }

        .menu-header p {
            margin: 0;
            color: #795548;
        }

        /* ADD COFFEE BUTTON */
        .add-button {
            padding: 11px 17px;

            background: #6f4e37;
            color: white;

            border-radius: 9px;

            text-decoration: none;
            font-weight: bold;
        }

        .add-button:hover {
            background: #5d4037;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        .coffee-table {
            width: 100%;
            border-collapse: collapse;
        }

        .coffee-table th {
            padding: 15px;
            text-align: left;

            background: #f5eee9;
            color: #5d4037;
        }

        .coffee-table td {
            padding: 15px;
            border-top: 1px solid #eee3dd;
        }

        .coffee-table tbody tr:hover {
            background: #faf6f2;
        }

        .coffee-name {
            font-weight: bold;
            color: #4e342e;
        }

        .price {
            color: #6f4e37;
            font-weight: bold;
        }

        .quantity {
            font-weight: bold;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 7px;
        }

        .btn {
            padding: 8px 13px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .edit {
            background: #d7ccc8;
            color: #4e342e;
        }

        .delete {
            background: #ffdddd;
            color: #b71c1c;
        }

        /* EMPTY */
        .empty {
            padding: 50px;
            text-align: center;
            color: #795548;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .username {
                display: none;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .menu-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .coffee-table {
                min-width: 850px;
            }
        }
    </style>
</head>

<body>

    <!-- ================================
         BREWORA NAVBAR
    ================================= -->

    <nav class="navbar">

        <div class="brand">

            <div class="brand-logo">
                B
            </div>

            <div class="brand-name">
                Brewora Coffee Shop
            </div>

        </div>

        <div class="user-area">

            <?php if (isset($_SESSION['username'])): ?>

                <span class="username">
                    Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
                </span>

            <?php endif; ?>

            <a href="/logout" class="logout">
                Logout
            </a>

        </div>

    </nav>


    <!-- ================================
         MAIN CONTENT
    ================================= -->

    <main class="container">

        <div class="welcome">

            <h1>
                Coffee Menu
            </h1>

            <p>
                Manage Brewora's coffee products and available stock.
            </p>

        </div>


        <!-- ================================
             COFFEE STATISTICS
        ================================= -->

        <?php

        $totalProducts = 0;
        $totalQuantity = 0;
        $totalValue = 0;

        if (!empty($products)) {

            $totalProducts = count($products);

            foreach ($products as $product) {

                $totalQuantity += (int) $product['quantity'];

                $totalValue +=
                    (float) $product['price'] *
                    (int) $product['quantity'];
            }
        }

        ?>

        <div class="stats">

            <div class="stat-card">
                <h3>Total Coffee Items</h3>

                <strong>
                    <?= $totalProducts ?>
                </strong>
            </div>

            <div class="stat-card">
                <h3>Total Available Stock</h3>

                <strong>
                    <?= $totalQuantity ?>
                </strong>
            </div>

            <div class="stat-card">
                <h3>Total Inventory Value</h3>

                <strong>
                    ₱<?= number_format($totalValue, 2) ?>
                </strong>
            </div>

        </div>


        <!-- ================================
             COFFEE MENU TABLE
        ================================= -->

        <div class="menu-card">

            <div class="menu-header">

                <div>

                    <h2>
                        Brewora Coffee Menu
                    </h2>

                    <p>
                        View and manage all coffee products.
                    </p>

                </div>

                <a
                    href="/products/create"
                    class="add-button"
                >
                    + Add Coffee
                </a>

            </div>


            <div class="table-wrapper">

                <table class="coffee-table">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Coffee Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($products)): ?>

                        <?php foreach ($products as $product): ?>

                            <tr>

                                <td>
                                    #<?= htmlspecialchars($product['id']) ?>
                                </td>

                                <td class="coffee-name">
                                    <?= htmlspecialchars($product['product_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($product['description']) ?>
                                </td>

                                <td class="price">
                                    ₱<?= number_format((float) $product['price'], 2) ?>
                                </td>

                                <td class="quantity">
                                    <?= htmlspecialchars($product['quantity']) ?>
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="/products/edit/<?= $product['id'] ?>"
                                            class="btn edit"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="/products/delete/<?= $product['id'] ?>"
                                            class="btn delete"
                                            onclick="return confirm('Are you sure you want to delete this coffee?')"
                                        >
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="empty">

                                <strong>
                                    No coffee items yet.
                                </strong>

                                <p>
                                    Add your first coffee to the Brewora menu.
                                </p>

                                <a
                                    href="/products/create"
                                    class="add-button"
                                >
                                    + Add Coffee
                                </a>

                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</body>
</html>
