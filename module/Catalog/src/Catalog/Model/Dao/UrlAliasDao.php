<?php

namespace Catalog\Model\Dao;

/**
 * Description of ProductTable
 *
 * @author Pedro
 */
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Catalog\Model\Entity\UrlAlias;

class UrlAliasDao 
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getKeywordId($keyword)
    {
        $ide = $keyword;
        $rowset = $this->tableGateway->select(array('keyword' => $ide));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $ide");
        }
        return $row;
    }

    //put your code here
}
