<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  </head>
  <body id="search_content">

    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">PHP CRUD TEST</h1>
            <!-- Button trigger modal -->
        </div>

        <hr style="height: 1px;color: black;background-color: black;">

        <button type="button" class="col-md-2 mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
            新增資料
        </button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">帳號</th>
                <th scope="col">姓名</th>
                <th scope="col">性別</th>
                <th scope="col">生日</th>
                <th scope="col">信箱</th>
                <th scope="col">備註</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody id="content">
              <?php

                include 'model.php';
                $model = new Model();
                $insert = $model->insert();
                $rows = $model->show();

                

                  if(!empty($rows)){
                  foreach($rows as $key =>$value){ 
              ?>
              <tr id="<?php echo $value['account']; ?>">
                <th><?php echo $key+1; ?></th>
                <td><?php echo $value['account']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['gender']; ?></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['memo']; ?></td>
                <td>
                  <button type="button" class="btn btn-danger delete" >刪除</button>
                  <button type="button" class="btn btn-btn-primary btn-secondary get" data-bs-toggle="modal" data-bs-target="#update_modal">更新</button>
                </td>
              </tr>

              <?php
                }
              }
              ?>
            </tbody>
          </table>
        <div>
      </div>

    </div>


    <!--Add Modal -->
    <div>
    <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">新增</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row justify-content-center mb-6 text-black" action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
                  <div class="col-5">
                    <!-- ID --> 
                    <div class="form-group">
                      <label for="account">
                        帳號
                      </label>
                      <input type="text" class="form-control" id="account" name="account" placeholder="請輸入帳號" >
                    </div>          

                    <!-- name -->
                    <div class="form-group ">
                      <label for="name">
                        姓名
                      </label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名">
                    </div>

                    <!-- gender -->
                    <div class="form-group ">

                      <label for="gender">
                        性別
                      </label>

                      <br>
                      <input type="radio" id="girl" name="gender" value="女">
                      <label for="girl">女</label>
                      <input type="radio" id="boy" name="gender" value="男">
                      <label for="boy">男</label>

                    </div>     
                  </div>
                  <div class="col-5">
                    <!-- 生日 -->
                    <div class="form-group ">
                      <label for="birthday">
                        生日
                      </label>
                      <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>  

                    <!-- email -->
                    <div class="form-group ">
                      <label for="email">
                        信箱
                      </label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="請輸入信箱">
                    </div>  

                    <!-- 備註 -->

                    <div class="form-group">
                      <label for="memo">備註</label>
                      <textarea class="form-control" id="memo" name="memo" rows="2"></textarea>
                    </div>
              
                  </div>
            
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button name="action" value="add" class="btn btn-block  btn-info" type="submit">
                        確定新增
                    </button>

                  </div>
          </form>

        </div>
      </div>
    </div>
    </div>

    <?php
    $update = $model->update();
    ?>

    <!--Update Modal -->
    <div>
    <div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">新增</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row justify-content-center mb-6 text-black" action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
              <!-- <form class="mb-6 text-white"  method="post" id="form" action="m_login.php"> -->
                  <div class="col-5">
                    <!-- ID --> 
                    <div class="form-group">
                      <label for="account">
                        帳號
                      </label>
                      <input readonly="readonly" type="text" class="form-control" id="get_account" name="account" placeholder="請輸入帳號"  >
                    </div>          

                    <!-- name -->
                    <div class="form-group ">
                      <label for="name">
                        姓名
                      </label>
                      <input type="text" class="form-control" id="get_name" name="name" placeholder="請輸入姓名" >
                    </div>

                    <!-- gender -->
                    <div class="form-group get_gender">

                      <label for="gender">
                        性別
                      </label>

                      <br>
                      <input type="radio" id="get_girl" name="gender" value="女">
                      <label for="girl">女</label>
                      <input type="radio" id="get_boy" name="gender" value="男">
                      <label for="boy">男</label>

                    </div>     
                  </div>
                  <div class="col-5">
                    <!-- 生日 -->
                    <div class="form-group ">
                      <label for="birthday">
                        生日
                      </label>
                      <input type="date" class="form-control" id="get_birthday" name="birthday"  >
                    </div>  

                    <!-- email -->
                    <div class="form-group ">
                      <label for="email">
                        信箱
                      </label>
                      <input type="email" class="form-control" id="get_email" name="email" placeholder="請輸入信箱"  >
                    </div>  

                    <!-- 備註 -->

                    <div class="form-group">
                      <label for="memo">備註</label>
                      <textarea class="form-control" id="get_memo" name="memo" rows="2"  ></textarea>
                    </div>
              
                  </div>
            
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <!-- <button type="submit" class="btn btn-primary" name="insert">確定新增</button> -->
                    <button name="update" value="update"  class="btn btn-block  btn-info update" type="submit">
                        更新
                    </button>
                  </div>
          </form>
        </div>
      </div>
    </div>
    </div>
 
    <script  type="text/javascript" src="ajax.js"></script>

  </body>
</html>
