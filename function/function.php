<?php

  // Get du lieu
    function getData($conn, $sql, $data){
      $result = mysqli_query($conn, $sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            require $data;
        }
      }
    }

    function getMultiListData($conn, $sql){
      $result = mysqli_query($conn, $sql);
      if($result->num_rows > 0){
        return $result;
      }
    }

    function getSingleListData($conn, $sql, $key){
      $result = mysqli_query($conn, $sql);
      $i = 0;
      $list = null;
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $list[$i] = $row[$key];
          $i++;
        }
      }

      return $list;
    }

    function getSingleData($conn, $sql, $key){
      $result = mysqli_query($conn, $sql);
      $data=null;
      if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          $data = $row[$key];
        }
      }
      return $data;
    }

    function getDanhMuc($conn){
      $result = mysqli_query($conn, "Select * From khuvucquan");
      if($result->num_rows > 0){
        return $result;
      }
    }

  // Validate du lieu
    function validateMatKhau($matKhau){
      if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*_]).{8,}$/", $matKhau)){
        echo 'Mật khẩu cần ít nhất 8 ký tự, có ký tự in thường, in hoa, số và ký tự đặc biệt!';
        return false;
      }
      return true;
    }

  // Tai len, tai xuong file
    function taiFile($file, $target_dir){
      $FileExtension = explode(".",$file['name'])[count(explode(".",$file['name']))-1];
      $fileName = md5(rand(0,1000)).'.'.$FileExtension;
      $target_file = $target_dir.basename($fileName);
      if(empty($error)){
          if(move_uploaded_file($file['tmp_name'], $target_file)){
              echo 'upload thanh cong';
              return $fileName;
          }
          else{
              echo 'upload that bai';
              return false;
          }
      }
    }
?>