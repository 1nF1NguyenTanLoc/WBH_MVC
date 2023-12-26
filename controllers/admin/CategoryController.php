<?php

/**
* 
*/
class CategoryController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";
		if(!isset($_SESSION['admin'])){
			header("Location: http://localhost/WBH_MVC/indexadmin");
		}
	}
	function index(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/categoryModel.php';
		$md = new categoryModel;
		$data = $md->getAllCtgrs();
		$this->render('category',$data,'DANH MỤC SẢN PHẨM','admin');
	}
	function action(){
		$actionName = $id = $cname = $ccountry = '';
		if(isset($_GET['name'])){$actionName = $_GET['name'];}
		if(isset($_GET['id'])){$id = $_GET['id'];}
		require_once 'vendor/Model.php';
		require_once 'models/admin/categoryModel.php';
		$md = new categoryModel;
		
		switch ($actionName) {
			case 'add':
			if(isset($_GET['cname'])){$cname = $_GET['cname'];}
			if(isset($_GET['ccountry'])){$ccountry = $_GET['ccountry'];}
			if($cname == ''){echo "Bạn chưa điền tên danh mục!";return;}
			$data = array('',$cname, $ccountry);
			if($md->insert('danhmucsp',$data)){
				echo "OK";
			}
			break;

			case 'del':
			$count = ("SELECT COUNT(masp) FROM danhmucsp, sanpham WHERE danhmucsp.madm = sanpham.madm AND danhmucsp.madm = ".$id);
			if ($count != 0) {
				$md->delete('danhmucsp','madm = '.$id);
				echo "OK";
			} else {
				echo "Không xóa được!";
				// echo "Không thể xóa sản phẩm này vì có ".$count."sản phẩm đang được bày bán!";
				return 0;
			}
			break;

			case 'edit':
			$c4edit = $n4edit = '';
			$setRow = array('tendm','xuatsu');
			if(isset($_GET['country4edit'])){$c4edit = $_GET['country4edit'];}
			if(isset($_GET['name4edit'])){$n4edit = $_GET['name4edit'];}
			$setVal = array($n4edit, $c4edit);
			$md->update('danhmucsp',$setRow, $setVal, 'madm = '.$id);
			echo "OK";
			break;
			
			default:
				# code...
			break;
		}
	}
}