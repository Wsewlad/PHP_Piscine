<?php
session_start();

 
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}

if (!$_POST[login] || !$_POST[passwd] || $_POST[submit] !== "OK")
{
	echo ("ERROR\n");
	return (0);
}
$login = $_POST[login];
$passwd = $_POST[passwd];
$_SESSION['servername'] = "localhost";
$_SESSION['username'] = "$login";
$_SESSION['password'] = "$passwd";
$_SESSION['dbname'] = "game";
?>

<?php
// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password']);
// Check connection
if (!$conn) {
	header('Location: ./install.php?error=Incorect login or password');
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE GAME";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<br>

<?php

// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create user table
$sql = "CREATE TABLE Players (
id INT AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(130) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
rank INT DEFAULT 0,
img VARCHAR(700),
email VARCHAR(50) UNIQUE,
reg_date TIMESTAMP UNIQUE
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<br>
<?php
// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pass = hash("sha512", "admin");
$sql = "INSERT INTO Players (login, password, firstname, lastname, email, rank)
VALUES ('admin', '$pass' , 'admin', 'admin' ,'admin@admin.com', 777)";

if (mysqli_query($conn, $sql)) {
    echo "Admin created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql = "CREATE TABLE chat (
node_id INT AUTO_INCREMENT NOT NULL, 
author VARCHAR(30) NOT NULL,
text_node VARCHAR() NOT NULL,
public_time TIMESTAMP,
PRIMARY KEY(node_id)
) ENGINE=InnoDB CHARACTER SET=UTF8";
if (mysqli_query($conn, $sql)) {
    echo 'Table "categories" created successfully<br>';
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Creating  categories
// $sql = "INSERT INTO categories (name, img)
// VALUES ('Бізнес і саморозвиток', 'https://www.bookclub.ua/images/db/goods/44329_66635.jpg'),('Психологія', 'https://www.bookclub.ua/images/db/goods/39414_59878.jpg'),('Історія і факти', 'https://www.bookclub.ua/images/db/goods/39103_59235.jpg')";

// if (mysqli_query($conn, $sql)) {
//     echo 'categories added successfully<br>';
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
// }


// sql to create products table
// $sql = "CREATE TABLE products (
// prod_id INT  AUTO_INCREMENT NOT NULL,
// name VARCHAR(30) NOT NULL ,
// description VARCHAR(1500) NOT NULL,
// stock int (100) NOT NULL,
// img VARCHAR(200),
// price int (100) NOT NULL,
// reg_date TIMESTAMP,
// PRIMARY KEY(prod_id)
// ) ENGINE=InnoDB CHARACTER SET=UTF8";
// if (mysqli_query($conn, $sql)) {
//     echo 'Table "products" created successfully<br>';
// } else {
//     echo "Error creating table: " . mysqli_error($conn) . "<br>";
// }

// Creating  products
// $sql = "INSERT INTO products (name, description, stock, img, price)
// VALUES ('Стратегії геніїв', 'П’ять найважливіших уроків від Білла Ґейтса, Енді Ґроува та Стіва Джобса', '10', 'https://www.bookclub.ua/images/db/goods/44329_66635.jpg', '112.40'),
// ('Компанії майбутнього', '<ul><li>Дослідження, що вражає та надихає</li><li>Перший крок до бізнесу майбутнього</li><li>У ТОП-10 бізнес-книжок на Amazon</li></ul>', '10', 'https://www.bookclub.ua/images/db/goods/k/44308_70812_k.jpg', '135.00'),
// ('Крутість тобі личить', 'Як перестати сумніватися в собі й почати жити на повну', '10', 'https://www.bookclub.ua/images/db/goods/k/45249_70825_k.jpg', '89.90'),
// ('Брама Європи', 'Історія України від скіфських воєн до незалежності', '10', 'https://www.bookclub.ua/images/db/goods/k/39103_59235_k.jpg', '124.90')";

// if (mysqli_query($conn, $sql)) {
//     echo 'test products added successfully<br>';
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
// }

// sql to create connect table
// $sql = "CREATE TABLE connect (
//     inv_id  INT AUTO_INCREMENT NOT NULL,
//     cat_id  INT NOT NULL,
//     prod_id  INT NOT NULL,
//     PRIMARY KEY(inv_id),
//     FOREIGN KEY (cat_id) REFERENCES categories(cat_id),
//     FOREIGN KEY (prod_id) REFERENCES products(prod_id)
//   ) ENGINE=InnoDB CHARACTER SET=UTF8";
// if (mysqli_query($conn, $sql)) {
//     echo 'Table "connect" created successfully<br>';
// } else {
//     echo "Error creating table: " . mysqli_error($conn) . "<br>";
// }

// Creating test connections
// $sql = "INSERT INTO connect (cat_id, prod_id)
// VALUES ('1', '1'),('1' , '2'),('2', '3'),('2', '2'),('3', '4')";

// if (mysqli_query($conn, $sql)) {
//     echo 'test connections added successfully<br>';
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
// }

// sql to create orders table
// $sql = "CREATE TABLE orders (
//     order_id INT AUTO_INCREMENT NOT NULL,
//     user_id  INT NOT NULL,
//     prod_id  INT NOT NULL,
//     prod_quantity  INT NOT NULL,
//     PRIMARY KEY(order_id),
//     FOREIGN KEY (user_id) REFERENCES users(user_id),
//     FOREIGN KEY (prod_id) REFERENCES products(prod_id)
//   ) ENGINE=InnoDB CHARACTER SET=UTF8";
// if (mysqli_query($conn, $sql)) {
//     echo 'Table "orders" created successfully<br>';
// } else {
//     echo "Error creating table: " . mysqli_error($conn) . "<br>";
// }

// mysqli_close($conn);
header('Location: ./index.php');
// $_SESSION['cart'] = NULL;
$_SESSION['logged_in_user'] = NULL;
?>
<br>