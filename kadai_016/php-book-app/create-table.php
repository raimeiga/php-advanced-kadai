<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <title>PHP+DB</title>
 </head>
 
 <body>
     <p>
         <?php
         $dsn = 'mysql:dbname=php_book_app;host=localhost;charset=utf8mb4';
         $user = 'root';
        // MAMPを利用しているMacユーザーの方は、''ではなく'root'を代入してください
         $password = '';
 
         try {
             $pdo = new PDO($dsn, $user, $password);
 
             // usersテーブルを作成するためのSQL文を変数$sqlに代入する
             $sql = 'CREATE TABLE IF NOT EXISTS books (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY_KEY,
                book_code INT(11) NOT NULL,
                book_name VARCHAR(50) NOT NULL,
                price INT(11) NOT NULL,
                stock_quantity INT(11) NOT NULL,                 
                genre_code INT(11) NOT NULL,
                FOREIGN KEY (genre_code) REFERENCES genres (genre_code),
                updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
             )';


             $sql = 'CREATE TABLE IF NOT EXISTS genres (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY_KEY,
                genre_code INT(11) NOT NULL UNIQUE,
                genre_name VARCHAR(50) NOT NULL
             )';
 
             // SQL文を実行する
             $pdo->query($sql);
         } catch (PDOException $e) {
             exit($e->getMessage());
         }
         ?>
     </p>
 </body>
 
 </html>