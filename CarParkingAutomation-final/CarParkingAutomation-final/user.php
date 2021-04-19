<?php
    include_once 'account.php';
    session_start();

    class User implements Account{
        //Login & Register
        private $fullName;
        private $user_token;
        private $UserPassword;
        private $inputPass;
        //User Details and Car Details
        private $userType;
        private $numberplate;
        private $car_colour;
        private $car_type;
        private $phoneNo;
        private $carid;
        private $timestamp;
        private $timeOut;
        private $timeIn;
        private $carCheckoutPlate;
        //Session Details
        private $session;
        private $sessionID;
        private $userId;
        private $userName;

        //timein and out
        private $varTimeIn;
        private $varTimeOut;

        public function __construct(){ 
            $this->fullName = "";
            $this->user_token = "";  
            $this->UserPassword = "";  
            $this->inputPass = "";          
        }

        //getters and setter
        

        public function setFullName($fn){
            $this->fullName = $fn;
        }

        public function getFullName(){
            return $this->fullName;
        }

        public function setuser_token($em){
            $this->user_token = $em;
        }

        public function getuser_token(){
            return $this->user_token;
        }

        public function setinputPass($pass){
            $this->inputPass = $pass;
        }

        public function getinputPass(){
            return $this->inputPass;
        }
       
        public function setUserType($UserType){
            $this->userType = $UserType;
        }

        public function getUserType(){
            return $this->userType;
        }

        public function setNumberPlate($numberPlate){
            $this->numberplate = $numberPlate;
        }

        public function getNumberPlate(){
            return $this->numberplate;
        }

        public function setCarColour($carcolor){
            $this->car_colour = $carcolor;
        }

        public function getCarColour(){
            return $this->car_colour;
        }

        public function setCarType($CarType){
            $this->car_type = $CarType;
        }

        public function getCarType(){
            return $this->car_type;
        }

        public function setPhoneNo($PhoneNo){
            $this->phoneNo = $PhoneNo;
        }

        public function getPhoneno(){
            return $this->phoneNo;
        }

        public function setSession($session)
        {
            $this->session = $session;
            return $this;
        }
 
        public function getSession()
        {
            return $this->session;
        }

        public function setSessionID($sessionID)
        {
            $this->sessionID = $sessionID;
            return $this;
        }

        public function getSessionID()
        {
            return $this->sessionID;
        }
        
        public function setUserId($userId)
        {
            $this->userId = $userId;
            return $this;
        }
 
        public function getUserId()
        {
            return $this->userId;
        }
 
        public function setUserName($userName)
        {
            $this->userName = $userName;
            return $this;
        }

        public function getUserName()
        {
            return $this->userName;
        }

        public function setVarTimeIn($time_in){
            $this->varTimeIn = $time_in;
        }
        public function getTimeIn(){
            return $this->varTimeIn; 
        }

        public function setVarTimeOut($time_out){
            $this->varTimeOut = $time_out;
        }
        public function getTimeOut(){
            return $this->varTimeOut; 
        }

        public function register ($pdo) {
            try{
                //prepare a query
                $stm = $pdo->prepare("INSERT INTO user (UserName, UserToken, UserPassword )
                 VALUES(?,?,?)");
                $stm->execute([$this->fullName,$this->user_token,$this->inputPass]);
                $stm = null;
                return "Registration was successful";
                echo "hello it is working";
            }catch (PDOException $ex){
                return $ex->getMessage();
                //in production return a generic message, but log the specific
            }
            //factor out the profile picture. 
        }
        public function login($pdo) {
            try {
                $stmt = $pdo->prepare("SELECT UserPassword FROM user WHERE UserToken = ?");
                $stmt->execute([$this->user_token]);
                $result = $stmt->fetch();
                $this->UserPassword = $result['UserPassword'];
                
                if (Password_verify($this->inputPass, $this->UserPassword)) {

                    $stmt = $pdo->prepare("SELECT * FROM user WHERE UserToken = ? AND UserPassword = ?");
                    $stmt->execute([$this->user_token, $this->UserPassword]);
                    $result = $stmt->fetch();
                    $this->userId = $result['UserID'];
                    $this->userName = $result['UserName'];
                    $this->userType = $result['Type'];

                    if($this->userType == "Admin"){
                        $_SESSION['User'] = $this->userName;
                        $this->sessionID = session_id();
                        $stm = $pdo->prepare("INSERT INTO user_sessions(User_ID, UserName, User_Type, Session_ID) 
                        VALUES(?,?,?,?)");
                        $stm->execute([$this->userId,$this->userName,$this->userType, $this->sessionID]);
                        $stm = null;
                        header("Location: admin/admin.php");
                    }else if($this->userType == "Master"){
                        $_SESSION['User'] = $this->userName;
                        $this->sessionID = session_id();
                        $stm = $pdo->prepare("INSERT INTO user_sessions(User_ID, UserName, User_Type, Session_ID) 
                        VALUES(?,?,?,?)");
                        $stm->execute([$this->userId,$this->userName,$this->userType, $this->sessionID]);
                        $stm = null;
                        header("Location: employee.php");
                    }else{
                        header("Location: index.php");
                    }               
                    $stmt = null;
                    return $result;                                    
                } else {
                    header("Location: index.php?login=credentials");
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function carReg($pdo){
            $stmt = $pdo->prepare("INSERT INTO car (CarPlate, CarType, CarColour, Phone_Number)
             VALUES(?,?,?,?)");
            $stmt->execute([$this->numberplate,$this->car_type,$this->car_colour,$this->phoneNo]);
            $stmt = null;
            // header("Location: CarReg.php?RegStatus=success"); 
            //header("Location: CarReg.php");
          
          while (
            header("Location: CarReg.php")
            
            
          ){
            echo "<script>alert('Success')</script>";
          }
        }

        public function carDetails($pdo){
            $stmt = $pdo->prepare("SELECT * FROM car");
            $stmt->execute();
            $result = $stmt->fetch();
            $this->carid = $result['carid'];
            $this->numberplate = $result['carplate'];
            $this->car_type = $result['cartype'];
            $this->car_colour= $result['carcolour'];
            $this->timestamp = $result['timestamp'];
        }


        public function carCheckout($pdo){
            // $stmt = $pdo->prepare("INSERT INTO car_checkout (carPlate)
            //  VALUES(?)");
            // $stmt->execute([$this->numberplate]);
            // $stmt = null;
            try{
                $stmt = $pdo->prepare("INSERT INTO car_checkout (carPlate)
             VALUES(?)");
            $stmt->execute([$this->numberplate]);
            $stmt = null;


                $stmt = $pdo->prepare("SELECT time_in FROM car WHERE CarPlate = ?" );
                $stmt->execute([$this->numberplate]);
                $result = $stmt->fetch();
                //$this->carCheckoutPlate = $result['CarPlate'];
                $this->timeIn = $result['time_in'];
                // echo $this->timeIn;
                // echo $this->numberplate;

                $stmt = $pdo->prepare("SELECT time_out FROM car_checkout WHERE carPlate = ?" );
                $stmt->execute([$this->numberplate]);
                $result = $stmt->fetch();
                //$this->carCheckoutPlate = $result['CarPlate'];
                $this->timeOut = $result['time_out'];
               

                $var_time_in = $this->timeIn;
                $var_time_out = $this->timeOut;

                $this->setVarTimeIn($var_time_in);
                $this->setVarTimeOut($var_time_out);

             //   header("Location: checkout.php");
             
                // $difference = (strtotime($var_time_out) - strtotime($var_time_in));
                // $difference_in_hours = $difference/3600;
                // header("Location: checkout.php");
               
             
            }
                catch(PDOException $e) {
                    return $e->getMessage();
                }
    }



        public function logout ($pdo){
            session_destroy();
        }

        /**
         * Get the value of carid
         */ 
        public function getCarid()
        {
                return $this->carid;
        }

        /**
         * Set the value of carid
         *
         * @return  self
         */ 
        public function setCarid($carid)
        {
                $this->carid = $carid;

                return $this;
        }

        /**
         * Get the value of timestamp
         */ 
        public function getTimestamp()
        {
                return $this->timestamp;
        }

    
        public function setTimestamp($timestamp)
        {
                $this->timestamp = $timestamp;

                return $this;
        }
    } 

?>