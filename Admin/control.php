<?php
    include("connect.php");
    class data_user{
    public function select_admin($user)
    {
        global $conn;
        $sql = "SELECT * FROM `user_admin` WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user()
    {
        global $conn;
        $sql = "SELECT * FROM user";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user_top()
    {
        global $conn;
        $sql = "SELECT * FROM `user` ORDER BY `user`.`id_user` DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function login($user, $pass)
    {
        global $conn;
        $sql = " select * from user_admin where username='$user' and password='$pass'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function get_admin_role($user) {
        global $conn;
        $sql = "SELECT role FROM user_admin WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        if ($run && mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_assoc($run);
            return $row['role'];
        }
        return null; // Trả về null nếu không tìm thấy user
    }
    public function delete_admin($id_admin) {
        global $conn;
        $sql = "DELETE FROM user_admin WHERE id='$id_admin' AND role=2"; // Chỉ xóa nếu role là 2
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    }
class data
{
    public function insert_cate($name_cat, $description)
    {
        global $conn;
        $sql = " INSERT INTO category(name_cat,description)
                            values ('$name_cat','$description')";
        $run = mysqli_query($conn, $sql);
        return $run;

    }
    public function select_contact(){
        global $conn;
        $sql = "SELECT * FROM contact";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_contact($id_con){
        global $conn;
        $sql = "DELETE FROM contact WHERE id_con = '$id_con'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cat()
    {
        global $conn;
        $sql = "select * from category";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cat_id($id)
    {
        global $conn;
        $sql = "select * from category where id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_cat($id, $name_cat, $description)
    {
        global $conn;
        $sql = "UPDATE category set name_cat='$name_cat' ,description ='$description' WHERE id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_category($id)
    {
        global $conn;
        $sql = "delete from category where id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    public function select_top_products() {
        global $conn;
        $sql = "SELECT p.id_pro, p.name_pro, p.image, SUM(od.quantity) as total_sold
                FROM product p
                JOIN order_detail od ON p.id_pro = od.id_pro
                GROUP BY p.id_pro, p.name_pro, p.image
                ORDER BY total_sold DESC
                LIMIT 10";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_product($name, $quantity, $pic, $cate, $date, $price,$price_sale, $description)
    {
        global $conn;
        if ($price_sale === null || $price_sale === "") {
            $sql = "INSERT INTO product(name_pro, quantity, image, category, date, price, price_sale, description)
                            values('$name','$quantity','$pic','$cate','$date','$price',null,'$description')";
        } else {
            $sql = "INSERT INTO product(name_pro, quantity, image, category, date, price, price_sale, description)
                            values('$name','$quantity','$pic','$cate','$date','$price','$price_sale','$description')";
        }
        $run = mysqli_query($conn, $sql);
        $lastInsertId = mysqli_insert_id($conn);
        return $lastInsertId;
    }
    public function select_product()
    {
        global $conn;
        $sql = "select * from product";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_product_id($id)
    {
        global $conn;
        $sql = "select * from product where id_pro='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_product($id)
    {
        global $conn;
        $sql = "delete from product where id_pro='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_product($id, $name, $quantity, $image, $category, $date, $price,$price_sale, $description)
    {
        global $conn;
        if ($price_sale === null || $price_sale === "") {
            $sql = "update product set name_pro='$name', quantity='$quantity', image='$image', category='$category', date='$date', price='$price',price_sale=null, description='$description' where id_pro='$id'";
        }else{
            $sql = "update product set name_pro='$name', quantity='$quantity', image='$image', category='$category', date='$date', price='$price',price_sale='$price_sale', description='$description' where id_pro='$id'";
        }
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_image($id_pro, $path)
    {
        global $conn;
        $sql = "INSERT INTO image_library(id_pro, path) VALUES ('$id_pro','$path')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_image()
    {
        global $conn;
        $sql = "SELECT * FROM `image_library`";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_image($id_pro){
        global $conn;
        $sql = "DELETE FROM `image_library` WHERE id_pro = $id_pro";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_order(){
        global $conn;
        $sql = "SELECT * FROM order_pro";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function order_detail( $id_order ){
        global $conn;
        $sql = "SELECT * FROM order_detail WHERE id_order='$id_order'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function order_status($id_order, $status)
    {
        global $conn;
        $sql = "UPDATE order_pro SET status='$status' WHERE id_order='$id_order'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_sale(){
        global $conn;
        $sql = "SELECT * FROM `order_pro` WHERE status = N'Hoàn thành'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function revenue(){
        global $conn;
        $sql = "SELECT month(date) as month, SUM(total_order) as total 
                FROM order_pro 
                WHERE status = N'Hoàn thành' 
                GROUP BY month(date)";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
        // Hàm lấy danh sách blog cho admin
        public function select_blog_admin() {
            global $conn;
            $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);
            
            $blogs = array();
            while($row = mysqli_fetch_assoc($result)) {
                $blogs[] = $row;
            }
            return $blogs;
        }
        
        // Hàm thêm blog mới
        public function insert_blog($title, $content, $category, $image_url = '') {
            global $conn;
            $title = mysqli_real_escape_string($conn, $title);
            $content = mysqli_real_escape_string($conn, $content);
            $category = mysqli_real_escape_string($conn, $category);
            $image_url = mysqli_real_escape_string($conn, $image_url);
            
            $sql = "INSERT INTO blogs (title, content, category_blog, image_url, created_at) 
                    VALUES ('$title', '$content', '$category', '$image_url', NOW())";
            
            return mysqli_query($conn, $sql);
        }
        
        // Hàm lấy thông tin 1 blog
        public function get_blog($id) {
            global $conn;
            $id = intval($id);
            $sql = "SELECT * FROM blogs WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            return mysqli_fetch_assoc($result);
        }
        
        // Hàm cập nhật blog
        public function update_blog($id, $title, $content, $category, $image_url = null) {
            global $conn;
            $id = intval($id);
            $title = mysqli_real_escape_string($conn, $title);
            $content = mysqli_real_escape_string($conn, $content);
            $category = mysqli_real_escape_string($conn, $category);
            
            $sql = "UPDATE blogs SET 
                    title = '$title',
                    content = '$content',
                    category_blog = '$category'";
            
            if ($image_url) {
                $image_url = mysqli_real_escape_string($conn, $image_url);
                $sql .= ", image_url = '$image_url'";
            }
            
            $sql .= " WHERE id = $id";
            
            return mysqli_query($conn, $sql);
        }
        
        // Hàm xóa blog
        public function delete_blog($id) {
            global $conn;
            $id = intval($id);
            $sql = "DELETE FROM blogs WHERE id = $id";
            return mysqli_query($conn, $sql);
        }


        public function insert_blog_image($blog_id, $image_url) {
            global $conn;
            $sql = "INSERT INTO blog_images (blog_id, image_url) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $blog_id, $image_url);
            return $stmt->execute();
        }
        public function delete_user($id_user, $admin_role) {
            if ($admin_role != 1) {
                return false; // Chỉ Admin cấp 1 mới có thể xóa user
            }
            global $conn;
            $sql = "DELETE FROM user WHERE id_user = '$id_user'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function select_user()
    {
        global $conn;
        $sql = "SELECT * FROM user";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
?>