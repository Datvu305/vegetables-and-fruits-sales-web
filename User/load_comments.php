<?php
session_start();
include("connect.php");
include("control.php");

if (!isset($_GET['id_pro'])) {
    die('Thiếu thông tin sản phẩm');
}

$data = new data_user();
$id_pro = (int)$_GET['id_pro'];
$comments = $data->get_comments($id_pro);

if ($comments->num_rows > 0) {
    while ($comment = $comments->fetch_assoc()) {
        ?>
        <div class="comment-item" data-id="<?php echo $comment['id_comment']; ?>">
            <div class="comment-header">
                <span class="comment-user"><?php echo $comment['username']; ?></span>
                <span class="comment-date"><?php echo date('d/m/Y H:i', strtotime($comment['date_comment'])); ?></span>
            </div>
            <div class="comment-rating">
                <?php 
                for ($i = 1; $i <= 5; $i++) {
                    echo $i <= $comment['rating'] ? '★' : '☆';
                }
                ?>
            </div>
            <div class="comment-content"><?php echo htmlspecialchars($comment['content']); ?></div>
            
            <?php if (isset($_SESSION['user']) && $_SESSION['user'] == $comment['username']) { ?>
            <div class="comment-actions">
                <button class="btn btn-sm btn-outline-primary edit-comment-btn">Sửa</button>
                <button class="btn btn-sm btn-outline-danger delete-comment-btn">Xóa</button>
            </div>
            <?php } ?>
        </div>
        <?php
    }
} else {
    echo '<p>Chưa có bình luận nào cho sản phẩm này.</p>';
}
?>