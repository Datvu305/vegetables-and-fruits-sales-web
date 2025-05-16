<?php
include("connect.php");

class data_user
{
    private $conn;
    public function login($user, $pass)
    {
        global $conn;
        // Chuẩn bị câu lệnh SQL với tham số đầu vào
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        // Lấy kết quả trả về
        $result = $stmt->get_result();

        // Kiểm tra nếu có người dùng tồn tại
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Xác minh mật khẩu nhập vào với mật khẩu đã mã hóa trong cơ sở dữ liệu
            if ($pass == $row['password']) {
                return $row; // Đăng nhập thành công
            }
        }
        return false; // Login failed
    }
    public function select_user($user)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_User($name, $pass, $email)
    {
        global $conn;
        $sql = "INSERT INTO user (username, password, email) 
                VALUES ('$name', '$pass','$email')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function count_Cart($user)
    {
        global $conn;
        $sql = "SELECT * FROM `cart` where username='$user'";
        $run = mysqli_query($conn, $sql);
        return mysqli_num_rows($run);
    }
    public function insert_contact($name, $email, $phone, $mes)
    {
        global $conn;
        $sql = "INSERT INTO `contact`( `name`, `email`, `phone`, `messenger`) VALUES ('$name','$email','$phone','$mes')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_product()
    {
        global $conn;
        $sql = "select * from product";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_product_cat($category)
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE category = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function select_product_id($id)
    {
        global $conn;
        $sql = "select * from product where id_pro='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_additional_images($id_pro)
    {
        global $conn;
        $sql = "SELECT path FROM image_library WHERE id_pro = '$id_pro'";
        $result = mysqli_query($conn, $sql);
        $images = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $images[] = $row['path'];
            }
        }
        return $images;
    }
    public function update_quantity_pro($id_pro, $quantity)
    {
        global $conn;
        $sql = "UPDATE `product` SET `quantity`='$quantity' WHERE id_pro ='$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_Cart($username)
    {
        global $conn;
        $sql = "SELECT * FROM cart WHERE username='$username'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_Cart($user, $id_pro, $name, $price, $pic, $num, $total)
    {
        global $conn;
        $sql = "INSERT INTO cart(`username`, `id_pro`, `name_pro`, `price`, `picture`, `quantity_order`, `total`) 
                VALUES ('$user','$id_pro','$name','$price','$pic', '$num', '$total')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_Cart($id_pro, $user)
    {
        global $conn;
        $sql = "DELETE FROM cart WHERE id_pro = '$id_pro' and username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_All_Cart($user)
    {
        global $conn;
        $sql = "DELETE FROM cart where username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_cart_item($id, $size)
    {
        global $conn;
        $sql = "SELECT * FROM cart where id_pro='$id' and size ='$size'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_cart_item($id_pro, $newQuantity, $total, $user)
    {
        global $conn;
        $sql = "update cart set quantity_order ='$newQuantity', total='$total' where id_pro='$id_pro' and username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cart_item($id_pro, $username)
    {
        global $conn;
        $sql = "SELECT * FROM cart WHERE username='$username' and id_pro='$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_Order($username, $name, $phone, $add, $tatol, $pay, $status)
    {
        global $conn;
        $sql = "INSERT INTO `order_pro`( `userName`,`name_customer`, `phone`, `address`, `total_order`, `payment`, `status`) 
            values('$username','$name','$phone','$add','$tatol','$pay','$status')";
        $run = mysqli_query($conn, $sql);
        $lastInsertId = mysqli_insert_id($conn);
        return $lastInsertId;
    }
    public function insert_Order_Detail($id_order, $id_pro, $name, $quantity, $total)
    {
        global $conn;
        $sql = "insert into order_detail(id_order,id_pro,name_pro,quantity,total) 
            values('$id_order','$id_pro','$name','$quantity','$total')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function selelect_wishList()
    {
        global $conn;
        $sql = "SELECT * FROM wish_list";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_wishList($id_pro, $image, $name, $price, )
    {
        global $conn;
        $sql = "INSERT INTO `wish_list`(`id_pro`, `image`, `name_pro`, `price`)
         VALUES ('$id_pro','$image','$name','$price')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_wishList($id_pro)
    {
        global $conn;
        $sql = "DELETE FROM  wish_list where id_pro = '$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_address($user, $name, $phone, $address)
    {
        global $conn;
        $sql = "INSERT INTO `address`(`username`, `name_custommer`, `phone`, `address`) VALUES ('$user','$name','$phone','$address')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_address($user)
    {
        global $conn;
        $sql = "SELECT * FROM Address WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_address($user, $id, $name, $phone, $address)
    {
        global $conn;
        $sql = "UPDATE Address SET name='$name',phone='$phone',address='$address' WHERE id_address ='$id' AND username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_address($user, $id)
    {
        global $conn;
        $sql = "DELETE FROM Address WHERE username='$user' AND id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_order($user)
    {
        global $conn;
        $sql = "SELECT * FROM order_pro WHERE userName = '$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_add_id($user, $id)
    {
        global $conn;
        $sql = "SELECT * FROM address WHERE username= '$user' and id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_add_id($user, $id, $name, $phone, $address)
    {
        global $conn;
        $sql = "UPDATE address SET name_custommer='$name', phone='$phone', address='$address' WHERE username= '$user' and id_address='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_add_id($user, $id)
    {
        global $conn;
        $sql = "DELETE FROM address WHERE username= '$user' and id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_pro_name($productName)
    {
        global $conn;
        $sql = "SELECT * FROM `product` WHERE `name_pro` LIKE N'%$productName%';";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function count_products()
    {
        global $conn;
        $sql = "SELECT COUNT(*) AS total FROM product";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    public function select_product_pagination($start, $limit, &$current_page, $sort = '')
{
    global $conn;

    // Tính tổng số sản phẩm
    $sql_count = "SELECT COUNT(*) AS total FROM product";
    $result = mysqli_query($conn, $sql_count);
    $row = mysqli_fetch_assoc($result);
    $total_products = $row['total'];

    // Tính tổng số trang
    $total_pages = ceil($total_products / $limit);

    // Đảm bảo trang không vượt quá giới hạn
    if ($current_page < 1) {
        $current_page = 1;
    } elseif ($current_page > $total_pages) {
        $current_page = $total_pages;
    }

    // Lấy sản phẩm theo phân trang và sắp xếp
    $sql = "SELECT * FROM product";
    if ($sort == 'price_asc') {
        $sql .= " ORDER BY price ASC";
    } elseif ($sort == 'price_desc') {
        $sql .= " ORDER BY price DESC";
    }
    $sql .= " LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $start, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    // Trả về dữ liệu sản phẩm và tổng số trang
    return [
        'products' => $result->fetch_all(MYSQLI_ASSOC),
        'total_pages' => $total_pages
    ];
}
    public function select_cat()
    {
        global $conn;
        $sql = "select * from category";
        $run = mysqli_query($conn, $sql);
        return $run;
    }



    // Phương thức tìm kiếm phân trang
    public function search_products_pagination($productName, $start, $limit, $category = null, $min_price = null, $max_price = null, $sort = '')
    {
        global $conn;
    
        // Chuẩn bị câu truy vấn đếm tổng sản phẩm
        $count_sql = "SELECT COUNT(*) AS total FROM product WHERE name_pro LIKE ?";
        $params = ["%$productName%"];
    
        if ($category !== null) {
            $count_sql .= " AND category = ?";
            $params[] = $category;
        }
    
        if ($min_price !== null) {
            $count_sql .= " AND price >= ?";
            $params[] = $min_price;
        }
    
        if ($max_price !== null) {
            $count_sql .= " AND price <= ?";
            $params[] = $max_price;
        }
    
        $count_stmt = $conn->prepare($count_sql);
        $count_types = str_repeat('s', count($params));
        $count_stmt->bind_param($count_types, ...$params);
        $count_stmt->execute();
        $count_result = $count_stmt->get_result();
        $total_products = $count_result->fetch_assoc()['total'];
    
        // Tính tổng số trang
        $total_pages = ceil($total_products / $limit);
    
        // Chuẩn bị câu truy vấn lấy sản phẩm
        $sql = "SELECT * FROM product WHERE name_pro LIKE ?";
    
        if ($category !== null) {
            $sql .= " AND category = ?";
        }
    
        if ($min_price !== null) {
            $sql .= " AND price >= ?";
        }
    
        if ($max_price !== null) {
            $sql .= " AND price <= ?";
        }
    
        if ($sort == 'price_asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($sort == 'price_desc') {
            $sql .= " ORDER BY price DESC";
        }
    
        $sql .= " LIMIT ?, ?";
    
        // Thêm start và limit vào params
        $params[] = $start;
        $params[] = $limit;
    
        $stmt = $conn->prepare($sql);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return [
            'products' => $result->fetch_all(MYSQLI_ASSOC),
            'total_pages' => $total_pages
        ];
    }
    public function get_pro_name_pagination($productName, $start, $limit)
    {
        $sql = "SELECT * FROM product WHERE name_pro LIKE '%$productName%' LIMIT $start, $limit";
        $result = $this->conn->query($sql);

        $total_sql = "SELECT COUNT(*) as total FROM product WHERE name_pro LIKE '%$productName%'";
        $total_result = $this->conn->query($total_sql);
        $total_row = $total_result->fetch_assoc();
        $total_pages = ceil($total_row['total'] / $limit);

        return [
            'products' => $result,
            'total_pages' => $total_pages
        ];
    }

/*Cmt*/
   
// Thêm vào class data_user
public function insert_comment($id_pro, $username, $content, $rating) {
    global $conn;
    $sql = "INSERT INTO comment (id_pro, username, content, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $id_pro, $username, $content, $rating);
    return $stmt->execute();
}

public function get_comments($id_pro) {
    global $conn;
    $sql = "SELECT c.*, u.email 
            FROM comment c 
            JOIN user u ON c.username = u.username 
            WHERE c.id_pro = ? 
            ORDER BY c.date_comment DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pro);
    $stmt->execute();
    return $stmt->get_result();
}

public function update_comment($id_comment, $username, $content) {
    global $conn;
    $sql = "UPDATE comment SET content = ? 
            WHERE id_comment = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $content, $id_comment, $username);
    return $stmt->execute();
}

public function delete_comment($id_comment, $username) {
    global $conn;
    $sql = "DELETE FROM comment WHERE id_comment = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_comment, $username);
    return $stmt->execute();
}


  
  public function select_blog() {
    global $conn;
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    
    $blogs = array();
    while($row = mysqli_fetch_assoc($result)) {
        $blogs[] = $row;
    }
    
    return $blogs;
}
// Đếm tổng số blog
public function count_blogs() {
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM blogs";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Lấy blog có phân trang
public function select_blog_paginated($offset, $per_page) {
    global $conn;
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT $offset, $per_page";
    $result = mysqli_query($conn, $sql);
    
    $blogs = array();
    while($row = mysqli_fetch_assoc($result)) {
        $blogs[] = $row;
    }
    
    return $blogs;
}
public function get_blog_by_id($id) {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Debug: in ra query và kết quả
    error_log("SQL: $sql, ID: $id");
    
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        error_log(print_r($data, true));
        return $data;
    }
    error_log("No blog found with ID: $id");
    return null;
}
public function select_random_products($exclude_id, $limit = 4)
{
    global $conn;
    $sql = "SELECT * FROM product WHERE id_pro != ? ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $exclude_id, $limit);
    $stmt->execute();
    return $stmt->get_result();
}
public function select_product_cat_pagination($category, $start, $limit, $sort = '')
{
    global $conn;

    // Đếm tổng số sản phẩm trong danh mục
    $count_sql = "SELECT COUNT(*) AS total FROM product WHERE category = ?";
    $count_stmt = $conn->prepare($count_sql);
    $count_stmt->bind_param("s", $category);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $total_products = $count_result->fetch_assoc()['total'];

    // Tính tổng số trang
    $total_pages = ceil($total_products / $limit);

    // Chuẩn bị câu truy vấn lấy sản phẩm
    $sql = "SELECT * FROM product WHERE category = ?";
    if ($sort == 'price_asc') {
        $sql .= " ORDER BY price ASC";
    } elseif ($sort == 'price_desc') {
        $sql .= " ORDER BY price DESC";
    }
    $sql .= " LIMIT ?, ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $category, $start, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    return [
        'products' => $result->fetch_all(MYSQLI_ASSOC),
        'total_pages' => $total_pages
    ];
}

}
?>