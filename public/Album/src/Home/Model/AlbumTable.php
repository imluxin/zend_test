<?php
namespace Home\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll()
    {
        $result = $this->tableGateway->select();
        return $result;
    }
    
    public function getAlbum($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(array('id'=>$id));
        $row = $rowset->current();
        if (!$row) {
        	throw new \Exception('无法找到'.$id);
        }
        return $row;
    }
    
    public function saveAlbum(Album $album)
    {
        $data = array(
        	'artist' => $album->artist,
            'title' => $album->title
        );
        $id = (int)$album->id;
        if ($id == 0) {
        	$this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
            	$this->tableGateway->update($data, array('id'=>$id));
            } else {
                throw new \Exception('album 不存在');
            }
        }
    }
    
    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id'=>(int)$id));
    }
}