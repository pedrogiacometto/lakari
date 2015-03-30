<?php

namespace Catalog\Model\Dao;

/**
 * Description of ProductTable
 *
 * @author Pedro
 */
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Catalog\Model\Entity\Product;
use Catalog\Model\Entity\ProductDescription;
use Catalog\Model\Entity\ProductImage;

class ProductDao implements IProductDao
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getAll()
    {
       
        $query = $this->tableGateway->getSql()->select();
        $query->join(array('pd' => 'lk_product_description'),
                'pd.product_id = lk_product.product_id');
        $query->join(array('url' => 'lk_url_alias'),
                "lk_product.product_id = url.id"
                );
        $query->where(array("url.type = 'product'"));
        
        $query->order("lk_product.product_id");
        //echo $query->getSqlString();
        
        
        $resultSet = $this->tableGateway->selectWith($query);
        //var_dump($resultSet);
       
        return $resultSet;
    }
    
    public function getImages($productId = null)
    {
        $sql = new Sql($this->tableGateway->getAdapter());
        $query = $sql->select();
        $query->from('lk_product_image');
        
        if ($productId) {
            $query->where('product_id = ' . $productId);
        }
        
        $statement = $sql->prepareStatementForSqlObject($query);
        $resultSet = $statement->execute();

        $images = new \ArrayObject();
        foreach ($resultSet as $row) {
            $productImage = new ProductImage();
            $productImage->exchangeArray($row);
            $images->append($productImage);
        }
        
        return $images;
    }

    public function getById($id)
    {
        $ide = (int) $id;
        //$rowset = $this->tableGateway->select(array('id' => $ide));
        
        $query = $this->tableGateway->getSql()->select();
        $query->join(array('pd' => 'lk_product_description'),
                'pd.product_id = lk_product.product_id');
        $query->join(array('url' => 'lk_url_alias'),
                "lk_product.product_id = url.id"
                );
        $query->where(array("url.type = 'product'"));
        $query->where(array('lk_product.product_id' => $ide));
       
        $rowset = $this->tableGateway->selectWith($query);
 
        //var_dump($rowset);die;
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $ide");
        }
        return $row;
    }

    public function saveProduct(Product $product)
    {
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        return $product;
    }

    //put your code here
}
