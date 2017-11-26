<?php
class sanpham extends Db{
	private $_page_size =50;//Một trang hiển hị 5 cuốn sách
	private $_page_count;
	public function getRand($n)
	{
		$sql="select masanpham, tensanpham, img from sanpham order by rand() limit 0, $n ";
		return $this->exeQuery($sql);	
	}
	
	public function getByPubliser($manhaxb)
	{
		
	}
	public function delete($masanpham)
	{
		$sql ="delete from hinh where masanpham = :masanpham";
		
		$arr =  Array(":masanpham"=>$masanpham);
		$this->exeNoneQuery($sql, $arr);	
		//echo $sql;
		//print_r($arr);exit;

		$sql="delete from sanpham where masanpham=:masanpham ";
		return $this->exeNoneQuery($sql, $arr);	
	}
	
	public function getDetail($masanpham)
	{
		$sql="select sanpham.*, pub_name, cat_name 
			from sanpham, publisher, loai
			where sanpham.maloai = loai_maloai
				and sanpham.pub_id = publisher.pub_name
				and masanpham=@masanpham ";
		$arr = array("@masanpham"=>$masanpham);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	
	public function getAll($currPage=1)
	{
		/*$offset = ($currPage -1) * $this->_page_size;
		$sql="SELECT
				Count(*)
				FROM
				hangsanxuat
				INNER JOIN sanpham ON sanpham.mahang = hangsanxuat.mahang";
				
				$n  = $this->count($sql);
				$this->_page_count = ceil($n/$this->_page_size);*/
		$sql="SELECT sanpham.masanpham,
					sanpham.tensanpham,
					sanpham.manhinh,
					sanpham.cpu,
					sanpham.vga,
					sanpham.hdh,
					sanpham.pin,
					sanpham.mahang,
					sanpham.giakhuyenmai
					FROM
					sanpham
					 ";
					
				//limit $offset, " . $this->_page_size;
		
		return $this->exeQuery($sql);
	}
	
	public function search($key, $currPage=1)
	{
		//$key = Utils::getIndex("key");
		$arr = array(":tensanpham"=>"%". $key ."%");
		
		$offset = ($currPage -1) * $this->_page_size;
		//echo "<hr> $offset = ($currPage -1) * {$this->_page_size} <hr>";
		$sql="SELECT
				Count(*)
				FROM
				hangsanxuat
				INNER JOIN sanpham ON sanpham.mahang = hangsanxuat.mahang
				
				where tensanpham like :tensanpham";
				$n  = $this->count($sql, $arr);
				$this->_page_count = ceil($n/$this->_page_size);
		$sql="SELECT
				sanpham.masanpham,						
				sanpham.tensanpham,
				sanpham.manhinh,
				sanpham.cpu,
				sanpham.vga,
				sanpham.hdh,
				sanpham.pin,
				sanpham.mahang,
				sanpham.giakhuyenmai,
				sanpham.thoigianbaohanh,
				hinh.tenhinh,
				hinh.mahinh
				FROM
				sanpham
				INNER JOIN hinh ON hinh.masanpham = sanpham.masanpham
				where tensanpham like :tensanpham AND hinh.mahinh LIKE '%a' 
				limit $offset, " . $this->_page_size;
						
		//echo $sql;
		//print_r($arr);
		return $this->exeQuery($sql, $arr);
	}
	
	public function count($sql, $arr=array())
	{
		return $this->countItems($sql, $arr);
	}
	
	public function getPageCount()
	{
		return $this->_page_count;	
	}

}
?>