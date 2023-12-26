<?php
class ProductAdminController extends Controller
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
		require_once 'models/admin/productModel.php';
		$md = new productModel;
		$data = $md->getAllPrds();
		$this->render('product',$data,'SẢN PHẨM','admin');
	}
	function action(){
		$actionName = $id = $pname = $pprice = $baohanh = $luotmua = $luotxem = '';
		if(isset($_GET['name'])){$actionName = $_GET['name'];}
		if(isset($_GET['id'])){$id = $_GET['id'];}
		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';
		$md = new productModel;
		
		switch ($actionName) {
			case 'add':
			if(isset($_GET['pname'])){$pname = $_GET['pname'];}
			if(isset($_GET['pimg'])){$pimg = $_GET['$pimg'];}
			if(isset($_GET['pprice'])){$pprice = $_GET['pprice'];}
			if(isset($_GET['baohanh'])){$baohanh = $_GET['baohanh'];}
			if(isset($_GET['luotmua'])){$luotmua = $_GET['luotmua'];}
			if(isset($_GET['luotxem'])){$luotxem = $_GET['luotxem'];}
			if($pname == '' || $pprice == '' || $baohanh == ''){echo "Bạn chưa điền tên danh mục!";return;}
			$data = array('', $pname, $pprice, $baohanh, $luotmua, $luotxem);
			if($md->insert('sanpham',$data)){
				echo "OK";
			}
			break;

			case 'del':
			$md->delete('sanpham','masp = '.$id);
			echo "OK";
			break;

			case 'edit':
			$n4edit = $p4edit = $bh4edit = $lm4edit = $lx4edit = '';
			$setRow = array('tensp','gia','baohanh','luotmua','luotxem');
			if(isset($_GET['product4Price'])){$p4edit = $_GET['product4Price'];}
			if(isset($_GET['product4Name'])){$n4edit = $_GET['product4Name'];}
			if(isset($_GET['baohanh4'])){$bh4edit = $_GET['baohanh4'];}
			if(isset($_GET['luot4Mua'])){$lm4edit = $_GET['luot4Mua'];}
			if(isset($_GET['luot4Xem'])){$lx4edit = $_GET['luot4Xem'];}
			$setVal = array($n4edit, $p4edit, $bh4edit, $lm4edit, $lx4edit);
			$md->update('sanpham',$setRow, $setVal, 'masp = '.$id);
			echo "OK";
			break;
			
			default:
				# code...
			break;
		}
	}
}