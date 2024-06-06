<?php
    class User {
        public $name;

        public function __construct($name) {
            $this->name = $name;
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
            header("Access-Control-Allow-Headers: Content-Type, Authorization");
            header('Content-Type: application/json');
        }

        public function authentication() {
            // print_r(json_decode(file_get_contents('php://input'), true));
        
            if (isset($_POST['email'])) {
                $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            } else {
                echo json_encode(['error' => 'Введите почту']);
                exit();
            }

            if (isset($_POST['password'])) {
                $user_password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8', true);
            } else {
                echo json_encode(['error' => 'Введите пароль']);
                exit();
            }

            $host = 'db';
            $dbname = 'website';
            $username = 'user';
            $password = 'password';

            try {
                $dsn = "mysql:host=$host;dbname=$dbname";
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: ". $e->getMessage());
            }

            
            $sql = 'SELECT id FROM `users` WHERE `email`= :email AND `password` = :pass';
            $res = $pdo->prepare($sql);
            $res->execute([
                'email' => $user_email,
                'pass' => md5( $user_password ) 
            ]);

            if ($res->rowCount() > 0) {
                echo json_encode(['result' => 'success']);
            } else {
                echo json_encode(['result' => 'not_found']);
            }

            $pdo = null;
        }

        public function registration_new_persone() {

            if ( isset( $_POST['username'] ) ) {
                $user_login = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8', true );
            } else {
                echo json_encode( ['error' => 'Введите имя'] );
                exit();
            }

            if ( isset( $_POST['email'] ) ) {
                $user_email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
            } else {
                echo json_encode( ['error' => 'Введите почту'] );
                exit();
            }

            if (isset( $_POST['password'] ) ) {
                $user_password = htmlspecialchars( $_POST['password'], ENT_QUOTES, 'UTF-8', true );
            } else {
                echo json_encode( ['error' => 'Введите пароль'] );
                exit();
            }

            $host = 'db';
            $dbname = 'website';
            $username = 'user';
            $password = 'password';

            try {
                $dsn = "mysql:host=$host;dbname=$dbname";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                
            } catch ( PDOException $e ) {
                throw new Exception( "Ошибка соединения с бд: " . $e->getMessage() );
            }

            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            
                $sql = 'INSERT INTO `users`(`username`, `password`, `email`) VALUES (:log, :pass, :eml)';
            
                $res = $pdo->prepare( $sql );
            
                $res->execute([
                    'log' => $user_login,
                    'pass' => md5( $user_password ),
                    'eml' => $user_email
                ]);
            
                echo json_encode( ['result' => 'success'] );
            } catch (PDOException $e) {
                echo json_encode( ['result' => $e->getMessage()] );
            }
            
            $pdo = null;
        }

        public function get_info() {

            if ( isset( $_POST['username'] ) ) {
                $user_name = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8', true );
            }

            $host = 'db';
            $dbname = 'website';
            $username = 'user';
            $password = 'password';

            try {
                $dsn = "mysql:host=$host;dbname=$dbname";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                
            } catch ( PDOException $e ) {
                throw new Exception( "Ошибка соединения с бд: " . $e->getMessage() );
            }

            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

                $sql = 'SELECT id FROM `users` WHERE `username` = :uname';
                $res = $pdo->prepare( $sql );
                $res->execute([ 'uname' => $user_name ]);

                if ($res->rowCount() > 0) {
                    $rows = $res->fetch(PDO::FETCH_OBJ);
                    $user_id = $rows->id;
                } else {
                    echo 'None';
                    exit();
                }

                $user_id = $rows->id;
            
                $sql = 'SELECT `full_name`, `phone` FROM `users_info` WHERE `user_id` = :id';
                $res = $pdo->prepare( $sql );
                $res->execute([ 'id' => $user_id ]);

                $rows = $res->fetch(PDO::FETCH_OBJ);
                
                echo json_encode( $rows );
            } catch (PDOException $e) {
                echo json_encode( ['result' => $e->getMessage()] );
            }
        }

        public function get_history() {

            if ( isset( $_POST['email'] ) ) {
                $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            }

            $host = 'db';
            $dbname = 'website';
            $username = 'user';
            $password = 'password';

            try {
                $dsn = "mysql:host=$host;dbname=$dbname";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                
            } catch ( PDOException $e ) {
                throw new Exception( "Ошибка соединения с бд: " . $e->getMessage() );
            }

            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                $pdo = new PDO( $dsn, $username, $password );
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

                $sql = 'SELECT id FROM `users` WHERE `email` = :email';
                $res = $pdo->prepare( $sql );
                $res->execute([ 'email' => $user_email ]);

                if ($res->rowCount() > 0) {
                    $rows = $res->fetch(PDO::FETCH_OBJ);
                    $user_id = $rows->id;
                } else {
                    echo 'None';
                    exit();
                }

                $user_id = $rows->id;
            
                $sql = 'SELECT `id`, `long_link`, `shorted_link` FROM `users_history` WHERE `user_id` = :id';
                $res = $pdo->prepare( $sql );
                $res->execute([ 'id' => $user_id ]);

                $allRows = [];
                while ($row = $res->fetch(PDO::FETCH_OBJ)) {
                    $allRows[] = $row;
                }
                
                echo json_encode( ['result' => $allRows] );
            } catch (PDOException $e) {
                echo json_encode( ['result' => $e->getMessage()] );
            }
        }
    }