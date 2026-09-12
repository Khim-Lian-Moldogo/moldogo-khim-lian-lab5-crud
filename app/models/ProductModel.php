<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    // GET ALL PRODUCTS
    public function getAllProducts()
    {
        return $this->db
            ->table('products')
            ->get_all();
    }

    // GET ONE PRODUCT
    public function getProduct($id)
    {
        $result = $this->db
            ->table('products')
            ->where('id', $id)
            ->get();

        if (empty($result)) {
            return null;
        }

        if (isset($result['id'])) {
            return $result;
        }

        return $result[0] ?? null;
    }

    // CREATE
    public function createProduct($data)
    {
        return $this->db
            ->table('products')
            ->insert($data);
    }

    // UPDATE
    public function updateProduct($id, $data)
    {
        return $this->db
            ->table('products')
            ->where('id', $id)
            ->update($data);
    }

    // DELETE
    public function deleteProduct($id)
    {
        return $this->db
            ->table('products')
            ->where('id', $id)
            ->delete();
    }
}