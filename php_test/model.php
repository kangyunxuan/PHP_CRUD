<?php
class Model{
    // Properties
    private $host = 'localhost';
    private $user = 'root';
    private $password = ''; 
    private $db_name = 'crud_test';

    private $link;

    // Methods
    public function __construct(){
        try {
            $this ->link = new mysqli($this->host,$this->user,$this->password,$this->db_name);
            // echo "連線成功" ;

        }
        catch(Exception $e){
            echo "連線失敗" . $e->getMessage();
        } 
    }

    public function show(){
        $data = null;

        $query ="SELECT * FROM  account_info ";
        mysqli_query( $this ->link,"SET NAMES 'utf8'");
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
        
    }

// 新增資料
    public function insert(){
    
        if(isset($_POST['action'])){
            mysqli_set_charset($this->link,"UTF8");

            $account = $_POST['account'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];  
            $memo = $_POST['memo'];  


            if ($account == "" || $name == "" || $gender == "" || $birthday == "" || $email == ""){
                // $msg = "請確認必田孜瞭輸入!";
                echo "<script> {window.alert('失敗')} </script>";
            }else{			
                $sql = $this->link->query("SELECT account FROM account_info WHERE account='$account'");
                if ($sql->num_rows > 0){
                    echo "<script> {window.alert('ACCOUNT已存在')} </script>";
                }else{
                    $this->link->query("INSERT INTO account_info (account,name,gender,birthday,email,memo) 
                    VALUE ('$account','$name','$gender','$birthday','$email','$memo')");
                    // echo "<script> {window.alert('註冊成功，將為您導向登入頁面');location.href='index.php'} </script>";
                }
            }      
        }
    }

    // 刪除資料

    public function delete($id= null){
        if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        $query = "DELETE FROM account_info where account = '$id'";
		$sql = $this->link->query($query);
        }   
    }

    //獲取舊資料
    public function get($id = null){
        if(isset($_POST['update_id'])){
        $id = $_POST['update_id'];

        $data = null;

        $query = "SELECT * FROM account_info WHERE account = '$id'";
        if ($sql = $this->link->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data = $row;
                }
            }
            echo json_encode($data);
        }   
    }

    //更新資料
    public function update(){

        if(isset($_POST['update'])){
        mysqli_set_charset($this->link,"UTF8");

        $account = $_POST['account'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];  
        $memo = $_POST['memo'];  

        $query = "UPDATE account_info SET  name='$name', 
        gender='$gender', birthday='$birthday', email='$email', memo='$memo' 
        WHERE account='$account'";

        $sql = $this->link->query($query);
        echo "<script> {location.href='index.php'} </script>";

        }


    }




}
?>