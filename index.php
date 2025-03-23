<?php

session_start();
ob_start();

// if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) {
// include "./view/header.php";
include "./model/account.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/pdo.php";
include "./global.php";
include "./model/cart.php";
include "./model/binhluan.php";
if (!isset($_SESSION["myCart"])) $_SESSION['myCart'] = [];
if (!isset($_SESSION["muangay"])) $_SESSION['muangay'] = [];

// include "./view/login.php";
$listsanpham = loadAll_sanpham();
$listdanhmuc = all();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
  $act = $_GET['act'];
  switch ($act) {
      // case 'gioithieu':
    case 'search':
      if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
        $kyw = trim($_POST['kyw']);
        $listsanphamsearch = all_search($kyw);
      } else {
        $kyw = '';
      }
      include "./view/danhmuc_sp.php";
      break;
    case 'billmuangay':
      if (isset($_POST['thanhToan']) && $_POST['thanhToan']) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $tel = htmlspecialchars($_POST['tel']);
        $pttt = htmlspecialchars($_POST['pttt']);
        $address = htmlspecialchars($_POST['address']);
        $name = htmlspecialchars($_POST['username']);
        foreach ($_SESSION['muangay'] as $cart) {
          $total = $cart[4];
        }
        // var_dump($total);
        $ngaydathang = date('h:i:sa d/m/Y');
        // $tongdonhang = 0;

        // if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        //   foreach ($_SESSION['myCart'] as $cart) {
        //     $tongdonhang += $cart[3] * $cart[2]; // Giá * số lượng
        //   }
        // }
        $idbill = insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $total);

        if ($idbill) {
          if (isset($_SESSION['muangay']) && is_array($_SESSION['muangay'])) {
            foreach ($_SESSION['muangay'] as $cart) {
              $price = str_replace('.', '', $cart[3]); // Loại bỏ dấu chấm
              if (is_numeric($price)) {
                $ttien = $cart[4] * $price;
              } else {
                $ttien = 0; // Xử lý lỗi nếu giá không hợp lệ
              }
              insert_cart($_SESSION['id'], $cart[0], $cart[2], $cart[1], $cart[3], $ttien, $cart[4], $cart[5], $cart[6], $idbill);
            }
          } else {
            echo "Giỏ hàng trống hoặc không hợp lệ!";
          }
        }
      }

      if (isset($idbill) && $idbill) {
        $bill = loadOne_bill($idbill);
        $billct = loadOne_cart($idbill);
      } else {
        echo "Lỗi: Không thể tải thông tin hóa đơn!";
        exit;
      }


      include './view/billmuangay.php';
      break;
    case 'billConfirm':
      if (isset($_POST['thanhToan']) && $_POST['thanhToan']) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $tel = htmlspecialchars($_POST['tel']);
        $pttt = htmlspecialchars($_POST['pttt']);
        $address = htmlspecialchars($_POST['address']);
        $name = htmlspecialchars($_POST['username']);
        $total = 0;
        foreach ($_SESSION['myCart'] as $cart) {
          $total += $cart[4];
        }
        $ngaydathang = date('h:i:sa d/m/Y');
        // $tongdonhang = 0;

        // if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
        //   foreach ($_SESSION['myCart'] as $cart) {
        //     $tongdonhang += $cart[3] * $cart[2]; // Giá * số lượng
        //   }
        // }
        $idbill = insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $total);

        if ($idbill) {
          if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
            // $idbi = $_SESSION['myCart'][0];



            foreach ($_SESSION['myCart'] as $cart) {
              $price = str_replace('.', '', $cart[3]); // Loại bỏ dấu chấm
              if (is_numeric($price)) {
                $ttien = $cart[4] * $price;
              } else {
                $ttien = 0; // Xử lý lỗi nếu giá không hợp lệ
              }
              insert_cart($_SESSION['id'], $cart[0], $cart[2], $cart[1], number_format($cart[3], 0, ','), number_format($ttien, 0, ','), quantity: $cart[4], size: $cart[5], color: $cart[6], idbill: $idbill);
            }
          } else {
            echo "Giỏ hàng trống hoặc không hợp lệ!";
          }
        }
      }

      if (isset($idbill) && $idbill) {
        $bill = loadOne_bill($idbill);
        $billct = loadOne_cart($idbill);
        // unset($_SESSION['myCart']);
      } else {
        echo "Lỗi: Không thể tải thông tin hóa đơn!";
        exit;
      }


      include './view/billconfirm.php';
      break;
    case 'history_bill':

      include './view/lichsudonhang.php';
      break;
    case 'muangay':
      if (isset($_POST['muangay']) && $_POST['muangay']) {
        $_SESSION['muangay'] = [];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $img = $_POST['img'];
        $quantity = $_POST['quantity'];
        // var_dump($_POST['quantity']);
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = str_replace('.', '', $_POST['del']); // Loại bỏ dấu chấm
        if (is_numeric($price) && is_numeric($quantity)) {
          $ttien = $quantity * $price;
        } else {
          $ttien = 0; // Xử lý lỗi nếu giá không hợp lệ
        }
        $proAdd = [$id, $name, $img, $price, $quantity, $size, $color,  $ttien];
        array_push($_SESSION['muangay'], $proAdd);
      }
      include './view/muangay.php';
      break;
    case 'bill':

      include './view/bill.php';
      break;
    case 'cart':
      // if(isset($_SESSION['myCart'])){
      //   if($name =)
      // }
      include './view/cart.php';
      break;
    case 'delCart':
      if (isset($_GET['id'])) {
        array_splice($_SESSION['myCart'], $_GET['id'], 1);
      } else {
        $_SESSION['myCart'] = [];
      }
      header("Location:index.php?act=cart");
      break;
    case 'addCart':
      if (isset($_POST['addCart']) && $_POST['addCart']) {
        $id = $_POST['id'];
        $proById = loadOne_sanpham($id);
        extract($proById);
        if ($quantity < 1) {
          echo "<script>alert('Het san pham')</script>";
          header("Location:index.php?act=sanphamchitiet&idsp=$id");
          // exit;
        } else {

          $name = $_POST['name'];
          $img = $_POST['img'];
          // $price = $_POST['price'];
          $price = str_replace('.', '', $_POST['del']);
          $quantity = $_POST['quantity'];
          $size = $_POST['size'];
          $color = $_POST['color'];
          $ttien = $price * $quantity;
          $fg = 0;
          $i = 0;
          if (isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0) {
            foreach ($_SESSION['myCart'] as $sp) {
              if ($sp[0] == $id && $sp[5] == $size && $sp[6] == $color) {
                $quantity += $sp[4];
                $fg = 1;
                $_SESSION['myCart'][$i][4] = $quantity;
                break;
              }
              $i++;
            }
          }
          if ($fg == 0) {
            $proAdd = [$id, $name, $img, $price, $quantity, $size, $color,  $ttien];
            array_push($_SESSION['myCart'], $proAdd);
          }
        }
      }
      // unset($_SESSION['myCart']); 
      include './view/cart.php';
      break;
    case 'sanpham':
      if (isset($_GET['iddm'])) {
        $iddm = $_GET['iddm'];
        // var_dump($iddm);
        $dm = loadOne($iddm);
        $dssp = all_sanpham('', $iddm);
        include './view/sptheodanhmuc.php';
      } else {
        echo "Không tìm thấy iddm";
      }
      break;
    case 'huy':
      $idBill = $_REQUEST['idbill'];
      if (isset($_REQUEST['huy'])) {
        $status = $_REQUEST['huy'];
        update_bill_status($idBill, $status);
        header("Location:index.php?act=history_bill");
      }
      include './view/lichsudonhang.php';
      break;
    case 'resignter':
      if (isset($_POST['submitRegister']) && $_POST['submitRegister']) {
        $username =  trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $rPassword = trim($_POST['rPassword']);

        if ($username == "") {
          echo '<script>alert("không được để trống username")</script>';
        } else if ($email == "") {
          echo '<script>alert("không được để trống email")</script>';
        } else if ($password == "") {
          echo '<script>alert("không được để trống password")</script>';
        } else if ($rPassword != $password) {
          echo '<script>alert("Mật khẩu nhập lại không đúng")</script>';
        } else {
          echo '<script>confirm("Đăng Ký Thành Công!");</script>';
          newAccount($username, $email, $password);

          header('Location: index.php?act=login');
        }
      }
      include "./view/resignter.php";
      break;

    case 'login':
      if (isset($_POST['submitLogin']) && $_POST['submitLogin']) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password']);
        if (empty($email) || empty($password)) {
        } else {
          // if($email == "dophi110405@gmail.com" && $password == "123456"){
          $kq = checkLoginInfo($email, $password);
          if ($kq && count($kq) > 0 && $kq[0]['password'] == $password) {
            $role = $kq[0]['role'];
            $_SESSION['username'] = $kq[0]['username'];
            $_SESSION['id'] = $kq[0]['id'];
            $_SESSION['email'] = $kq[0]['email'];
            $_SESSION['username'] = $kq[0]['username'];
            $_SESSION['address'] = $kq[0]['address'];
            $_SESSION['tel'] = $kq[0]['tel'];
            $_SESSION['role'] = $role;
            echo '<script>
            confirm("Đăng nhập thành công");
            </script>';
            header('Location: index.php');
          } else {
            echo '<script>alert("Sai email hoac password")</script>';
          }
        }
      }
      include "./view/login.php";
      break;
    case 'logout':
      include "./view/logout.php";
      break;

    case 'sanphamchitiet';
      if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
        $id = $_GET['idsp'];
        $onesanpham = loadOne_sanpham($id);
        extract($onesanpham);
        $listsanpham_cungloai = loadOne_sanpham_cungloai($id, $iddm);

        include "./view/sanphamchitiet.php";
      } else {
        include "./view/home.php";
      }

      break;
    default:
      include "./view/home.php";
      break;
  }
} else {
  include "./view/home.php";
}

// include "./view/footer.php";
// }else{
//   header('Location: view/login.php');
// }
