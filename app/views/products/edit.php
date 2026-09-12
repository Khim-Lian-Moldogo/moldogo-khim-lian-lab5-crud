<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewora Coffee Shop - Edit Coffee</title>

    <!-- ================================
         EDIT COFFEE CSS
    ================================= -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f3ef;
            color: #3e2723;
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
            justify-content: center;
            align-items: center;

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

        .logout {
            padding: 9px 15px;
            border-radius: 8px;

            background: #795548;
            color: white;

            text-decoration: none;
            font-weight: bold;
        }

        /* FORM CONTAINER */
        .container {
            width: 92%;
            max-width: 750px;
            margin: 50px auto;
        }

        .card {
            background: #fffaf5;
            border: 1px solid #e0d4cd;
            border-radius: 18px;
            overflow: hidden;

            box-shadow: 0 12px 30px rgba(62, 39, 35, 0.1);
        }

        /* HEADER */
        .card-header {
            padding: 25px 30px;
            background: #3e2723;
            color: white;
        }

        .card-header h1 {
            margin: 0 0 7px;
        }

        .card-header p {
            margin: 0;
            color: #d7ccc8;
        }

        /* FORM */
        .form-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4e342e;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px;

            border: 1px solid #d7ccc8;
            border-radius: 9px;

            font-size: 15px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #8d6e63;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* BUTTONS */
        .buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 18px;
            border: none;
            border-radius: 8px;

            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .update {
            background: #6f4e37;
            color: white;
        }

        .update:hover {
            background: #5d4037;
        }

        .back {
            background: #d7ccc8;
            color: #4e342e;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .form-body {
                padding: 22px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- ================================
         NAVIGATION
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

                <span>
                    <?= htmlspecialchars($_SESSION['username']) ?>
                </span>

            <?php endif; ?>

            <a href="/logout" class="logout">
                Logout
            </a>

        </div>

    </nav>


    <!-- ================================
         EDIT COFFEE FORM
    ================================= -->

    <main class="container">

        <div class="card">

            <div class="card-header">

                <h1>
                    Edit Coffee
                </h1>

                <p>
                    Update the coffee information in the Brewora menu.
                </p>

            </div>


            <div class="form-body">

                <form
                    method="POST"
                    action="/products/update/<?= $product['id'] ?>"
                >

                    <!-- COFFEE NAME -->

                    <div class="form-group">

                        <label for="product_name">
                            Coffee Name
                        </label>

                        <input
                            type="text"
                            id="product_name"
                            name="product_name"
                            value="<?= htmlspecialchars($product['product_name']) ?>"
                            required
                        >

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="form-group">

                        <label for="description">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            required
                        ><?= htmlspecialchars($product['description']) ?></textarea>

                    </div>


                    <!-- PRICE AND STOCK -->

                    <div class="form-row">

                        <div class="form-group">

                            <label for="price">
                                Price (₱)
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                step="0.01"
                                min="0"
                                value="<?= htmlspecialchars($product['price']) ?>"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="quantity">
                                Available Stock
                            </label>

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                min="0"
                                value="<?= htmlspecialchars($product['quantity']) ?>"
                                required
                            >

                        </div>

                    </div>


                    <!-- FORM BUTTONS -->

                    <div class="buttons">

                        <button
                            type="submit"
                            class="btn update"
                        >
                            Update Coffee
                        </button>

                        <a
                            href="/products"
                            class="btn back"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>
