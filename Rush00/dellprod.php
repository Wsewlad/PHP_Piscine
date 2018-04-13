<?php 
session_start();

// Create connection
$conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR1\n");
	return (0);
}
if (!$_POST[name] || $_POST[submit] !== "dell product")
{
	echo ("ERROR3\n");
	return (0);
}

$name = mysqli_real_escape_string($conn, $_POST[name]);

$sql = "SELECT name, prod_id FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row['name'] == $name)
        {
             $n = $row['prod_id'];
             $sql1 = "DELETE FROM connect WHERE prod_id=$n";
             $sql2 = "DELETE FROM products WHERE prod_id=$n";

                if ($_SESSION['cart'] == NULL)
                {
                    $exists = 0;
                    $i = 0;
                    foreach ($_SESSION['cart'] as $product)
                    {
                        if ($product['id'] == $n)
                        {
                            $exists = 1;
                            break;
                        }
                        $i++;
                    }
                    if ($exists == 1)
                    {
                        $_SESSION['cart'][$i] = NULL;
                    }
                }

             if (mysqli_query($conn, $sql1)) {
                $k = 1;
            }
            mysqli_query($conn, $sql2);
        }
    }
}
if ($k == 1) {
   header("Location: index.php?c=profile&sd=Product deleted successfully");
} else {
   header("Location: index.php?c=profile&sd=Product Category does not exist");
}