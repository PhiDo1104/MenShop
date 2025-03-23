<?php
session_start();
ob_start();

include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/account.php";
include "../model/danhmuc.php";
include "../model/order.php";
include "../model/cart.php";
include "../model/pdo.php";

// include "./Danhmuc/add.php";
// include "./Danhmuc/list.php";
// include "./Danhmuc/update.php";
include "header.php";
// include "sidebar.php";

if (isset($_SESSION['username']) && $_SESSION['role'] == '1') {
  // Chuyển hướng về trang đăng nhập nếu không phải admin

  if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

      case 'adddm':
        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
          $tenloai = trim($_POST['tenloai']); // Trim to remove extra spaces
          if (empty($tenloai)) {
            echo '<script>alert("Tên danh mục không được để trống")</script>';
          } else {
            $listdanhmuc = all(); // Fetch all existing categories
            $isDuplicate = false;

            // Check for duplicates
            foreach ($listdanhmuc as $danhmuc) {
              if (strcasecmp($tenloai, $danhmuc["Name"]) === 0) {
                $isDuplicate = true;
                break;
              }
            }

            if ($isDuplicate) {
              echo '<script>alert("Tên danh mục đã tồn tại")</script>';
            } else {
              try {
                insert_danhmuc($tenloai); // Insert new category
                echo '<script>alert("Thêm mới thành công")</script>';
              } catch (Exception $e) {
                echo '<script>alert("Đã xảy ra lỗi khi thêm danh mục: ' . $e->getMessage() . '")</script>';
              }
            }
          }
        }
        include "./Danhmuc/add.php";
        break;

      case 'listdm':
        $listdanhmuc = all();
        include "./Danhmuc/list.php";
        break;
      case 'xoadm':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          delete_dm($_GET['id']);
        }
        $listdanhmuc = all();
        include "./Danhmuc/list.php";
        break;
      case 'updatedm':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          $dm = loadOne($_GET['id']);

          if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $tenloai = $_POST['tenloai'];
            $id = $_POST['id'];
            if (empty($tenloai)) {
            } else {
              updateDm($id, $tenloai);
              echo '<script>alert("Cập nhật thành công")</script>';
              // header("Location:index.php?act=listdm");
            }
          }
        }
        $listdanhmuc = all();
        include "./Danhmuc/update.php";
        break;

      case 'addsp':
        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
          $iddm = $_POST['iddm'];
          $name = trim($_POST['name']);

          if (empty($name)) {
            // echo '<script>alert("Tên danh mục không được để trống")</script>';
          } else {
            $listsanpham = loadAll_sanpham();
            $isDuplicate = false;

            foreach ($listsanpham as $sanpham) {
              if (strcasecmp($name, $sanpham["name"]) === 0) {
                $isDuplicate = true;
                break;
              }
            }

            if ($isDuplicate) {
              echo '<script>alert("Tên sản phẩm đã tồn tại")</script>';
            } else {



              $price = $_POST['price'];
              $mota = $_POST['mota'];
              $del = $_POST['del'];
              $size = $_POST['size'];
              $quantity = $_POST['quantity'];
              $color = $_POST['color'];
              $img = $_FILES['img']['name'];

              $target_dir = "../upload/";
              $target_file = $target_dir . basename($_FILES["img"]["name"]);

              if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo '<script>alert("Lỗi khi tải ảnh lên")</script>';
              }

              $ext = pathinfo($img, PATHINFO_EXTENSION);
              if (empty($name) || empty($price) || empty($mota) || empty($del) || empty($size) || empty($quantity) || empty($color) || empty($img)) {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
              } elseif (!in_array($ext, ['jpg', 'png'])) {
                echo '<script>alert("Vui lòng chọn file ảnh (.jpg, .png)")</script>';
              } else {
                insert_sanpham($name, $price, $img, $mota, $iddm, $del, $size, $quantity, $color);
                echo '<script>alert("Thêm mới thành công")</script>';
                // header("Location: index.php?act=listsp");
                // exit();
              }
            }
          }
        }
        $listdanhmuc = all();
        include "./Sanpham/add.php";
        break;

      case 'chitietsp':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          $sanpham =  loadOne_sanpham($_GET['id']);
          $dm = loadOne($_GET['id']);
        }
        include "./Sanpham/chitiet.php";
        break;
      case 'listsp':
        if (isset($_POST['listsubmit']) && ($_POST['listsubmit'])) {
          $kyw = $_POST['kyw'];
          $iddm = $_POST['iddm'];
        } else {
          $kyw = '';
          $iddm = 0;
        }
        $listdanhmuc = all();
        $listsanpham = all_sanpham($kyw, $iddm);
        include "./Sanpham/list.php";
        break;
      case 'xoasp':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          delete_sanpham($_GET['id']);
        }
        $listsanpham = all_sanpham("", 0);
        include "./Sanpham/list.php";
        break;
      case 'suasp':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          $sanpham = loadOne_sanpham($_GET['id']);
        }
        $listdanhmuc = all();
        include "./Sanpham/update.php";
        break;
      case 'updatesp':
        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
          $id =  $_POST['id'];
          $iddm = $_POST['iddm'];
          $name = $_POST['name'];
          $price = $_POST['price'];
          $mota = $_POST['mota'];
          $del = $_POST['del'];
          $size = $_POST['size'];
          $quantity = $_POST['quantity'];
          $color = $_POST['color'];
          $img = $_FILES['img']['name'];

          $target_dir = "../upload/";
          $target_file = $target_dir . basename($_FILES["img"]["name"]);

          if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo '<script>alert("Lỗi khi tải ảnh lên")</script>';
          }
          if (empty($name) || empty($price) || empty($mota) || empty($del) || empty($size) || empty($quantity) || empty($color)) {
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
          } else {
            // echo '<script>confirm("Cập nhật thành công")</script>';
            updateDm_sanpham($id, $name, $price, $mota, $img, $iddm, $del, $size, $quantity, $color);
            header("Location: index.php?act=listsp");
          }
        }
        $listdanhmuc = all();
        $sanpham = loadOne_sanpham($id);
        $listsanpham = all_sanpham("", 0);
        include "./Sanpham/update.php";
        break;
      case 'addacc':
        // $listacc = all_account();
        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
          $username = $_POST['username'];
          $email = trim($_POST['email']);

          if (empty($email)) {
            // echo '<script>alert("Tên danh mục không được để trống")</script>';
          } else {
            $listacc = all_account();
            $isDuplicate = false;

            foreach ($listacc as $acc) {
              if (strcasecmp($email, $acc["email"]) === 0) {
                $isDuplicate = true;
                break;
              }
            }

            if ($isDuplicate) {
              echo '<script>alert("Email đã tồn tại")</script>';
            } else {
              $password = $_POST['password'];
              $rPassword = $_POST['rPassword'];
              $address = $_POST['address'];
              $tel = $_POST['tel'];
              $role = $_POST['role'];

              if (empty($username) || empty($email) || empty($password) || empty($address) || empty($tel) || empty($rPassword)) {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
              } else {
                echo '<script>confirm("Tạo thành công")</script>';
                newAccount_admin($username, $email, $password, $address, $tel, $role);

                // header("Location: index.php?act=listacc");
              }
            }
          }
        }
        include "./TaiKhoan/add.php";
        break;
      case 'listacc':
        $listacc = all_account();
        include "./TaiKhoan/list.php";
        break;
      case 'xoaacc':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          delete_acc($_GET['id']);
        }
        $listacc = all_account();
        include "./TaiKhoan/list.php";
        break;
      case 'suaacc':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          $acc = loadOne_acc($_GET['id']);
        }
        include "./TaiKhoan/update.php";
        break;
      case 'updateacc':
        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
          $id = $_POST['id'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $rPassword = $_POST['rPassword'];
          $address = $_POST['address'];
          $role = $_POST['role'];
          $tel = $_POST['tel'];

          if (empty($username) || empty($email) || empty($password) || empty($address) || empty($tel) || empty($rPassword)) {
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
          } else {
            echo '<script>alert("Cập nhật thành công")</script>';
            update_acc($id, $username, $email, $password, $role, $address, $tel);
          }
        }
        $acc = loadOne_acc($id);
        $listacc = all_account();
        include "./TaiKhoan/update.php";
        break;
      case 'chiTietOrder':
        // if (isset($_POST['listsubmit']) && ($_POST['listsubmit'])) {
        //   $kyw = $_POST['kyw'];
        // } else {
        //   $kyw = '';
        // }
        // $listOrder = allBill();
        $idbill = $_GET['id'];
        $listOrder = allCartByIdBill($idbill);
        include "./DonHang/chitiet.php";
        break;
      case 'suaOrder':
        // if (isset($_POST['listsubmit']) && ($_POST['listsubmit'])) {
        //   $kyw = $_POST['kyw'];
        // } else {
        //   $kyw = '';
        // }
        // $listOrder = allBill();
        $idbill = $_REQUEST['idbill'];
        if (isset($_REQUEST['xuly'])) {
          $status = $_REQUEST['xuly'];
          update_bill_status($idbill, $status);
          // header("Location: index.php?act=listOrder");

        } else if (isset($_REQUEST['huy'])) {
          $status = $_REQUEST['huy'];
          update_bill_status($idbill, $status);
          // header("Location: index.php?act=listOrder");
        } else if (isset($_REQUEST['giaohang'])) {
          $status = $_REQUEST['giaohang'];
          update_bill_status($idbill, $status);
          // header("Location: index.php?act=listOrder");
        }
        $listOrder = allBill();
        include "./DonHang/list.php";
        break;
      case 'listOrder':
        if (isset($_POST['listsubmit']) && ($_POST['listsubmit'])) {
          $kyw = $_POST['kyw'];
        } else {
          $kyw = '';
        }
        $listOrder = searchOrder($kyw);
        // $listOrder = allBill();
        include "./DonHang/list.php";
        break;
      case 'listComment':
        if (isset($_POST['listsubmit']) && ($_POST['listsubmit'])) {
          $kyw = $_POST['kyw'];
        } else {
          $kyw = '';
        }
        $listcomment = searchComment($kyw);
        // $listcomment = allComment();
        include "./BinhLuan/list.php";
        break;
      case 'xoaComment':
        if (isset($_GET['id']) && ($_GET['id']) > 0) {
          deleteComment($_GET['id']);
        }
        $listcomment = allComment();
        include "./BinhLuan/list.php";
        break;
      case 'logout':
        if (isset($_SESSION['username'])) unset($_SESSION['username']);
        header('Location: ../index.php');
        break;
      case 'thongke':
        $listthongke = load_thongke_();
        include "./thongke/list.php ";
        break;
      default:
        include "home.php";
        break;
    }
  } else {
    include "home.php";
  }
  include "footer.php";
} else {
  header("Location: ../index.php?act=login");
  exit();
}
