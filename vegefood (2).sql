-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2025 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vegefood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `name_custommer` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id_address`, `username`, `name_custommer`, `phone`, `address`) VALUES
(4, 'dat', 'vu datdd', 1678843243, 'Hà Nội '),
(5, 'dat', 'Vu Dat2', 42332423, '12, Đại sơn, Thái Nguyên'),
(6, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội'),
(7, 'hung', 'Vũ Hùng', 838383, '123, Trung văn, Hà nội'),
(9, 'manh', 'Vũ Mạnh', 321435321, '213, Nam từ liêm , Hà Nội'),
(10, 'duong', 'vu duong', 45354, '112, nam từ liêm, hà nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_blog` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `category_blog`, `created_at`, `image_url`) VALUES
(12, 'Khu du lịch Sun World Bà Nà Hills', 'Đà Nẵng là thiên đường ẩm thực với nhiều món ngon đậm chất miền Trung. Dưới đây là một số món đặc sản nổi bật và địa chỉ gợi ý để bạn thưởng thức khi ghé thăm thành phố này, đặc biệt phù hợp khi bạn vừa tham quan Cầu Vàng tại Bà Nà Hills:\r\n\r\n1. Mì Quảng\r\nMô tả: Món mì đặc trưng với sợi mì dai, nước lèo đậm đà, topping đa dạng như tôm, thịt heo, gà, trứng, kèm rau sống, bánh tráng và đậu phộng rang.\r\nĐịa chỉ gợi ý:\r\nMì Quảng Bà Mua: 19-21 Trần Bình Trọng, Hải Châu, Đà Nẵng\r\nMì Quảng Thi Gia Truyền: 251 Hoàng Diệu, Hải Châu, Đà Nẵng\r\nMì Quảng 1A: 1 Hải Phòng, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 30.000 - 60.000 VNĐ/tô.\r\n2. Bún Mắm Nêm\r\nMô tả: Bún tươi kết hợp thịt heo quay, nem chua, rau sống, mít non, đậu phộng rang, và mắm nêm đặc trưng, tạo nên hương vị đậm đà, cay nồng.\r\nĐịa chỉ gợi ý:\r\nBún Mắm Bà Vân: K23/14 Trần Kế Xương, Hải Châu, Đà Nẵng\r\nBún Mắm Ngọc: 20 Đoàn Thị Điểm, Hải Châu, Đà Nẵng\r\nBún Mắm Quán Dì Liên: 52 Trần Bình Trọng, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 20.000 - 40.000 VNĐ/tô.\r\n3. Bánh Tráng Cuốn Thịt Heo\r\nMô tả: Thịt heo luộc thái mỏng, cuốn cùng rau sống, bánh tráng, chấm mắm nêm thơm lừng, mang đến trải nghiệm hài hòa giữa vị béo, tươi mát và đậm đà.\r\nĐịa chỉ gợi ý:\r\nQuán Bà Hường: 35/2 Hàm Nghi, Hải Châu, Đà Nẵng\r\nQuán Mậu: 35 Đỗ Thúc Tịnh, Hải Châu, Đà Nẵng\r\nBánh Tráng Trần: 4 Lê Duẩn, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 50.000 - 80.000 VNĐ/phần.\r\n4. Bánh Xèo và Nem Lụi\r\nMô tả: Bánh xèo giòn rụm với nhân tôm, thịt, giá đỗ; nem lụi nướng thơm phức, ăn kèm rau sống và nước chấm đậu phộng béo ngậy.\r\nĐịa chỉ gợi ý:\r\nBánh Xèo Bà Dưỡng: K280/23 Hoàng Diệu, Hải Châu, Đà Nẵng\r\nBánh Xèo Tôm Nhảy Năm Hiền: 46 Phan Thanh, Thanh Khê, Đà Nẵng\r\nBánh Xèo Cô Mười: Châu Thị Vĩnh Tế, Ngũ Hành Sơn, Đà Nẵng\r\nGiá tham khảo: 50.000 - 100.000 VNĐ/phần cho 2 người.\r\n5. Bún Chả Cá\r\nMô tả: Nước dùng ngọt thanh từ cá tươi, rau củ, kết hợp chả cá dai thơm, ăn kèm rau sống và chút mắm ruốc hoặc ớt.\r\nĐịa chỉ gợi ý:\r\nBún Chả Cá 109: 109 Nguyễn Chí Thanh, Hải Châu, Đà Nẵng\r\nBún Chả Cá Ông Tạ: 113A Nguyễn Chí Thanh, Hải Châu, Đà Nẵng\r\nBún Chả Cá Hờn: 86 Quang Trung, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 25.000 - 50.000 VNĐ/tô.\r\n6. Gỏi Cá Nam Ô\r\nMô tả: Cá tươi trộn rau thơm, chuối chát, nước mắm ớt, có hai loại gỏi ướt và gỏi khô, kích thích vị giác nhưng hơi kén người ăn vì là cá sống.\r\nĐịa chỉ gợi ý:\r\nGỏi Cá Thanh Hương: 1029 Nguyễn Lương Bằng, Liên Chiểu, Đà Nẵng\r\nGỏi Cá Sáu Hào: 232 Trần Cao Vân, Thanh Khê, Đà Nẵng\r\nGỏi Cá Nam Ô18⁊ Bà Mỳ: 11 Mai Lão Bạng, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 50.000 - 100.000 VNĐ/phần.\r\n7. Bê Thui Cầu Mống\r\nMô tả: Thịt bê thui chín tới, mềm ngọt, da vàng giòn, cuốn bánh tráng với rau sống, chuối chát, khế chua, chấm mắm nêm cay.\r\nĐịa chỉ gợi ý:\r\nBê Thui Cầu Mống Lão Hạc: 56 Lê Tấn Trung, Sơn Trà, Đà Nẵng\r\nBê Thui Số 3 Tuệ Tĩnh: 3 Tuệ Tĩnh, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 100.000 - 200.000 VNĐ/phần cho 2-3 người.\r\n8. Bánh Bèo, Bánh Nậm, Bánh Lọc\r\nMô tả: Các loại bánh truyền thống miền Trung: bánh bèo mềm mịn topping tôm khô, bánh nậm nhân tôm thịt gói lá, bánh lọc trong suốt nhân tôm.\r\nĐịa chỉ gợi ý:\r\nQuán Bà Bé: 100 Hoàng Văn Thụ, Hải Châu, Đà Nẵng\r\nQuán Tâm: 291 Nguyễn Chí Thanh, Hải Châu, Đà Nẵng\r\nGiá tham khảo: 10.000 - 20.000 VNĐ/chén, thường bán theo khay (8-10 chén).\r\n9. Hải Sản Tươi Sống\r\nMô tả: Hải sản tươi ngon như tôm, mực, ghẹ, hàu, chế biến đa dạng (nướng, hấp, rang me). Phù hợp cho bữa tối sau khi tham quan Bà Nà Hills.\r\nĐịa chỉ gợi ý:\r\nHải Sản Năm Đảnh: Đường biển, Sơn Trà, Đà Nẵng\r\nHải Sản Bà Thôi: Lô 10-11 Hoàng Sa, Sơn Trà, Đà Nẵng\r\nThơ Ý Seafood: Ngã 3 Trương Định & Hoàng Sa, Sơn Trà, Đà Nẵng\r\nGiá tham khảo: 100.000 - 300.000 VNĐ/kg tùy loại hải sản.                                                            ', 'Du lịch', '2025-04-07 03:41:51', 'bl6.png'),
(14, 'Món  ngon', '\r\nCách Nấu Canh Rau Củ Thập Cẩm Thơm Ngon, Bổ Dưỡng Tại Nhà\r\n\r\nCanh rau củ thập cẩm là một món ăn đơn giản, dễ làm nhưng lại vô cùng bổ dưỡng, phù hợp cho mọi bữa cơm gia đình. Với sự kết hợp đa dạng của các loại rau củ tươi ngon, món canh này không chỉ cung cấp nhiều vitamin mà còn mang lại hương vị ngọt thanh, dễ ăn. Nếu bạn đang tìm kiếm một công thức để làm mới thực đơn hàng ngày, hãy cùng mình khám phá cách nấu canh rau củ thập cẩm siêu ngon để đăng lên blog nhé!\r\n\r\nNguyên liệu chuẩn bị (cho 4 người ăn)\r\n1 củ cà rốt\r\n1 củ khoai tây\r\n1 bắp ngô ngọt\r\n100g đậu Hà Lan (hoặc đậu cô-ve)\r\n1 củ su hào\r\n100g nấm rơm (hoặc nấm kim châm)\r\n1 bó rau cải xanh (hoặc cải thìa)\r\n1 củ gừng nhỏ (khoảng 2cm)\r\n1 muỗng canh dầu ăn\r\n1 muỗng cà phê muối\r\n1/2 muỗng cà phê hạt nêm (tùy chọn)\r\n1 muỗng cà phê nước mắm\r\n1 ít tiêu xay\r\nHành lá, ngò rí (rau mùi) để trang trí\r\nCách nấu canh rau củ thập cẩm\r\nBước 1: Sơ chế nguyên liệu\r\nRửa sạch rau củ: Gọt vỏ cà rốt, khoai tây, su hào, sau đó rửa sạch. Cắt cà rốt và su hào thành miếng vừa ăn (hình vuông hoặc thái lát mỏng tùy sở thích). Khoai tây cắt khối nhỏ để dễ chín.\r\nNgô ngọt: Tách hạt hoặc cắt khúc tùy ý. Nếu muốn nước canh ngọt hơn, bạn có thể để nguyên bắp và cắt thành từng khoanh dày khoảng 2-3cm.\r\nĐậu Hà Lan: Rửa sạch, bỏ xơ (nếu dùng đậu cô-ve). Nấm rơm ngâm nước muối loãng khoảng 10 phút, rửa sạch, để ráo.\r\nRau cải xanh: Nhặt và rửa sạch, cắt khúc vừa ăn.\r\nGừng: Cạo vỏ, đập dập hoặc thái lát mỏng.\r\nHành lá, ngò rí: Rửa sạch, thái nhỏ để rắc lên canh khi hoàn thành.\r\nBước 2: Nấu nước dùng\r\nĐun sôi khoảng 1,5 lít nước trong nồi lớn. Thêm ngô ngọt và gừng vào để tạo vị ngọt tự nhiên cho nước canh. Nấu ở lửa vừa khoảng 10 phút.\r\nSau khi nước dùng đã ngọt, thêm cà rốt và su hào vào nồi, đậy nắp và nấu thêm 5-7 phút để rau củ bắt đầu mềm.\r\nBước 3: Nấu canh rau củ\r\nCho khoai tây vào nồi, tiếp tục nấu khoảng 5 phút. Lúc này, bạn có thể nêm 1 muỗng cà phê muối và 1/2 muỗng cà phê hạt nêm để canh thấm vị.\r\nThêm đậu Hà Lan và nấm rơm vào, khuấy nhẹ và nấu thêm 3 phút.\r\nCuối cùng, cho rau cải xanh vào nồi, nấu thêm 1-2 phút đến khi rau chín mềm nhưng vẫn giữ được màu xanh tươi. Nêm thêm 1 muỗng cà phê nước mắm để tăng hương vị. Tắt bếp.\r\nBước 4: Hoàn thiện và trình bày\r\nRắc ít tiêu xay, hành lá và ngò rí lên bề mặt canh để tạo mùi thơm và màu sắc bắt mắt.\r\nMúc canh ra tô lớn hoặc chia đều vào bát nhỏ, dùng nóng với cơm trắng hoặc ăn kèm các món mặn khác.\r\nMẹo nhỏ để món canh rau củ ngon hơn\r\nChọn nguyên liệu tươi: Rau củ tươi sẽ giúp nước canh ngọt và giữ được độ giòn. Bạn có thể thay đổi loại rau củ theo mùa hoặc sở thích, như thêm bí đỏ, bông cải xanh, hoặc củ cải trắng.\r\nTắt bếp đúng lúc: Không nấu rau xanh quá lâu để tránh mất màu sắc và vitamin.\r\nThêm protein: Nếu muốn món canh thêm phần đậm đà, bạn có thể cho thêm tôm, thịt heo băm hoặc đậu phụ vào nấu cùng.\r\nĐiều chỉnh vị: Tùy khẩu vị, bạn có thể thêm chút tỏi phi thơm hoặc vài lát ớt tươi để tăng hương vị.\r\nLý do bạn nên thử món này\r\nCanh rau củ thập cẩm không chỉ dễ làm mà còn là lựa chọn lý tưởng cho những ngày muốn ăn nhẹ nhàng, thanh đạm. Món ăn này phù hợp với mọi lứa tuổi, từ trẻ nhỏ đến người lớn tuổi, và đặc biệt tốt cho sức khỏe nhờ hàm lượng chất xơ và vitamin dồi dào. Hơn nữa, màu sắc bắt mắt của rau củ sẽ khiến bữa cơm gia đình thêm phần hấp dẫn.\r\n\r\nHãy thử nấu món canh này và chia sẻ thành quả trên blog của bạn nhé! Nếu bạn có thêm biến tấu nào thú vị, đừng quên kể lại để mình học hỏi thêm nha! ????', 'nấu ăn', '2025-04-13 15:12:36', 'blog_1744557156_67fbd4649f31e.png'),
(22, 'Lợi Ích Của Rau Củ Quả Đối Với Sức Khỏe Và Lối Sống', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\">Rau củ quả là thành phần không thể thiếu trong bữa ăn uống lành mạnh. Chúng không chỉ cung cấp chất dinh dưỡng thiết yếu mà còn mang lại nhiều lợi ích cho sức khỏe thể chất, tinh thần và môi trường. Dưới đây là những lợi ích nổi bật của việc bổ sung rau củ quả vào bữa ăn hàng ngày.</p><h2 dir=\"ltr\">1. Cung Cấp Dinh Dưỡng Đa Dạng</h2><p dir=\"ltr\">Rau củ quả là nguồn cung cấp vitamin và khoáng chất dồi dào, giúp cơ thể hoạt động hiệu quả:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Vitamin A</strong> (có trong cà rốt, bí đỏ): Tốt cho thị lực và hệ miễn dịch.</p></li><li><p dir=\"ltr\"><strong>Vitamin C</strong> (có trong cam, ớt chuông, cải xanh): Tăng cường đề kháng, hỗ trợ làn da khỏe mạnh.</p></li><li><p dir=\"ltr\"><strong>Kali</strong> (có trong chuối, khoai lang): Giúp điều hòa huyết áp.</p></li><li><p dir=\"ltr\"><strong>Chất xơ</strong> (có trong bông cải xanh, táo): Hỗ trợ tiêu hóa, giảm nguy cơ táo bón.</p></li></ul><h2 dir=\"ltr\">2. Hỗ Trợ Phòng Ngừa Bệnh Tật</h2><p dir=\"ltr\">Ăn nhiều rau củ quả giúp giảm nguy cơ mắc các bệnh mãn tính:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Bệnh tim mạch</strong>: Chất xơ và chất chống oxy hóa trong rau củ như cải bó xôi, cà chua giúp giảm cholesterol và bảo vệ tim.</p></li><li><p dir=\"ltr\"><strong>Ung thư</strong>: Một số hợp chất như lycopene trong cà chua hoặc sulforaphane trong bông cải xanh có khả năng ngăn ngừa ung thư.</p></li><li><p dir=\"ltr\"><strong>Tiểu đường loại 2</strong>: Rau củ ít đường và giàu chất xơ giúp kiểm soát lượng đường trong máu.</p></li></ul><h2 dir=\"ltr\">3. Hỗ Trợ Kiểm Soát Cân Nặng</h2><p dir=\"ltr\">Rau củ quả thường ít calo nhưng giàu chất xơ, giúp bạn no lâu hơn và giảm cảm giác thèm ăn. Ví dụ:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Một bát salad rau xanh chỉ chứa khoảng 50-100 calo nhưng cung cấp nhiều dinh dưỡng.</p></li><li><p dir=\"ltr\">Các loại củ như khoai lang cung cấp năng lượng bền vững, phù hợp cho người ăn kiêng.</p></li></ul><h2 dir=\"ltr\">4. Cải Thiện Sức Khỏe Tinh Thần</h2><p dir=\"ltr\">Chế độ ăn giàu rau củ quả có thể cải thiện tâm trạng và giảm căng thẳng:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Folate</strong> trong rau lá xanh như rau bina giúp sản sinh serotonin, một chất dẫn truyền thần kinh liên quan đến hạnh phúc.</p></li><li><p dir=\"ltr\">Các nghiên cứu chỉ ra rằng ăn 5-7 khẩu phần rau củ mỗi ngày giúp giảm nguy cơ trầm cảm.</p></li></ul><h2 dir=\"ltr\">5. Tốt Cho Da Và Lão Hóa</h2><p dir=\"ltr\">Chất chống oxy hóa trong rau củ quả như beta-carotene (cà rốt) và vitamin E (bơ) giúp bảo vệ da khỏi tác hại của tia UV và làm chậm quá trình lão hóa. Nước trong rau củ (như dưa leo, cần tây) cũng giữ cho da ẩm và căng mọng.</p><h2 dir=\"ltr\">6. Thân Thiện Với Môi Trường</h2><p dir=\"ltr\">So với các loại thực phẩm khác như thịt, rau củ quả có tác động môi trường thấp hơn:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Trồng rau củ tiêu tốn ít nước và năng lượng hơn chăn nuôi.</p></li><li><p dir=\"ltr\">Lựa chọn rau củ theo mùa giúp giảm lượng khí thải từ vận chuyển.</p></li></ul><h2 dir=\"ltr\">7. Dễ Chế Biến Và Linh Hoạt</h2><p dir=\"ltr\">Rau củ quả có thể được chế biến thành nhiều món ăn đa dạng, từ món chay như nộm rau muống, canh bí đỏ, đến các món kết hợp như thịt bò xào rau củ. Bạn có thể ăn sống (salad), hấp, xào, hoặc ép nước để phù hợp với khẩu vị.</p><h2 dir=\"ltr\">Mẹo Tăng Cường Rau Củ Quả Trong Chế Độ Ăn</h2><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Thêm rau vào món ăn chính: Ví dụ, cho rau bina vào sinh tố hoặc cà rốt bào vào bánh mì.</p></li><li><p dir=\"ltr\">Thử các món chay 1-2 ngày/tuần để khám phá công thức mới.</p></li><li><p dir=\"ltr\">Mua rau củ theo mùa để đảm bảo độ tươi ngon và tiết kiệm chi phí.</p></li><li><p dir=\"ltr\">Bảo quản đúng cách: Rau lá xanh để trong túi zip, củ quả để nơi khô ráo.</p></li></ul>                                                            ', 'Lối sống', '2025-04-28 03:18:43', 'blog_1745810323_680ef393800cf.png');
INSERT INTO `blogs` (`id`, `title`, `content`, `category_blog`, `created_at`, `image_url`) VALUES
(23, 'Rau Muống - Nữ Hoàng Rau Xanh Trong Bữa Cơm Việt', '<div><p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\"><strong>Rau muống</strong> là một trong những loại rau quen thuộc nhất trong mâm cơm gia đình Việt Nam. Với vị giòn ngọt, dễ chế biến và giá trị dinh dưỡng cao, rau muống không chỉ là thực phẩm mà còn là biểu tượng của sự dân dã, gần gũi. Tại [tên cửa hàng của bạn], chúng tôi cung cấp rau muống sạch, được trồng tự nhiên, không hóa chất, đảm bảo tươi ngon từ vườn đến bàn ăn.</p>\r\n<h4 dir=\"auto\" class=\"\">Lợi Ích Dinh Dưỡng Của Rau Muống</h4>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\">Rau muống không chỉ ngon mà còn mang lại nhiều lợi ích sức khỏe:</p>\r\n<ul dir=\"auto\" class=\"marker:text-secondary\">\r\n<li class=\"break-words\"><strong>Giàu vitamin và khoáng chất</strong>: Rau muống chứa vitamin A, C, sắt và canxi, giúp tăng cường thị lực, hỗ trợ hệ miễn dịch và tốt cho xương.</li>\r\n<li class=\"break-words\"><strong>Chất xơ dồi dào</strong>: Hỗ trợ tiêu hóa, ngăn ngừa táo bón và giúp bạn no lâu hơn.</li>\r\n<li class=\"break-words\"><strong>Chống oxy hóa</strong>: Các hợp chất trong rau muống giúp bảo vệ cơ thể khỏi tác hại của gốc tự do, làm chậm lão hóa.</li>\r\n<li class=\"break-words\"><strong>Ít calo</strong>: Phù hợp cho người muốn kiểm soát cân nặng (khoảng 25 calo/100g).</li>\r\n</ul>\r\n<h4 dir=\"auto\" class=\"\">Vì Sao Chọn Rau Muống Sạch Từ</h4>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\">Rau muống của chúng tôi được trồng ở các trang trại đạt chuẩn, không sử dụng thuốc trừ sâu hóa học. Mỗi cọng rau đều tươi xanh, giòn, đảm bảo chất lượng cao nhất khi đến tay bạn. Dù là món xào, luộc hay nấu canh, rau muống từ cửa hàng chúng tôi luôn giữ được vị ngọt tự nhiên và độ tươi ngon.</p>\r\n<h4 dir=\"auto\" class=\"\">Công Thức: Rau Muống Xào Tỏi</h4>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\">Đây là món ăn đơn giản, nhanh gọn nhưng đậm đà hương vị, phù hợp với mọi bữa cơm gia đình.</p>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\"><strong>Nguyên liệu</strong> (cho 2-3 người):</p>\r\n<ul dir=\"auto\" class=\"marker:text-secondary\">\r\n<li class=\"break-words\">1 bó rau muống tươi (khoảng 300-400g)</li>\r\n<li class=\"break-words\">3-4 tép tỏi (băm nhuyễn)</li>\r\n<li class=\"break-words\">2 thìa canh dầu ăn</li>\r\n<li class=\"break-words\">1 thìa cà phê nước mắm</li>\r\n<li class=\"break-words\">Muối, tiêu (tùy khẩu vị)</li>\r\n</ul>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\"><strong>Cách làm</strong>:</p>\r\n<ol dir=\"auto\" class=\"marker:text-secondary\">\r\n<li class=\"break-words\"><strong>Sơ chế rau muống</strong>: Nhặt bỏ phần lá úa và gốc già, rửa sạch rau dưới vòi nước để loại bỏ bụi bẩn. Ngâm rau trong nước muối loãng 5 phút, sau đó để ráo.</li>\r\n<li class=\"break-words\"><strong>Xào rau</strong>: Đun nóng chảo, cho dầu ăn vào, phi thơm tỏi trên lửa vừa đến khi vàng nhẹ. Cho rau muống vào, đảo nhanh tay trên lửa lớn để rau giữ độ giòn.</li>\r\n<li class=\"break-words\"><strong>Nêm gia vị</strong>: Thêm nước mắm, chút muối và tiêu, đảo đều khoảng 1-2 phút cho rau chín nhưng vẫn xanh. Tắt bếp.</li>\r\n<li class=\"break-words\"><strong>Trình bày</strong>: Cho rau ra đĩa, rắc thêm chút tiêu nếu thích. Dùng nóng với cơm trắng.</li>\r\n</ol>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\"><strong>Mẹo nhỏ</strong>:</p>\r\n<ul dir=\"auto\" class=\"marker:text-secondary\">\r\n<li class=\"break-words\">Chọn rau muống có lá xanh mướt, cọng mũm mĩm, không quá già để món xào giòn ngon.</li>\r\n<li class=\"break-words\">Để rau xanh đẹp, bạn có thể chần sơ rau qua nước sôi trước khi xào.</li>\r\n<li class=\"break-words\">Thêm vài lát ớt nếu muốn món ăn cay nhẹ.</li>\r\n</ul>\r\n<h4 dir=\"auto\" class=\"\">Rau Muống Trong Ẩm Thực Việt</h4>\r\n<p dir=\"auto\" class=\"break-words\" style=\"white-space-collapse: preserve;\">Ngoài xào tỏi, rau muống còn xuất hiện trong nhiều món ngon khác như:</p>\r\n<ul dir=\"auto\" class=\"marker:text-secondary\">\r\n<li class=\"break-words\"><strong>Rau muống luộc</strong>: Chấm nước mắm tỏi ớt, giữ nguyên vị ngọt tự nhiên.</li>\r\n<li class=\"break-words\"><strong>Nộm rau muống</strong>: Trộn với tôm khô, hành phi, nước mắm chua ngọt.</li>\r\n<li class=\"break-words\"><strong>Canh rau muống</strong>: Nấu với tôm, cua hoặc thịt bằm, là món canh giải nhiệt mùa hè.<img src=\"data:image/png;base64,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                                                            ', 'Rau ', '2025-04-28 03:25:20', 'bb6245de4422e6b1dd47ced0232e9beb.png');
INSERT INTO `blogs` (`id`, `title`, `content`, `category_blog`, `created_at`, `image_url`) VALUES
(24, 'Cà Rốt - Siêu Thực Phẩm Cho Sức Khỏe', '<h2 dir=\"ltr\" data-pm-slice=\"1 3 []\"></h2><p dir=\"ltr\"><strong>Giới thiệu</strong>: Cà rốt không chỉ là loại củ quen thuộc trong bếp Việt mà còn là “ngôi sao” dinh dưỡng nhờ màu cam rực rỡ và hương vị ngọt thanh. Tại [tên cửa hàng], cà rốt được trồng hữu cơ, đảm bảo tươi ngon, giòn ngọt, phù hợp cho mọi món ăn từ salad đến canh.</p><p dir=\"ltr\"><strong>Lợi ích dinh dưỡng</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Beta-carotene</strong>: Chuyển hóa thành vitamin A, tốt cho mắt và làn da.</p></li><li><p dir=\"ltr\"><strong>Chất xơ</strong>: Hỗ trợ tiêu hóa, giảm cholesterol.</p></li><li><p dir=\"ltr\"><strong>Vitamin K1 và kali</strong>: Tăng cường sức khỏe xương và tim mạch.</p></li></ul><p dir=\"ltr\"><strong>Mẹo chọn mua</strong>: Chọn cà rốt có màu cam đậm, vỏ mịn, không nứt, cầm chắc tay. Tránh củ mềm hoặc có đốm đen.</p><p dir=\"ltr\"><strong>Công thức: Salad cà rốt nho khô</strong></p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 2 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">2 củ cà rốt (khoảng 200g)</p></li><li><p dir=\"ltr\">50g nho khô</p></li><li><p dir=\"ltr\">2 thìa canh mayonnaise (hoặc sữa chua không đường)</p></li><li><p dir=\"ltr\">1 thìa canh nước cốt chanh, muối, tiêu</p></li></ul></li><li><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Gọt vỏ cà rốt, bào sợi mỏng, ngâm nước lạnh 5 phút cho giòn.</p></li><li><p dir=\"ltr\">Trộn cà rốt, nho khô, mayonnaise, nước cốt chanh, chút muối và tiêu.</p></li><li><p dir=\"ltr\">Để lạnh 10 phút trước khi dùng.</p></li></ol></li><li><p dir=\"ltr\"><strong>Mẹo</strong>: Thêm ít hạt óc chó để tăng độ béo ngậy.</p></li></ul>', 'Rau', '2025-04-28 03:32:13', 'blog_1745811133_680ef6bd556bb.png'),
(25, 'Bí Đỏ - Vàng Rực Cho Bữa Ăn Gia Đình', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\"><strong>Giới thiệu</strong>: Bí đỏ với màu vàng cam ấm áp là nguyên liệu yêu thích trong các món canh, chè, và súp. Bí đỏ tại [tên cửa hàng] được thu hoạch đúng độ chín, bùi ngọt, giàu dinh dưỡng, hoàn hảo cho mọi lứa tuổi.</p><p dir=\"ltr\"><strong>Lợi ích dinh dưỡng</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Vitamin A và C</strong>: Tăng cường miễn dịch, tốt cho da.</p></li><li><p dir=\"ltr\"><strong>Chất chống oxy hóa</strong>: Giảm viêm, bảo vệ tế bào.</p></li><li><p dir=\"ltr\"><strong>Chất xơ và carbohydrate tốt</strong>: Cung cấp năng lượng, hỗ trợ tiêu hóa.</p></li></ul><p dir=\"ltr\"><strong>Mẹo chọn mua</strong>: Chọn bí đỏ nặng tay, vỏ cứng, màu cam đều. Tránh quả có vết xước hoặc mềm.</p><p dir=\"ltr\"><strong>Công thức: Canh bí đỏ tôm</strong></p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 3-4 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">300g bí đỏ</p></li><li><p dir=\"ltr\">100g tôm tươi</p></li><li><p dir=\"ltr\">1 củ hành tím, hành lá, muối, tiêu, nước mắm</p></li></ul></li><li><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Gọt vỏ bí đỏ, cắt miếng vừa ăn. Tôm bóc vỏ, ướp chút muối.</p></li><li><p dir=\"ltr\">Phi thơm hành tím, xào tôm chín tái, đổ 500ml nước vào đun sôi.</p></li><li><p dir=\"ltr\">Thêm bí đỏ, nấu 10 phút đến khi bí mềm. Nêm nước mắm, muối, tiêu, rắc hành lá.</p></li></ol></li><li><p dir=\"ltr\"><strong>Mẹo</strong>: Thêm ít gừng thái lát để canh thơm hơn.</p></li></ul>', 'rau', '2025-04-28 06:22:04', 'blog_1745821324_680f1e8c536e1.png'),
(26, ' Rau Cải Xanh - Lá Xanh, Sức Khỏe Vàng', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\"><strong>Giới thiệu</strong>: Rau cải xanh là “nhà vô địch” trong dòng rau lá, xuất hiện trong nhiều món canh, xào, luộc của người Việt. Cải xanh tại [tên cửa hàng] được trồng không thuốc trừ sâu, đảm bảo an toàn và giòn ngon.</p><p dir=\"ltr\"><strong>Lợi ích dinh dưỡng</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Vitamin K</strong>: Hỗ trợ đông máu, tốt cho xương.</p></li><li><p dir=\"ltr\"><strong>Vitamin C và A</strong>: Tăng đề kháng, bảo vệ mắt.</p></li><li><p dir=\"ltr\"><strong>Chất xơ</strong>: Thúc đẩy tiêu hóa, giảm nguy cơ béo phì.</p></li></ul><p dir=\"ltr\"><strong>Mẹo chọn mua</strong>: Chọn cải có lá xanh đậm, cọng mũm mĩm, không úa vàng. Tránh bó có lá héo hoặc sâu.</p><p dir=\"ltr\"><strong>Công thức: Cải xanh xào nấm</strong></p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 2 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">300g cải xanh</p></li><li><p dir=\"ltr\">100g nấm (đông cô hoặc nấm rơm)</p></li><li><p dir=\"ltr\">2 tép tỏi, dầu ăn, nước mắm, muối</p></li></ul></li><li><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Rừa sạch cải xanh, cắt khúc. Nấm ngâm nước muối, thái lát.</p></li><li><p dir=\"ltr\">Phi thơm tỏi, xào nấm 2 phút, thêm cải xanh vào đảo nhanh trên lửa lớn.</p></li><li><p dir=\"ltr\">Nêm 1 thìa nước mắm, chút muối, xào 1-2 phút rồi tắt bếp.</p></li></ol></li><li><p dir=\"ltr\"><strong>Mẹo</strong>: Thêm ít hạt tiêu để tăng hương vị.</p></li></ul>', 'nấu ăn ', '2025-04-28 06:24:19', 'blog_1745821459_680f1f13188ce.png'),
(27, 'Cà Chua - Trái Đỏ Cho Sức Khỏe Tim', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\"><strong>Giới thiệu</strong>: Cà chua là “trái tim” của nhiều món ăn Việt, từ nước sốt, canh, đến salad. Cà chua tại [tên cửa hàng] mọng nước, chín tự nhiên, không chất bảo quản, mang đến vị ngọt thanh đặc trưng.</p><p dir=\"ltr\"><strong>Lợi ích dinh dưỡng</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Lycopene</strong>: Chất chống oxy hóa giảm nguy cơ ung thư và bệnh tim.</p></li><li><p dir=\"ltr\"><strong>Vitamin C</strong>: Tăng cường miễn dịch, làm đẹp da.</p></li><li><p dir=\"ltr\"><strong>Kali</strong>: Hỗ trợ huyết áp ổn định.</p></li></ul><p dir=\"ltr\"><strong>Mẹo chọn mua</strong>: Chọn cà chua đỏ mọng, vỏ bóng, cầm nặng tay. Tránh quả mềm nhũn hoặc có vết thâm.</p><p dir=\"ltr\"><strong>Công thức: Sốt cà chua đơn giản</strong></p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 4 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">4 quả cà chua (khoảng 400g)</p></li><li><p dir=\"ltr\">1/2 củ hành tây, 2 tép tỏi</p></li><li><p dir=\"ltr\">1 thìa canh dầu ô liu, muối, đường, tiêu</p></li></ul></li><li><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Cà chua rửa sạch, chần nước sôi, bóc vỏ, cắt nhỏ.</p></li><li><p dir=\"ltr\">Phi thơm tỏi và hành tây với dầu ô liu, cho cà chua vào xào.</p></li><li><p dir=\"ltr\">Nêm muối, chút đường, tiêu, đun nhỏ lửa 10 phút đến khi sệt.</p></li></ol></li><li><p dir=\"ltr\"><strong>Mẹo</strong>: Dùng sốt với mì Ý hoặc chấm bánh mì.</p></li></ul>', 'rau ', '2025-04-28 06:26:03', 'blog_1745821563_680f1f7bc5fe2.png'),
(28, 'Dưa Leo - Tươi Mát Cho Mọi Món Ăn', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\"><strong>Giới thiệu</strong>: Dưa leo là “người bạn” lý tưởng cho các món salad, gỏi, hoặc ăn sống. Dưa leo tại [tên cửa hàng] giòn, mọng nước, được trồng tự nhiên, an toàn cho sức khỏe.</p><p dir=\"ltr\"><strong>Lợi ích dinh dưỡng</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nước (95%)</strong>: Giữ cơ thể đủ nước, làm đẹp da.</p></li><li><p dir=\"ltr\"><strong>Vitamin K</strong>: Tốt cho xương và đông máu.</p></li><li><p dir=\"ltr\"><strong>Chất chống oxy hóa</strong>: Giảm viêm, bảo vệ tế bào.</p></li></ul><p dir=\"ltr\"><strong>Mẹo chọn mua</strong>: Chọn dưa leo xanh đậm, vỏ bóng, cầm chắc. Tránh quả vàng hoặc mềm.</p><p dir=\"ltr\"><strong>Công thức: Gỏi dưa leo tôm khô</strong></p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 2 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">2 quả dưa leo (khoảng 200g)</p></li><li><p dir=\"ltr\">30g tôm khô</p></li><li><p dir=\"ltr\">1 thìa canh nước mắm, 1 thìa canh đường, 1 thìa canh nước cốt chanh, ớt, rau thơm</p></li></ul></li><li><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Dưa leo rửa sạch, cắt sợi hoặc đập dập. Tôm khô ngâm nước ấm, để ráo.</p></li><li><p dir=\"ltr\">Pha nước trộn: nước mắm, đường, nước cốt chanh, ớt băm.</p></li><li><p dir=\"ltr\">Trộn dưa leo, tôm khô, rau thơm với nước trộn, để thấm 5 phút.</p></li></ol></li><li><p dir=\"ltr\"><strong>Mẹo</strong>: Thêm đậu phộng rang để tăng độ giòn.</p></li></ul>', 'quả', '2025-04-28 06:29:16', 'blog_1745821756_680f203cda7df.png'),
(29, 'Táo - Trái Quả Vàng Cho Sức Khỏe Và Hương Vị', '<p dir=\"ltr\" data-pm-slice=\"1 3 []\">Táo là một trong những loại trái cây được mọi người yêu thích nhất trên toàn thế giới, xuất hiện trong mọi gian bếp từ món tráng miệng, nước ép đến salad. Với vị ngọt thanh, giòn rụm và giá trị dinh dưỡng tuyệt vời, táo không chỉ ngon mà còn là lựa chọn hoàn hảo cho lối sống lành mạnh. Tại [tên cửa hàng], chúng tôi cung cấp táo sạch, được trồng tự nhiên, không hóa chất, đảm bảo tươi ngon từ vườn đến tay bạn.</p><h2 dir=\"ltr\">Lợi Ích Dinh Dưỡng Của Táo</h2><p dir=\"ltr\">Táo được mệnh danh là \"siêu thực phẩm\" nhờ hàm lượng dinh dưỡng phong phú:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Chất xơ hòa tan (pectin)</strong>: Hỗ trợ tiêu hóa, giảm cholesterol và giúp no lâu, lý tưởng cho người kiểm soát cân nặng.</p></li><li><p dir=\"ltr\"><strong>Vitamin C</strong>: Tăng cường hệ miễn dịch, làm đẹp da, chống oxy hóa.</p></li><li><p dir=\"ltr\"><strong>Polyphenol</strong>: Chất chống oxy hóa giúp bảo vệ tim mạch và giảm nguy cơ ung thư.</p></li><li><p dir=\"ltr\"><strong>Ít calo</strong>: Một quả táo trung bình (khoảng 182g) chỉ chứa khoảng 95 calo, phù hợp cho chế độ ăn kiêng.</p></li><li><p dir=\"ltr\"><strong>Kali</strong>: Hỗ trợ huyết áp ổn định và sức khỏe tim mạch.</p></li></ul><h2 dir=\"ltr\">Mẹo Chọn Mua Táo Tươi Ngon</h2><p dir=\"ltr\">Để chọn được những quả táo chất lượng, hãy lưu ý:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Vỏ</strong>: Chọn táo có vỏ bóng, màu sắc tươi sáng (đỏ, vàng, hoặc xanh tùy giống), không có vết thâm hay nứt.</p></li><li><p dir=\"ltr\"><strong>Độ cứng</strong>: Táo ngon phải chắc, cầm nặng tay. Tránh quả mềm hoặc có mùi lên men.</p></li><li><p dir=\"ltr\"><strong>Mùi hương</strong>: Táo tươi thường có mùi thơm nhẹ, đặc biệt ở phần cuống.</p></li><li><p dir=\"ltr\"><strong>Bảo quản</strong>: Để táo trong tủ lạnh, bọc trong túi zip để giữ độ giòn lên đến 1 tháng.</p></li></ul><p dir=\"ltr\">Tại [tên cửa hàng], táo của chúng tôi được thu hoạch đúng độ chín, đảm bảo độ ngọt tự nhiên và giòn ngon, phù hợp cho cả ăn trực tiếp lẫn chế biến.</p><h2 dir=\"ltr\">Công Thức: Salad Táo và Rau Xanh</h2><p dir=\"ltr\">Món salad táo và rau xanh là cách tuyệt vời để kết hợp táo vào bữa ăn, vừa tươi mát vừa bổ dưỡng. Công thức này nhanh gọn, phù hợp cho bữa trưa nhẹ hoặc món khai vị.</p><p dir=\"ltr\"><strong>Nguyên liệu</strong> (cho 2 người):</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">2 quả táo (giống Fuji hoặc Gala, khoảng 200g)</p></li><li><p dir=\"ltr\">100g rau xà lách (hoặc rau mầm tùy thích)</p></li><li><p dir=\"ltr\">50g hạt óc chó (hoặc hạnh nhân rang)</p></li><li><p dir=\"ltr\">1 thìa canh mật ong</p></li><li><p dir=\"ltr\">1 thìa canh nước cốt chanh</p></li><li><p dir=\"ltr\">2 thìa canh dầu ô liu</p></li><li><p dir=\"ltr\">Muối, tiêu (tùy khẩu vị)</p></li></ul><p dir=\"ltr\"><strong>Cách làm</strong>:</p><ol class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Sơ chế nguyên liệu</strong>: Rửa sạch táo, gọt vỏ nếu muốn, cắt lát mỏng hoặc khối vuông nhỏ. Ngâm táo trong nước muối loãng 5 phút để tránh thâm. Rửa sạch rau xà lách, để ráo.</p></li><li><p dir=\"ltr\"><strong>Pha sốt</strong>: Trộn mật ong, nước cốt chanh, dầu ô liu, chút muối và tiêu trong bát nhỏ cho đều.</p></li><li><p dir=\"ltr\"><strong>Trộn salad</strong>: Cho táo, rau xà lách, và hạt óc chó vào tô lớn. Rưới sốt lên, trộn nhẹ nhàng để nguyên liệu thấm đều.</p></li><li><p dir=\"ltr\"><strong>Trình bày</strong>: Dọn salad ra đĩa, rắc thêm ít hạt óc chó để trang trí. Dùng lạnh để tăng độ tươi ngon.</p></li></ol><p dir=\"ltr\"><strong>Mẹo nhỏ</strong>:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\">Chọn táo ngọt như Fuji để cân bằng vị chua của sốt chanh.</p></li><li><p dir=\"ltr\">Thêm ít phô mai feta hoặc dâu tây cắt lát để tăng hương vị.</p></li><li><p dir=\"ltr\">Nếu thích vị béo hơn, thay dầu ô liu bằng sốt mayonnaise.</p></li></ul><h2 dir=\"ltr\">Táo Trong Ẩm Thực Việt</h2><p dir=\"ltr\">Ngoài salad, táo còn được sử dụng trong nhiều món ăn sáng tạo:</p><ul class=\"tight\" data-tight=\"true\" dir=\"ltr\"><li><p dir=\"ltr\"><strong>Nước ép táo</strong>: Kết hợp với cần tây hoặc gừng để detox cơ thể.</p></li><li><p dir=\"ltr\"><strong>Bánh táo nướng</strong>: Táo cắt lát trộn quế và đường, nướng cùng bột mì, là món tráng miệng thơm ngon.</p></li><li><p dir=\"ltr\"><strong>Sinh tố táo</strong>: Xay táo với chuối và sữa chua cho bữa sáng giàu năng lượng.</p></li></ul>                                                            ', 'quả', '2025-04-28 06:29:56', 'blog_1745821796_680f206416027.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `picture` varchar(80) NOT NULL,
  `quantity_order` int(10) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `username`, `id_pro`, `name_pro`, `price`, `picture`, `quantity_order`, `total`) VALUES
(25, 'bachhung', 43, 'Táo Envy Nhập Khẩu New Zealand', 110000, 'tao1.jpg', 1, 110000),
(26, 'bachhung', 45, 'Dâu Tây Hàn Quốc Vip', 250000, 'dau1.jpg', 1, 250000),
(53, 'tu', 43, 'Táo Envy Nhập Khẩu New Zealand', 0, 'tao1.jpg', 5, 0),
(68, 'quan', 53, 'Cải bẹ xanh', 18000, 'caibe1.jpg', 1, 18000),
(114, 'duong', 47, 'Nho Xanh Autumn', 250000, 'nho1.jpg', 5, 1250000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `description`) VALUES
(1, 'Trái Cây', 'Thơm ngon mát mẻ'),
(2, 'Rau xanh', 'Tươi đảm bảo quy trình'),
(5, 'Hạt khô', 'chất lượng trên từng sản phẩm'),
(6, 'Quả nhiệt đới', 'ngon ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(50) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chatbot`
--

INSERT INTO `chatbot` (`id`, `question`, `answer`, `category`, `created_at`) VALUES
(1, 'Làm sao để đặt hàng?', 'Bạn có thể đặt hàng trực tiếp trên website bằng cách thêm sản phẩm vào giỏ hàng và tiến hành thanh toán. Hoặc bạn có thể liên hệ hotline 0123.456.789 để được hỗ trợ đặt hàng.', 'Đặt hàng', '2025-04-04 14:12:33'),
(2, 'Có những phương thức thanh toán nào?', 'Chúng tôi chấp nhận các phương thức thanh toán: COD (thanh toán khi nhận hàng), chuyển khoản ngân hàng và thanh toán qua ví điện tử.', 'Thanh toán', '2025-04-04 14:12:33'),
(3, 'Có được kiểm tra hàng trước khi nhận không?', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 'Giao hàng', '2025-04-04 14:12:33'),
(4, 'Chính sách đổi trả như thế nào?', 'Chúng tôi chấp nhận đổi trả trong vòng 7 ngày nếu sản phẩm còn nguyên tem mác, chưa qua sử dụng và có hóa đơn mua hàng. Chi phí đổi trả sẽ tùy thuộc vào nguyên nhân.', 'Đổi trả', '2025-04-04 14:12:33'),
(5, 'Làm sao để liên hệ với cửa hàng?', 'Bạn có thể liên hệ với chúng tôi qua hotline 0123.456.789, email support@example.com hoặc đến trực tiếp cửa hàng tại địa chỉ 123 Đường ABC, Quận 1, TP.HCM.', 'Liên hệ', '2025-04-04 14:12:33'),
(6, 'Có cửa hàng ở những tỉnh nào?', 'Hiện tại chúng tôi có cửa hàng tại TP.HCM, Hà Nội và Đà Nẵng. Chúng tôi đang mở rộng hệ thống và sẽ thông báo khi có cửa hàng mới.', 'Cửa hàng', '2025-04-04 14:12:33'),
(7, 'Có giảm giá cho khách hàng thân thiết không?', 'Chúng tôi có chương trình khách hàng thân thiết với nhiều ưu đãi hấp dẫn. Bạn sẽ nhận được voucher giảm giá khi tích đủ điểm từ các lần mua hàng trước.', 'Khuyến mãi', '2025-04-04 14:12:33'),
(8, 'Sản phẩm có bảo hành không?', 'Tùy vào từng sản phẩm sẽ có chính sách bảo hành khác nhau, thường từ 6 tháng đến 2 năm. Chi tiết bảo hành được ghi rõ trên phiếu bảo hành kèm theo sản phẩm.', 'Bảo hành', '2025-04-04 14:12:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_bot` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `session_id`, `message`, `is_bot`, `created_at`) VALUES
(76, 'ta22flt1kmr09t9q2qmm56m7nm', 'Chúng tôi chấp nhận các hình thức thanh toán: tiền mặt khi nhận hàng, chuyển khoản ngân hàng và ví điện tử.', 1, '2025-04-04 13:30:09'),
(77, 'ta22flt1kmr09t9q2qmm56m7nm', 'chi tiết', 0, '2025-04-04 13:30:23'),
(78, 'ta22flt1kmr09t9q2qmm56m7nm', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-04 13:30:23'),
(79, 'ta22flt1kmr09t9q2qmm56m7nm', 'giao hàng', 0, '2025-04-04 13:30:32'),
(80, 'ta22flt1kmr09t9q2qmm56m7nm', 'Chúng tôi giao hàng toàn quốc với phí vận chuyển từ 20.000đ. Thời gian giao hàng từ 1-3 ngày tùy khu vực.', 1, '2025-04-04 13:30:32'),
(81, 'ta22flt1kmr09t9q2qmm56m7nm', 'đổi trả', 0, '2025-04-04 13:30:40'),
(82, 'ta22flt1kmr09t9q2qmm56m7nm', 'Bạn có thể đổi trả sản phẩm trong vòng 7 ngày nếu sản phẩm còn nguyên tem mác và hóa đơn.', 1, '2025-04-04 13:30:40'),
(83, '2gsnka4899qhgrj5tkkeog6mn9', 'Sản phẩm có bảo hành không?', 0, '2025-04-04 14:38:43'),
(84, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:43'),
(85, '2gsnka4899qhgrj5tkkeog6mn9', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-04 14:38:48'),
(86, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:48'),
(87, '2gsnka4899qhgrj5tkkeog6mn9', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-04 14:38:48'),
(88, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:48'),
(89, '2gsnka4899qhgrj5tkkeog6mn9', 'Thời gian giao hàng bao lâu?', 0, '2025-04-04 14:38:49'),
(90, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:49'),
(91, '2gsnka4899qhgrj5tkkeog6mn9', 'Thời gian giao hàng bao lâu?', 0, '2025-04-04 14:38:49'),
(92, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:49'),
(93, '2gsnka4899qhgrj5tkkeog6mn9', 'Thời gian giao hàng bao lâu?', 0, '2025-04-04 14:38:50'),
(94, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:50'),
(95, '2gsnka4899qhgrj5tkkeog6mn9', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-04 14:38:50'),
(96, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:50'),
(97, '2gsnka4899qhgrj5tkkeog6mn9', 'Sản phẩm có bảo hành không?', 0, '2025-04-04 14:38:51'),
(98, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:51'),
(99, '2gsnka4899qhgrj5tkkeog6mn9', 'Sản phẩm có bảo hành không?', 0, '2025-04-04 14:38:51'),
(100, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:51'),
(101, '2gsnka4899qhgrj5tkkeog6mn9', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-04 14:38:52'),
(102, '2gsnka4899qhgrj5tkkeog6mn9', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:38:52'),
(103, '2gsnka4899qhgrj5tkkeog6mn9', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-04 14:38:52'),
(104, '2gsnka4899qhgrj5tkkeog6mn9', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-04 14:38:52'),
(105, 'jphitikiok826lqvqck2ltj15h', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-04 14:40:09'),
(106, 'jphitikiok826lqvqck2ltj15h', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-04 14:40:09'),
(107, 'jphitikiok826lqvqck2ltj15h', 'Thời gian giao hàng bao lâu?', 0, '2025-04-04 14:40:13'),
(108, 'jphitikiok826lqvqck2ltj15h', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:40:13'),
(109, 'jphitikiok826lqvqck2ltj15h', 'Sản phẩm có bảo hành không?', 0, '2025-04-04 14:40:46'),
(110, 'jphitikiok826lqvqck2ltj15h', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:40:46'),
(111, 'jphitikiok826lqvqck2ltj15h', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-04 14:57:59'),
(112, 'jphitikiok826lqvqck2ltj15h', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:57:59'),
(113, 'jphitikiok826lqvqck2ltj15h', 'Sản phẩm có bảo hành không?', 0, '2025-04-04 14:58:01'),
(114, 'jphitikiok826lqvqck2ltj15h', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:58:01'),
(115, 'jphitikiok826lqvqck2ltj15h', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-04 14:58:04'),
(116, 'jphitikiok826lqvqck2ltj15h', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-04 14:58:04'),
(117, 'jphitikiok826lqvqck2ltj15h', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-04 14:58:10'),
(118, 'jphitikiok826lqvqck2ltj15h', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 14:58:10'),
(119, 'jphitikiok826lqvqck2ltj15h', 'sản phẩm', 0, '2025-04-04 15:04:13'),
(120, 'jphitikiok826lqvqck2ltj15h', 'Tùy vào từng sản phẩm sẽ có chính sách bảo hành khác nhau, thường từ 6 tháng đến 2 năm. Chi tiết bảo hành được ghi rõ trên phiếu bảo hành kèm theo sản phẩm.', 1, '2025-04-04 15:04:13'),
(121, 'jphitikiok826lqvqck2ltj15h', 'mua rau', 0, '2025-04-04 15:04:21'),
(122, 'jphitikiok826lqvqck2ltj15h', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=54\"\'><img src=\'lang1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau lang</strong><br><span class=\'price\'>10,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=60\"\'><img src=\'ngot1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau ngót</strong><br><span class=\'price\'>30,000 VND</span></div></div>', 1, '2025-04-04 15:04:21'),
(123, 'jphitikiok826lqvqck2ltj15h', 'mua  bưởi', 0, '2025-04-04 15:04:50'),
(124, 'jphitikiok826lqvqck2ltj15h', 'Tìm thấy 1 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=51\"\'><img src=\'buoi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Bưởi da xanh Phú Quý</strong><br><span class=\'price\'>90,000 VND</span></div></div>', 1, '2025-04-04 15:04:50'),
(125, 'jphitikiok826lqvqck2ltj15h', 'mua kiwi', 0, '2025-04-04 15:04:56'),
(126, 'jphitikiok826lqvqck2ltj15h', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=42\"\'><img src=\'kiwi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Quả Kiwi Vàng Zespri New Zealand Organic</strong><br><span class=\'price\'><del>220,000</del> 200,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=48\"\'><img src=\'kiwi11.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Kiwi ruột đỏ nhập khẩu</strong><br><span class=\'price\'>300,000 VND</span></div></div>', 1, '2025-04-04 15:04:56'),
(127, 'tmf2e3srrpn2fel40tav3au9dg', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-04 15:05:57'),
(128, 'tmf2e3srrpn2fel40tav3au9dg', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-04 15:05:57'),
(129, 'tmf2e3srrpn2fel40tav3au9dg', 'mua quả', 0, '2025-04-04 15:06:02'),
(130, 'tmf2e3srrpn2fel40tav3au9dg', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=41\"\'><img src=\'vietquat1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Việt Quất New Zealand Nhập Khẩu</strong><br><span class=\'price\'><del>150,000</del> 120,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=42\"\'><img src=\'kiwi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Quả Kiwi Vàng Zespri New Zealand Organic</strong><br><span class=\'price\'><del>220,000</del> 200,000 VND</span></div></div>', 1, '2025-04-04 15:06:02'),
(131, 'gtju43pjtar2v0qjd1lmnm5d58', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-05 02:21:25'),
(132, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:25'),
(133, 'gtju43pjtar2v0qjd1lmnm5d58', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-05 02:21:28'),
(134, 'gtju43pjtar2v0qjd1lmnm5d58', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-05 02:21:28'),
(135, 'gtju43pjtar2v0qjd1lmnm5d58', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-05 02:21:30'),
(136, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:30'),
(137, 'gtju43pjtar2v0qjd1lmnm5d58', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-05 02:21:33'),
(138, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:33'),
(139, 'gtju43pjtar2v0qjd1lmnm5d58', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-05 02:21:35'),
(140, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:35'),
(141, 'gtju43pjtar2v0qjd1lmnm5d58', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-05 02:21:38'),
(142, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:38'),
(143, 'gtju43pjtar2v0qjd1lmnm5d58', 'Sản phẩm có bảo hành không?', 0, '2025-04-05 02:21:39'),
(144, 'gtju43pjtar2v0qjd1lmnm5d58', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 02:21:39'),
(145, 'gtju43pjtar2v0qjd1lmnm5d58', 'Mua  rau', 0, '2025-04-05 02:21:43'),
(146, 'gtju43pjtar2v0qjd1lmnm5d58', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=54\"\'><img src=\'lang1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau lang</strong><br><span class=\'price\'>10,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=60\"\'><img src=\'ngot1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau ngót</strong><br><span class=\'price\'>30,000 VND</span></div></div>', 1, '2025-04-05 02:21:43'),
(147, 'gtju43pjtar2v0qjd1lmnm5d58', 'mua hạt', 0, '2025-04-05 02:21:50'),
(148, 'gtju43pjtar2v0qjd1lmnm5d58', 'Tìm thấy 3 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=52\"\'><img src=\'dua1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Dưa hấu không hạt</strong><br><span class=\'price\'>100,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=62\"\'><img src=\'dieu.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt điều vị sầu riêng HAPPY NUTS</strong><br><span class=\'price\'><del>550,000</del> 500,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=63\"\'><img src=\'chia.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt chia</strong><br><span class=\'price\'>180,000 VND</span></div></div>', 1, '2025-04-05 02:21:50'),
(149, 'tej80r9d3bqbqir7dh02ekv07j', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-05 06:40:25'),
(150, 'tej80r9d3bqbqir7dh02ekv07j', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-05 06:40:25'),
(151, 'gouqeh8e07ab5rpboqhgur7i65', 'Sản phẩm có bảo hành không?', 0, '2025-04-08 14:16:25'),
(152, 'gouqeh8e07ab5rpboqhgur7i65', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-08 14:16:25'),
(153, 'gouqeh8e07ab5rpboqhgur7i65', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-08 14:16:29'),
(154, 'gouqeh8e07ab5rpboqhgur7i65', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-08 14:16:29'),
(155, 'gouqeh8e07ab5rpboqhgur7i65', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-08 14:16:30'),
(156, 'gouqeh8e07ab5rpboqhgur7i65', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-08 14:16:30'),
(157, 'jjkepselmdlk5us6mridr7ftfd', 'Sản phẩm có bảo hành không?', 0, '2025-04-11 08:24:01'),
(158, 'jjkepselmdlk5us6mridr7ftfd', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-11 08:24:01'),
(159, 'jjkepselmdlk5us6mridr7ftfd', 'bưởi', 0, '2025-04-11 08:24:16'),
(160, 'jjkepselmdlk5us6mridr7ftfd', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-11 08:24:16'),
(161, 'jjkepselmdlk5us6mridr7ftfd', 'mua rau', 0, '2025-04-11 08:24:23'),
(162, 'jjkepselmdlk5us6mridr7ftfd', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=54\"\'><img src=\'lang1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau lang</strong><br><span class=\'price\'>10,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=60\"\'><img src=\'ngot1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau ngót</strong><br><span class=\'price\'>30,000 VND</span></div></div>', 1, '2025-04-11 08:24:23'),
(163, 'jjkepselmdlk5us6mridr7ftfd', 'sản phẩm hạt', 0, '2025-04-11 08:24:27'),
(164, 'jjkepselmdlk5us6mridr7ftfd', 'Tìm thấy 3 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=52\"\'><img src=\'dua1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Dưa hấu không hạt</strong><br><span class=\'price\'>100,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=62\"\'><img src=\'dieu.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt điều vị sầu riêng HAPPY NUTS</strong><br><span class=\'price\'><del>550,000</del> 500,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=63\"\'><img src=\'chia.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt chia</strong><br><span class=\'price\'>180,000 VND</span></div></div>', 1, '2025-04-11 08:24:27'),
(165, 'jjkepselmdlk5us6mridr7ftfd', 'bán rau', 0, '2025-04-11 08:24:38'),
(166, 'jjkepselmdlk5us6mridr7ftfd', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-11 08:24:38'),
(167, 'jjkepselmdlk5us6mridr7ftfd', 'lấy quả', 0, '2025-04-11 08:24:46'),
(168, 'jjkepselmdlk5us6mridr7ftfd', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-11 08:24:46'),
(169, 'jjkepselmdlk5us6mridr7ftfd', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-11 09:18:05'),
(170, 'jjkepselmdlk5us6mridr7ftfd', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-11 09:18:05'),
(171, 'jjkepselmdlk5us6mridr7ftfd', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-11 09:18:10'),
(172, 'jjkepselmdlk5us6mridr7ftfd', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-11 09:18:10'),
(173, '4fn8q7t3e4h33veiks43ofq707', 'Sản phẩm có bảo hành không?', 0, '2025-04-12 13:58:50'),
(174, '4fn8q7t3e4h33veiks43ofq707', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-12 13:58:50'),
(175, 'ch4upakmicda8uptahfuvdm7im', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-14 09:18:21'),
(176, 'ch4upakmicda8uptahfuvdm7im', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-14 09:18:21'),
(177, 'hqbvpbehugdupr3n5jku98qoih', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-17 09:30:04'),
(178, 'hqbvpbehugdupr3n5jku98qoih', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-17 09:30:04'),
(179, '04q8ds0kitc6mknsl4cd4ls8ti', 'Thời gian giao hàng bao lâu?', 0, '2025-04-18 09:49:34'),
(180, '04q8ds0kitc6mknsl4cd4ls8ti', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-18 09:49:34'),
(181, 'p7ttijrj9mbaq9c0n1sdauojv0', 'mua bưởi', 0, '2025-04-20 04:10:05'),
(182, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Tìm thấy 1 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=51\"\'><img data-imgbigurl=\'../Admin/upload/buoi1.jpg\' src=\'../Admin/upload/buoi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Bưởi da xanh Phú Quý</strong><br><span class=\'price\'>90,000 VND</span></div></div>', 1, '2025-04-20 04:10:05'),
(183, 'p7ttijrj9mbaq9c0n1sdauojv0', 'rau xanh', 0, '2025-04-20 04:10:11'),
(184, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-20 04:10:11'),
(185, 'p7ttijrj9mbaq9c0n1sdauojv0', 'mua rau xanh', 0, '2025-04-20 04:10:17'),
(186, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Không tìm thấy sản phẩm phù hợp với \'rau xanh\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 04:10:17'),
(187, 'p7ttijrj9mbaq9c0n1sdauojv0', 'mau rau', 0, '2025-04-20 04:10:22'),
(188, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-04-20 04:10:22'),
(189, 'p7ttijrj9mbaq9c0n1sdauojv0', 'sản phẩm hạt', 0, '2025-04-20 04:10:29'),
(190, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Tìm thấy 3 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=52\"\'><img data-imgbigurl=\'../Admin/upload/dua1.jpg\' src=\'../Admin/upload/dua1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Dưa hấu không hạt</strong><br><span class=\'price\'>100,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=62\"\'><img data-imgbigurl=\'../Admin/upload/dieu.jpg\' src=\'../Admin/upload/dieu.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt điều vị sầu riêng HAPPY NUTS</strong><br><span class=\'price\'><del>550,000</del> 500,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=63\"\'><img data-imgbigurl=\'../Admin/upload/chia.jpg\' src=\'../Admin/upload/chia.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt chia</strong><br><span class=\'price\'>180,000 VND</span></div></div>', 1, '2025-04-20 04:10:29'),
(191, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Mua quả', 0, '2025-04-20 04:10:40'),
(192, 'p7ttijrj9mbaq9c0n1sdauojv0', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=41\"\'><img data-imgbigurl=\'../Admin/upload/vietquat1.jpg\' src=\'../Admin/upload/vietquat1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Việt Quất New Zealand Nhập Khẩu</strong><br><span class=\'price\'><del>150,000</del> 120,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=42\"\'><img data-imgbigurl=\'../Admin/upload/kiwi1.jpg\' src=\'../Admin/upload/kiwi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Quả Kiwi Vàng Zespri New Zealand Organic</strong><br><span class=\'price\'><del>220,000</del> 200,000 VND</span></div></div>', 1, '2025-04-20 04:10:40'),
(193, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-20 06:32:39'),
(194, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 06:32:39'),
(195, 'k8210uc4rl41l4u00tiq7bgvb2', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-20 06:32:43'),
(196, 'k8210uc4rl41l4u00tiq7bgvb2', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-20 06:32:43'),
(197, 'k8210uc4rl41l4u00tiq7bgvb2', 'Thời gian giao hàng bao lâu?', 0, '2025-04-20 06:32:46'),
(198, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 06:32:46'),
(199, 'k8210uc4rl41l4u00tiq7bgvb2', 'mua bưởi', 0, '2025-04-20 06:32:49'),
(200, 'k8210uc4rl41l4u00tiq7bgvb2', 'Tìm thấy 1 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=51\"\'><img data-imgbigurl=\'../Admin/upload/buoi1.jpg\' src=\'../Admin/upload/buoi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Bưởi da xanh Phú Quý</strong><br><span class=\'price\'>90,000 VND</span></div></div>', 1, '2025-04-20 06:32:49'),
(201, 'k8210uc4rl41l4u00tiq7bgvb2', 'mua hạt', 0, '2025-04-20 06:32:54'),
(202, 'k8210uc4rl41l4u00tiq7bgvb2', 'Tìm thấy 3 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=52\"\'><img data-imgbigurl=\'../Admin/upload/dua1.jpg\' src=\'../Admin/upload/dua1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Dưa hấu không hạt</strong><br><span class=\'price\'>100,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=62\"\'><img data-imgbigurl=\'../Admin/upload/dieu.jpg\' src=\'../Admin/upload/dieu.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt điều vị sầu riêng HAPPY NUTS</strong><br><span class=\'price\'><del>550,000</del> 500,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=63\"\'><img data-imgbigurl=\'../Admin/upload/chia.jpg\' src=\'../Admin/upload/chia.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Hạt chia</strong><br><span class=\'price\'>180,000 VND</span></div></div>', 1, '2025-04-20 06:32:54'),
(203, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 07:53:28'),
(204, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 07:53:28'),
(205, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 07:56:09'),
(206, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 07:56:09'),
(207, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 07:56:45'),
(208, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'có bảo hành không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 07:56:45'),
(209, 'k8210uc4rl41l4u00tiq7bgvb2', 'sản phẩm bưởi', 0, '2025-04-20 08:00:50'),
(210, 'k8210uc4rl41l4u00tiq7bgvb2', 'Tìm thấy 1 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=51\"\'><img data-imgbigurl=\'../Admin/upload/buoi1.jpg\' src=\'../Admin/upload/buoi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Bưởi da xanh Phú Quý</strong><br><span class=\'price\'>90,000 VND</span></div></div>', 1, '2025-04-20 08:00:50'),
(211, 'k8210uc4rl41l4u00tiq7bgvb2', 'sản phẩm bưởi có bảo hành ko', 0, '2025-04-20 08:01:03'),
(212, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'bưởi có bảo hành ko\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:01:03'),
(213, 'k8210uc4rl41l4u00tiq7bgvb2', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-20 08:06:06'),
(214, 'k8210uc4rl41l4u00tiq7bgvb2', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-20 08:06:06'),
(215, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 08:06:09'),
(216, 'k8210uc4rl41l4u00tiq7bgvb2', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-20 08:06:09'),
(217, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-20 08:06:13'),
(218, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:06:13'),
(219, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 08:07:05'),
(220, 'k8210uc4rl41l4u00tiq7bgvb2', 'hiện tại chúng tôi chỉ bán online', 1, '2025-04-20 08:07:05'),
(221, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 08:07:14'),
(222, 'k8210uc4rl41l4u00tiq7bgvb2', 'hiện tại chúng tôi chỉ bán online', 1, '2025-04-20 08:07:14'),
(223, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-20 08:07:25'),
(224, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:07:25'),
(225, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 08:07:27'),
(226, 'k8210uc4rl41l4u00tiq7bgvb2', 'hiện tại chúng tôi chỉ bán online', 1, '2025-04-20 08:07:27'),
(227, 'k8210uc4rl41l4u00tiq7bgvb2', 'Sản phẩm có bảo hành không?', 0, '2025-04-20 08:08:52'),
(228, 'k8210uc4rl41l4u00tiq7bgvb2', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-20 08:08:52'),
(229, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-20 08:08:55'),
(230, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:08:55'),
(231, 'k8210uc4rl41l4u00tiq7bgvb2', 'Thời gian giao hàng bao lâu?', 0, '2025-04-20 08:08:58'),
(232, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'bao lâu?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:08:58'),
(233, 'k8210uc4rl41l4u00tiq7bgvb2', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-20 08:09:00'),
(234, 'k8210uc4rl41l4u00tiq7bgvb2', 'Hiện tại chúng tôi chỉ giao hàng trong nước. Chúng tôi sẽ thông báo khi có dịch vụ giao hàng quốc tế.', 1, '2025-04-20 08:09:00'),
(235, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-20 08:09:04'),
(236, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:09:04'),
(237, 'k8210uc4rl41l4u00tiq7bgvb2', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-20 08:09:07'),
(238, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:09:07'),
(239, 'k8210uc4rl41l4u00tiq7bgvb2', 'mua hoa quả', 0, '2025-04-20 08:09:13'),
(240, 'k8210uc4rl41l4u00tiq7bgvb2', 'Không tìm thấy sản phẩm phù hợp với \'hoa quả\'. Vui lòng thử từ khóa khác.', 1, '2025-04-20 08:09:13'),
(241, 'k8210uc4rl41l4u00tiq7bgvb2', 'mua xoài', 0, '2025-04-20 08:09:17'),
(242, 'k8210uc4rl41l4u00tiq7bgvb2', 'Tìm thấy 1 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=67\"\'><img data-imgbigurl=\'../Admin/upload/xoai1.png\' src=\'../Admin/upload/xoai1.png\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>xoài</strong><br><span class=\'price\'>25,000 VND</span></div></div>', 1, '2025-04-20 08:09:17'),
(243, 'k8210uc4rl41l4u00tiq7bgvb2', 'mua quả', 0, '2025-04-20 08:09:22'),
(244, 'k8210uc4rl41l4u00tiq7bgvb2', 'Tìm thấy 2 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=41\"\'><img data-imgbigurl=\'../Admin/upload/vietquat1.jpg\' src=\'../Admin/upload/vietquat1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Việt Quất New Zealand Nhập Khẩu</strong><br><span class=\'price\'><del>150,000</del> 120,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=42\"\'><img data-imgbigurl=\'../Admin/upload/kiwi1.jpg\' src=\'../Admin/upload/kiwi1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Quả Kiwi Vàng Zespri New Zealand Organic</strong><br><span class=\'price\'><del>220,000</del> 200,000 VND</span></div></div>', 1, '2025-04-20 08:09:22'),
(397, 'bnr8qbivu8722hossjpvci9itb', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-25 14:48:07'),
(398, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 14:48:07'),
(399, 'bnr8qbivu8722hossjpvci9itb', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-25 14:48:08'),
(400, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 14:48:08'),
(401, 'bnr8qbivu8722hossjpvci9itb', 'Làm sao để đặt hàng?', 0, '2025-04-25 15:04:12'),
(402, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:04:12'),
(403, 'bnr8qbivu8722hossjpvci9itb', 'Có những phương thức thanh toán nào?', 0, '2025-04-25 15:04:14'),
(404, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:04:14'),
(405, 'bnr8qbivu8722hossjpvci9itb', 'Có được kiểm tra hàng trước khi nhận không?', 0, '2025-04-25 15:04:18'),
(406, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'trước khi nhận không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 15:04:18'),
(407, 'bnr8qbivu8722hossjpvci9itb', 'Chính sách đổi trả như thế nào?', 0, '2025-04-25 15:04:21'),
(408, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:04:21'),
(409, 'bnr8qbivu8722hossjpvci9itb', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-25 15:04:26'),
(410, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:04:26'),
(411, 'bnr8qbivu8722hossjpvci9itb', 'Sản phẩm có bảo hành không?', 0, '2025-04-25 15:12:44'),
(412, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:12:44'),
(413, 'bnr8qbivu8722hossjpvci9itb', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-25 15:12:46'),
(414, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 15:12:46'),
(415, 'bnr8qbivu8722hossjpvci9itb', 'Có được kiểm tra hàng trước khi nhận không?', 0, '2025-04-25 15:12:48'),
(416, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'trước khi nhận không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 15:12:48'),
(417, 'bnr8qbivu8722hossjpvci9itb', 'Có được kiểm tra hàng trước khi nhận không?', 0, '2025-04-25 15:13:27'),
(418, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'trước khi nhận không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 15:13:27'),
(419, 'bnr8qbivu8722hossjpvci9itb', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-25 15:13:28'),
(420, 'bnr8qbivu8722hossjpvci9itb', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-25 15:13:28'),
(421, 'bnr8qbivu8722hossjpvci9itb', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-25 15:13:31'),
(422, 'bnr8qbivu8722hossjpvci9itb', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-25 15:13:31'),
(423, 'dr3qitvuti74vuko74st19r3m9', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-04-29 08:19:07'),
(424, 'dr3qitvuti74vuko74st19r3m9', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-29 08:19:07'),
(425, 'dr3qitvuti74vuko74st19r3m9', 'Sản phẩm có bảo hành không?', 0, '2025-04-29 08:19:09'),
(426, 'dr3qitvuti74vuko74st19r3m9', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-29 08:19:09'),
(427, 'dr3qitvuti74vuko74st19r3m9', 'Làm sao để liên hệ với cửa hàng?', 0, '2025-04-29 08:19:13'),
(428, 'dr3qitvuti74vuko74st19r3m9', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-29 08:19:13'),
(429, 'dr3qitvuti74vuko74st19r3m9', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-04-29 08:19:16'),
(430, 'dr3qitvuti74vuko74st19r3m9', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-04-29 08:19:16'),
(431, 'js43k5lsv6bf40iqbrnu95q78s', 'Sản phẩm có bảo hành không?', 0, '2025-04-29 09:13:36'),
(432, 'js43k5lsv6bf40iqbrnu95q78s', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-04-29 09:13:36'),
(433, 'i60qtfd566af6d3lslikopt93a', 'Sản phẩm có bảo hành không?', 0, '2025-05-02 08:32:01'),
(434, 'i60qtfd566af6d3lslikopt93a', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-05-02 08:32:01'),
(435, 'i60qtfd566af6d3lslikopt93a', 'Có được kiểm tra hàng trước khi nhận không?', 0, '2025-05-02 08:32:08'),
(436, 'i60qtfd566af6d3lslikopt93a', 'Không tìm thấy sản phẩm phù hợp với \'trước khi nhận không?\'. Vui lòng thử từ khóa khác.', 1, '2025-05-02 08:32:08'),
(437, 'ehcok60rb0n08gcblhaijd3ll7', 'Có giảm giá cho khách hàng thân thiết không?', 0, '2025-05-06 09:15:57'),
(438, 'ehcok60rb0n08gcblhaijd3ll7', 'Không tìm thấy sản phẩm phù hợp với \'thân thiết không?\'. Vui lòng thử từ khóa khác.', 1, '2025-05-06 09:15:57'),
(439, 'ehcok60rb0n08gcblhaijd3ll7', 'CHÀO', 0, '2025-05-06 09:31:58'),
(440, 'ehcok60rb0n08gcblhaijd3ll7', 'Tôi chưa có thông tin về câu hỏi này. Bạn vui lòng liên hệ hotline 0123.456.789 để được hỗ trợ.', 1, '2025-05-06 09:31:58'),
(441, 'ehcok60rb0n08gcblhaijd3ll7', 'chào', 0, '2025-05-06 09:32:01'),
(442, 'ehcok60rb0n08gcblhaijd3ll7', 'Chào buổi sáng! Tôi có thể giúp gì cho bạn?', 1, '2025-05-06 09:32:01'),
(443, 'ehcok60rb0n08gcblhaijd3ll7', 'Sản phẩm có bảo hành không?', 0, '2025-05-06 09:32:04'),
(444, 'ehcok60rb0n08gcblhaijd3ll7', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-05-06 09:32:04'),
(477, 'ep359pt3jbkj4g17lnv11u7c1p', 'Tôi muốn tìm sản phẩm phù hợp để ăn kiêng, có gợi ý nào không?', 0, '2025-05-07 15:26:33'),
(478, 'ep359pt3jbkj4g17lnv11u7c1p', 'Bạn có thể thử các loại rau xanh như cải bó xôi, cải kale hoặc cà chua baby, rất phù hợp cho chế độ ăn kiêng lành mạnh. Ngoài ra, các loại hạt sấy khô như hạnh nhân và hạt điều cũng là lựa chọn tuyệt vời!', 1, '2025-05-07 15:26:33'),
(479, 'ep359pt3jbkj4g17lnv11u7c1p', 'Làm thế nào để đặt hàng và thanh toán?', 0, '2025-05-07 15:26:35'),
(480, 'ep359pt3jbkj4g17lnv11u7c1p', 'Bạn có thể đặt hàng trực tiếp trên website laxanhorganic.com, thêm sản phẩm vào giỏ hàng và thanh toán qua chuyển khoản ngân hàng, ví điện tử hoặc thanh toán khi nhận hàng (COD).', 1, '2025-05-07 15:26:35'),
(481, 'ep359pt3jbkj4g17lnv11u7c1p', 'của hàng ở những tỉnh', 0, '2025-05-07 15:33:01'),
(482, 'ep359pt3jbkj4g17lnv11u7c1p', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh\'. Vui lòng thử từ khóa khác.', 1, '2025-05-07 15:33:01'),
(483, 'ep359pt3jbkj4g17lnv11u7c1p', 'Có cửa hàng ở những tỉnh nào?', 0, '2025-05-07 15:33:15'),
(484, 'ep359pt3jbkj4g17lnv11u7c1p', 'Không tìm thấy sản phẩm phù hợp với \'ở những tỉnh nào?\'. Vui lòng thử từ khóa khác.', 1, '2025-05-07 15:33:15'),
(485, 'ep359pt3jbkj4g17lnv11u7c1p', 'Có cửa hàng', 0, '2025-05-07 15:33:23'),
(486, 'ep359pt3jbkj4g17lnv11u7c1p', 'Bạn hoàn toàn có thể kiểm tra hàng hóa trước khi thanh toán. Nếu có bất kỳ vấn đề gì, bạn có thể từ chối nhận hàng.', 1, '2025-05-07 15:33:23'),
(487, 'ep359pt3jbkj4g17lnv11u7c1p', 'Làm thế nào để đặt hàng và thanh toán?', 0, '2025-05-07 15:47:59'),
(488, 'ep359pt3jbkj4g17lnv11u7c1p', 'Bạn có thể đặt hàng trực tiếp trên website laxanhorganic.com, thêm sản phẩm vào giỏ hàng và thanh toán qua chuyển khoản ngân hàng, ví điện tử hoặc thanh toán khi nhận hàng (COD).', 1, '2025-05-07 15:47:59'),
(489, 'ep359pt3jbkj4g17lnv11u7c1p', 'Có chính sách bảo hành cho sản phẩm không?', 0, '2025-05-07 15:49:38'),
(490, 'ep359pt3jbkj4g17lnv11u7c1p', 'Rau củ tươi không áp dụng bảo hành, nhưng chúng tôi đảm bảo chất lượng sản phẩm khi giao. Nếu có vấn đề về chất lượng, vui lòng liên hệ trong vòng 24 giờ để được giải quyết.', 1, '2025-05-07 15:49:38'),
(493, 'dlg7sbk2v95a249vtbegjq1ggk', 'Các sản phẩm của Lá Xanh Organic có nguồn gốc từ đâu?', 0, '2025-05-08 04:01:24'),
(494, 'dlg7sbk2v95a249vtbegjq1ggk', 'Tất cả sản phẩm của Lá Xanh Organic đều được trồng tại các nông trại hữu cơ đạt chuẩn tại Việt Nam, đảm bảo không sử dụng hóa chất hay thuốc trừ sâu độc hại.', 1, '2025-05-08 04:01:24'),
(495, 'dlg7sbk2v95a249vtbegjq1ggk', 'mua quar', 0, '2025-05-08 04:01:34'),
(496, 'dlg7sbk2v95a249vtbegjq1ggk', 'Không tìm thấy sản phẩm phù hợp với \'quar\'. Vui lòng thử từ khóa khác.', 1, '2025-05-08 04:01:34'),
(497, 'dlg7sbk2v95a249vtbegjq1ggk', 'mua rau', 0, '2025-05-08 04:01:38'),
(498, 'dlg7sbk2v95a249vtbegjq1ggk', 'Tìm thấy 3 sản phẩm phù hợp:<br><br><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=49\"\'><img data-imgbigurl=\'../Admin/upload/me1.jpg\' src=\'../Admin/upload/me1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Me ngâm chua ngọt nhập khẩu Thái Lan</strong><br><span class=\'price\'>120,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=53\"\'><img data-imgbigurl=\'../Admin/upload/caibe1.jpg\' src=\'../Admin/upload/caibe1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Cải bẹ xanh</strong><br><span class=\'price\'><del>20,000</del> 18,000 VND</span></div></div><div class=\'product-item\' onclick=\'window.location=\"shop-details.php?id=54\"\'><img data-imgbigurl=\'../Admin/upload/lang1.jpg\' src=\'../Admin/upload/lang1.jpg\' width=\'50\' height=\'50\'><div class=\'product-info\'><strong>Rau lang</strong><br><span class=\'price\'>10,000 VND</span></div></div>', 1, '2025-05-08 04:01:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_pro` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date_comment` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_pro`, `username`, `content`, `rating`, `date_comment`) VALUES
(3, 43, 'cuong', 'Ngon xịn mịn kk oki', 4, '2025-04-03'),
(6, 47, 'cuong', 'bao giờ thì ship nhỉ', 4, '2025-04-03'),
(11, 47, 'dat', 'ngon  tươi mát', 3, '2025-04-11'),
(12, 65, 'dat', 'Thơm  ngon nha các bác', 5, '2025-04-11'),
(13, 65, 'dat', 'lên nào ae ơi', 5, '2025-04-11'),
(15, 46, 'tú', 'Ok nha ae', 5, '2025-04-11'),
(16, 47, 'tú', 'nho sạch nha', 4, '2025-04-11'),
(17, 45, 'tú', 'dâu sapa', 5, '2025-04-11'),
(18, 45, 'tú', 'online ko sốp ơi', 5, '2025-04-11'),
(19, 55, 'tú', 'rau sạch', 3, '2025-04-11'),
(20, 50, 'tú', 'ahihi', 5, '2025-04-11'),
(21, 60, 'adminC2', 'rau  siu ngon', 3, '2025-04-11'),
(22, 60, 'adminC2', 'uio ko', 5, '2025-04-11'),
(23, 60, 'adminC2', 'fdfs', 5, '2025-04-11'),
(24, 60, 'dat', 'uk  cx đc', 5, '2025-04-11'),
(25, 51, 'dat', 'lên nào ngon ngon', 5, '2025-04-12'),
(28, 51, 'dat', 'giao hàng bao lâu vậy sốp', 5, '2025-04-12'),
(30, 51, 'dat', 'dá', 5, '2025-04-12'),
(31, 42, 'cuong', 'oki  nha', 4, '2025-04-13'),
(32, 42, 'cuong', 'ahihi', 4, '2025-04-13'),
(34, 42, 'cuong', 'ae mik là gì nào', 5, '2025-04-13'),
(35, 43, 'cuong', 'ok  nha bác', 5, '2025-04-13'),
(36, 46, 'dat', 'tôi muốn dùng sp này', 2, '2025-04-13'),
(37, 46, 'dat', 'ơ sao đc', 5, '2025-04-13'),
(41, 46, 'dat', 'tao  muốn lên', 5, '2025-04-13'),
(42, 50, 'dat', '3213                     4', 3, '2025-04-14'),
(43, 52, 'dat', 'to the moon                                d', 3, '2025-04-17'),
(44, 47, 'dat', 'vip nhỉ gg', 5, '2025-04-17'),
(45, 49, 'dat', 'ngon nha vip', 4, '2025-04-17'),
(46, 49, 'dat', 'cũng đc á', 5, '2025-04-17'),
(48, 42, 'manh', 'hàng cũng tạm được', 2, '2025-04-20'),
(49, 42, 'duong', 'Hàng ship nhanh nha', 4, '2025-04-20'),
(50, 43, 'adminC1', 'ngon đấy', 5, '2025-04-24'),
(51, 43, 'adminC1', 'vip  nha', 1, '2025-04-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id_con` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `messenger` varchar(1100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id_con`, `name`, `email`, `phone`, `messenger`) VALUES
(2, 'datrer', 'tr@yahoo.com', 123, ''),
(4, 'tu', 'fd@yahoo.com', 2314, ''),
(8, 'datreal', 'fr@yahoo.com', 123, '423432'),
(9, 'Tú', 'Tuds@gmail.com', 213321, 'ok nha');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id_image` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `path` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id_image`, `id_pro`, `path`) VALUES
(76, 41, 'vietquat2.jpg'),
(77, 41, 'vietquat3.jpg'),
(78, 41, 'vietquat4.jpg'),
(79, 41, 'vietquat5.jpg'),
(80, 42, 'kiwi2.jpg'),
(81, 42, 'kiwi3.jpg'),
(82, 42, 'kiwi4.jpg'),
(83, 43, 'tao2.jpg'),
(84, 43, 'tao3.jpg'),
(85, 43, 'tao4.png'),
(86, 44, 'le2.jpg'),
(87, 44, 'le3.jpg'),
(88, 44, 'le4.jpg'),
(89, 45, 'dau2.jpg'),
(90, 45, 'dau3.jpg'),
(91, 45, 'dau4.jpg'),
(92, 46, 'tao6.jpg'),
(93, 46, 'tao7.jpg'),
(94, 46, 'tao8.jpg'),
(95, 47, 'nho2.jpg'),
(96, 47, 'nho3.jpg'),
(97, 47, 'nho4.jpg'),
(98, 48, 'kiwi12.jpg'),
(99, 48, 'kiwi13.jpg'),
(100, 49, 'me2.jpg'),
(101, 49, 'me3.jpg'),
(102, 49, 'me4.jpg'),
(103, 50, 'luu2.jpg'),
(104, 50, 'luu3.jpg'),
(105, 50, 'luu4.jpg'),
(106, 51, 'buoi2.jpg'),
(107, 51, 'buoi3.jpg'),
(108, 51, 'buoi4.jpg'),
(109, 52, 'dua2.jpg'),
(110, 52, 'dua3.jpg'),
(111, 52, 'dua4.jpg'),
(112, 52, 'dua5.jpg'),
(113, 53, 'caibe2.jpg'),
(114, 53, 'caibe3.jpg'),
(115, 53, 'caibe4.jpg'),
(116, 54, 'lang2.jpg'),
(117, 54, 'lang3.jpg'),
(118, 54, 'lang4.jpg'),
(119, 55, 'tiato2.jpg'),
(120, 55, 'tiato3.jpg'),
(121, 55, 'tiato4.jpg'),
(122, 56, 'bapcai2.jpg'),
(123, 56, 'bapcai3.jpg'),
(124, 56, 'bapcai4.jpg'),
(125, 57, 'bi2.jpg'),
(126, 57, 'bi3.jpg'),
(127, 57, 'bi4.jpg'),
(130, 59, 'nam2.jpg'),
(131, 59, 'nam3.jpg'),
(132, 60, 'ngot2.jpg'),
(133, 60, 'ngot3.jpg'),
(134, 60, 'ngot4.jpg'),
(135, 61, 'bap2.jpg'),
(136, 61, 'bap3.jpg'),
(137, 61, 'bap4.jpg'),
(138, 62, 'dieu2.jpg'),
(139, 62, 'dieu3.jpg'),
(140, 62, 'dieu4.jpg'),
(141, 63, 'chia1.jpg'),
(142, 63, 'chia3.jpg'),
(143, 63, 'chia4.jpg'),
(144, 64, 'de2.jpg'),
(145, 64, 'de3.jpg'),
(146, 64, 'de4.jpg'),
(147, 65, 'macca2.jpg'),
(148, 65, 'macca3.jpg'),
(149, 65, 'macca4.jpg'),
(150, 66, '3.jpg'),
(151, 66, '2.jpg'),
(152, 67, 'xoai3.png'),
(153, 67, 'xoai2.png'),
(154, 67, 'xoai1.png'),
(158, 58, ''),
(159, 70, 'bi-dẹp.png'),
(160, 70, 'ca-chua-bi-saad.png'),
(161, 70, 'Ca-chua-Cherry-dai-do.png'),
(162, 71, '15-800x450.png'),
(163, 71, '14-800x450.png'),
(164, 71, '631582122fa34khoai-lang-tim-bao.png'),
(169, 72, '444504825_468608755742987_406248.png'),
(170, 72, 'add_a_heading_1b0977a8b19d4ee288.png'),
(171, 72, 'chom-chom-thai-6.png'),
(172, 73, '6147314f-96c9-4dc5-83c6-e8c0049a.png'),
(173, 73, 'thanh-long-1724776610022.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_pro` varchar(20) NOT NULL,
  `name_pro` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_pro`, `name_pro`, `quantity`, `total`) VALUES
(13, '41', 'Việt Quất New Zealand Nhập Khẩu', 5, 600000),
(13, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 3, 600000),
(17, '47', 'Nho Xanh Autumn', 1, 250000),
(18, '48', 'Kiwi ruột đỏ nhập khẩu', 3, 900000),
(18, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(19, '41', 'Việt Quất New Zealand Nhập Khẩu', 2, 240000),
(19, '52', 'Dưa hấu không hạt', 5, 500000),
(20, '47', 'Nho Xanh Autumn', 1, 250000),
(20, '48', 'Kiwi ruột đỏ nhập khẩu', 4, 1200000),
(21, '41', 'Việt Quất New Zealand Nhập Khẩu', 5, 600000),
(21, '47', 'Nho Xanh Autumn', 4, 1000000),
(22, '66', 'Mây bali', 4, 800000),
(22, '48', 'Kiwi ruột đỏ nhập khẩu', 5, 1500000),
(22, '51', 'Bưởi da xanh Phú Quý', 3, 270000),
(26, '46', 'Táo Rockit New Zealand Nhập Khẩu', 5, 650000),
(27, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(27, '48', 'Kiwi ruột đỏ nhập khẩu', 1, 300000),
(29, '41', 'Việt Quất New Zealand Nhập Khẩu', 1, 120000),
(29, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(30, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(31, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(32, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(32, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(33, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(33, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(34, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(34, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(35, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(35, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 2, 400000),
(36, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(37, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(38, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(39, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(40, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(40, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 3, 600000),
(41, '43', 'Táo Envy Nhập Khẩu New Zealand', 5, 550000),
(42, '43', 'Táo Envy Nhập Khẩu New Zealand', 5, 550000),
(43, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(43, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(44, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 100, 20000000),
(45, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(46, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 2, 400000),
(47, '41', 'Việt Quất New Zealand Nhập Khẩu', 2, 240000),
(48, '45', 'Dâu Tây Hàn Quốc Vip', 1, 250000),
(49, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(50, '49', 'Me ngâm chua ngọt nhập khẩu Thái Lan', 1, 120000),
(51, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(52, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(53, '44', 'Lê Hàn Quốc Nhập Khẩu', 1, 110000),
(53, '51', 'Bưởi da xanh Phú Quý', 5, 450000),
(54, '73', 'Thanh long ruột đỏ', 100, 12000000),
(55, '72', 'Chôm chôm Thái', 50, 3750000),
(56, '70', 'Cà chua cherry', 16, 1104000),
(56, '52', 'Dưa hấu không hạt', 1, 100000),
(57, '57', 'Bí đỏ non', 600, 18000000),
(58, '44', 'Lê Hàn Quốc Nhập Khẩu', 5, 550000),
(58, '46', 'Táo Rockit New Zealand Nhập Khẩu', 5, 650000),
(58, '47', 'Nho Xanh Autumn', 5, 1250000),
(59, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(59, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(59, '41', 'Việt Quất New Zealand Nhập Khẩu', 1, 120000),
(60, '47', 'Nho Xanh Autumn', 4, 1000000),
(60, '41', 'Việt Quất New Zealand Nhập Khẩu', 1, 120000),
(61, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(62, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(63, '50', 'Lựu đỏ Peru', 5, 900000),
(64, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(65, '72', 'Chôm chôm Thái', 1, 75000),
(65, '49', 'Me ngâm chua ngọt nhập khẩu Thái Lan', 1, 120000),
(66, '50', 'Lựu đỏ Peru', 3, 540000),
(67, '42', 'Quả Kiwi Vàng Zespri New Zealand Organic', 1, 200000),
(67, '45', 'Dâu Tây Hàn Quốc Vip', 1, 250000),
(68, '43', 'Táo Envy Nhập Khẩu New Zealand', 1, 110000),
(69, '41', 'Việt Quất New Zealand Nhập Khẩu', 4, 480000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_pro`
--

CREATE TABLE `order_pro` (
  `id_order` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `name_customer` varchar(60) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_order` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_pro`
--

INSERT INTO `order_pro` (`id_order`, `userName`, `name_customer`, `phone`, `address`, `date`, `total_order`, `payment`, `status`) VALUES
(13, 'dat', 'vu datdd', 3243, 'rưer, rưere, ửer', '2025-03-22 02:30:15', 1230000, 'Chuyển khoản qua ngân hàng', 'Đang vận chuyển'),
(17, 'dat', 'vu datdd', 3243, 'rưer, rưere, ửer', '2025-03-22 02:31:25', 280000, 'Thanh toán khi nhận hàng', 'Đang vận chuyển'),
(18, 'dat', 'vu datdd', 3243, 'rưer, rưere, ửer', '2025-03-22 02:45:34', 1130000, 'Thanh toán khi nhận hàng', 'Chờ'),
(19, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-03-22 09:48:51', 770000, 'Chuyển khoản qua ngân hàng', 'Đang xử lý'),
(20, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-03-22 09:03:56', 1480000, 'Chuyển khoản qua ngân hàng', 'Hoàn thành'),
(21, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-03-22 09:49:14', 1630000, 'Thanh toán khi nhận hàng', 'Đang vận chuyển'),
(22, 'dat', 'vu datdd', 1678843243, '12, Đại sơn, Thái Nguyên', '2025-03-30 02:25:43', 2600000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(26, 'dat', 'vu datdd', 1678843243, '12, Đại sơn, Thái Nguyên', '2025-04-02 09:05:37', 680000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(27, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-02 09:50:28', 530000, 'Thanh toán khi nhận hàng', 'Chờ'),
(29, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-03 01:29:11', 0, 'Thanh toán khi nhận hàng', 'Chờ'),
(30, 'dat', 'vu datdd', 1678843243, '12, Đại sơn, Thái Nguyên', '2025-04-03 02:22:04', 0, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(31, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-03 02:24:14', 0, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(32, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-03 02:28:30', 340000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(33, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-01-22 02:54:32', 340000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(34, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-03 02:56:19', 340000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(35, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-02-19 02:57:04', 540000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(36, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-04-10 15:22:42', 140000, 'Chuyển khoản qua ngân hàng', 'Hoàn thành'),
(37, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-04-03 09:34:58', 140000, 'Thanh toán khi nhận hàng', 'Chờ'),
(38, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-04-04 14:59:04', 140000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(39, 'cuong', 'nguyen cuong r', 4313213, '12, Nam từ liêm, Hà Nội', '2025-04-04 15:03:50', 140000, 'Thanh toán khi nhận hàng', 'Chờ'),
(40, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-19 16:14:17', 740000, 'Thanh toán khi nhận hàng', 'Chờ'),
(41, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-20 03:53:27', 580000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(42, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-20 03:53:34', 580000, 'Thanh toán khi nhận hàng', 'Chờ'),
(43, 'manh', 'Vũ Mạnh', 321435321, '213, Nam từ liêm , Hà Nội', '2025-04-20 08:28:41', 340000, 'Thanh toán khi nhận hàng', 'Hoàn thành'),
(44, 'duong', 'vu duong', 45354, '112, nam từ liêm, hà nội', '2025-04-20 08:46:41', 20030000, 'Thanh toán khi nhận hàng', 'Chờ'),
(45, 'duong', 'vu duong', 45354, '112, nam từ liêm, hà nội', '2025-04-24 14:59:32', 230000, 'Chuyển khoản qua ngân hàng', 'Chờ thanh toán'),
(46, 'dương', 'vu duong', 45354, '112, nam từ liêm, hà nội', '2025-04-24 15:15:04', 430000, 'Thanh toán khi nhận hàng', 'Chờ'),
(47, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-27 09:15:27', 0, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(48, 'dat', 'vu datdd', 1678843243, '12, Đại sơn, Thái Nguyên', '2025-04-27 09:15:42', 0, 'Thanh toán khi nhận hàng', 'Chờ'),
(49, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-04-27 13:39:22', 0, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(50, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2024-06-13 13:59:30', 120000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(51, 'duong', 'vu duong', 45354, '112, nam từ liêm, hà nội', '2025-04-27 15:24:21', 110000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(52, '', 'ewqe', 1322, 'dưq', '2025-05-02 08:40:37', 200000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(53, 'duong', 'vu duong', 45354, '112, nam từ liêm, hà nội', '2025-03-19 09:40:07', 560000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(54, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-02-18 10:02:14', 12000000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(55, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-01-30 10:00:34', 3750000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(56, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-05-03 08:59:35', 1204000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(57, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 09:36:39', 18000000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(58, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 09:52:57', 2480000, 'Thanh toán khi nhận hàng', 'Chờ'),
(59, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 10:04:43', 460000, 'Thanh toán khi nhận hàng', 'Chờ'),
(60, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 10:26:42', 1120000, 'Thanh toán khi nhận hàng', 'Chờ'),
(61, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 10:30:58', 110000, 'Thanh toán khi nhận hàng', 'Chờ'),
(62, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-03 10:31:10', 200000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(63, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-04 08:32:52', 900000, 'Thanh toán khi nhận hàng', 'Chờ'),
(64, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-04 08:38:39', 200000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(65, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-05-05 14:57:08', 195000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(66, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-05-07 15:50:19', 540000, 'Thanh toán khi nhận hàng', 'Chờ'),
(67, 'cuong', 'nguyen cuong', 4313213, '12, Nam từ liêm, Hà Nội', '2025-05-07 15:57:46', 450000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(68, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-05-08 03:23:35', 110000, 'Chuyển khoản qua ngân hàng', 'Chờ'),
(69, 'dat', 'vu datdd', 1678843243, 'Hà Nội ', '2025-05-08 04:02:40', 480000, 'Chuyển khoản qua ngân hàng', 'Chờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `date` date NOT NULL,
  `price` int(10) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `category`, `image`, `quantity`, `date`, `price`, `price_sale`, `description`) VALUES
(41, 'Việt Quất New Zealand Nhập Khẩu', 'Trái Cây', 'vietquat1.jpg', 952, '2024-07-24', 150000, 120000, 'Việt Quất New Zealand  thương hiệu rất nổi tiếng tại New Zealand và cũng quá quen thuộc với những tín đồ yêu mến Trái Việt Quất. Trái vừa cứng cắn vào bụp bụp luôn, ngọt thơm, chua nhẹ,  bảo đảm là loại việt quất ngon nhất trên thị trường hiện tại.'),
(42, 'Quả Kiwi Vàng Zespri New Zealand Organic', 'Trái Cây', 'kiwi1.jpg', 833, '2024-07-24', 220000, 200000, 'Trái Kiwi được đánh giá là 1 trong 10 loại trái cây ngon nhất mà thế giới từng biết đến. Hiện nay, kiwi vàng được trồng đại trà ở nhiều nơi, có thể kể đến như: New Zealand, Pháp, Nhật Bản, Úc, Mỹ, Ý… Có một điểm trung gian dễ nhận thấy giữa các vùng trồng kiwi là các nước đều có quy mô lớn. Đất nước này có một nền nông nghiệp thịnh vượng, với trình độ công nghệ cực cao.'),
(43, 'Táo Envy Nhập Khẩu New Zealand', 'Trái Cây', 'tao1.jpg', 959, '2024-07-24', 110000, NULL, 'Hiện nay, trên thị trường trái cây nhập khẩu có rất nhiều loại táo, tuy nhiên táo Envy New Zealand vẫn là giống táo được ưa chuộng nhất bởi vị ngọt dịu, hương thơm nồng nàn rất riêng, thịt táo giòn và chắc. Đặc biệt, ruột táo có thể giữ được màu trắng tinh khi để ngoài không khí nhiều giờ mà không bị ngả vàng như các loại táo khác.'),
(44, 'Lê Hàn Quốc Nhập Khẩu', 'Trái Cây', 'le1.jpg', 977, '2024-07-24', 110000, NULL, 'Lê Hàn Quốc được trồng ở vùng Nachi. Lê Hàn Quốc là loại lê cao cấp nhất được tuyển chọn tại những vườn danh tiếng nhất Hàn Quốc. Với kích thước quả rất to khoảng 800gr-1000gr/quả, vỏ mỏng, nhẵn, không tì vết, cùi giòn, ngọt và mọng nước, chắc chắn bạn sẽ thấy sự khác biệt trong hương vị của những trái lê chuyên xuất khẩu trên thị trường. Nhật Bản, Mỹ, Đức…'),
(45, 'Dâu Tây Hàn Quốc Vip', 'Trái Cây', 'dau1.jpg', 975, '2024-07-24', 250000, NULL, 'Dâu Hàn Quốc Golden Farm được mệnh danh là “nữ hoàng trái cây” của xứ sở Kim Chi. Chinh phục người tiêu dùng bởi hương thơm tự nhiên. Vị ngọt tinh tế cũng như hình thức và chất lượng vượt trội.\r\n\r\nDâu tây Hàn Quốc có tiêu chuẩn chất lượng vượt trội nhờ hệ thống quản lý chất lượng nghiêm ngặt bằng công nghệ nông trại thông minh. Đặc biệt, người trồng dâu hạn chế tối đa việc sử dụng thuốc bảo vệ thực vật theo tiêu chuẩn GAP.'),
(46, 'Táo Rockit New Zealand Nhập Khẩu', 'Trái Cây', 'tao5.jpg', 964, '2024-07-24', 130000, NULL, 'Táo Rockit New Zealand có vị ngọt, giòn, mùi thơm dịu đặc trưng. Được mệnh danh là một trong những loại táo ngon nhất thế giới, táo rockit cũng nằm trong danh sách những loại táo cao cấp nhất hiện nay. Với mong muốn mang đến cho khách hàng trong nước cơ hội thưởng thức trái cây nhập khẩu an toàn, chất lượng, luôn mua được sản phẩm với giá tốt nhất trên thị trường.'),
(47, 'Nho Xanh Autumn', 'Trái Cây', 'nho1.jpg', 978, '2024-07-24', 280000, 250000, 'Nho Xanh Autumn Crisp Sunworld USA\r\n\r\nNho xanh mùa thu giòn Thương hiệu Sunworld ® đã quá nổi tiếng trên thế giới, trong số các chủng loại nho xanh trên thế giới hiện nay, Autumn Crisp là chủng nho xanh được yêu thích hàng đầu.'),
(48, 'Kiwi ruột đỏ nhập khẩu', 'Trái Cây', 'kiwi11.jpg', 0, '2024-07-24', 300000, NULL, 'Kiwi ruột đỏ Đài Loan là loại quả có hình bầu dục, vỏ màu nâu sẫm, thịt quả màu vàng xen lẫn hạt và các tia đỏ rất nổi bật và đẹp mắt. Kiwi sở hữu vị chua ngọt hoàn hảo, mùi thơm đặc trưng, thịt quả bùi bùi cung cấp cho cơ thể lượng vitamin vô cùng phong phú.'),
(49, 'Me ngâm chua ngọt nhập khẩu Thái Lan', 'Rau xanh', 'me1.jpg', 998, '2024-07-24', 120000, NULL, 'Me thái miếng to có vị chua ngọt ngâm đường với 1 hũ muối ớt sẽ có thêm vị cay cay mặn mặn, ăn cùng muối tôm ớt để cảm nhận vị nguyên bản của me Thái, ăn miếng này là ghiền luôn . muốn ăn nhiều hơn. Nó là một món ăn nhẹ phổ biến. Sản phẩm rất thích hợp làm quà biếu, ăn tốt cho cả bà bầu và trẻ em, được đóng gói tiện dụng, thuận tiện mang theo khi đi du lịch hoặc làm quà biếu vì rất lạ miệng và thơm ngon.'),
(50, 'Lựu đỏ Peru', 'Quả nhiệt đới', 'luu1.jpg', 991, '2024-07-25', 200000, 180000, 'Lựu nhập khẩu trực tiếp từ Peru theo đường hàng không size lớn, trái to, vỏ màu hồng đỏ, hạt đỏ thẫm, nhiều nước, ăn rất ngon, bên cạnh đó còn chứa nhiều vitamin và các khoáng chất có lợi cho sức khỏe và phòng ngừa bệnh tật.'),
(51, 'Bưởi da xanh Phú Quý', 'Trái Cây', 'buoi1.jpg', 991, '2024-07-25', 90000, NULL, '- Tăng cường hệ miễn dịch: bưởi cung cấp khoảng 600% nhu cầu vitamin C   hàng ngày của cơ thể. Lượng vitamin C này có thể giúp bạn tránh được  cảm  lạnh, sốt, nhiễm trùng và các chứng bệnh khác.\r\n\r\n- Điều hòa huyết áp: Bưởi có chứa một lượng kali cao giúp thư giãn các mạch máu và thúc đẩy sự lưu thông máu dễ dàng.\r\n\r\n- Củng cố xương cốt: Bởi trong bưởi rất giàu Kali giúp xương chắc khỏe.\r\n\r\n-  Giảm cân, giữ gìn vóc dáng: enzyme - carnitine palmitoyltransferase có   trong bưởi giúp quá trình giảm cân nhanh và cực kỳ an toàn.'),
(52, 'Dưa hấu không hạt', 'Trái Cây', 'dua1.jpg', 994, '2024-07-25', 100000, NULL, '- Giàu vitamin và khoáng chất: Cũng  giống như mọi loại quả khác, dưa  hấu rất giàu khoáng chất và vitamin.  Nó chứa nhiều vitamin A, B, C,  kali, sắt, canxi, mangan, kẽm, chất chống  oxy hóa và các chất dinh  dưỡng khác. \r\n\r\n- Tốt cho tim mạch và xương: Ăn nhiều dưa hấu giúp  cải thiện chức năng tim mạch vì nó cải thiện lưu  lượng máu. Dưa hấu  cũng rất giàu kali, giúp giữ canxi trong cơ thể, giúp  xương và khớp  mạnh hơn.'),
(53, 'Cải bẹ xanh', 'Rau xanh', 'caibe1.jpg', 999, '2024-07-25', 20000, 18000, 'Cải bẹ xanh được biết đến với nhiều tên gọi như: cải xanh, cải đắng, cải canh, cải cay… Nó có tên khoa học là Brassica juncea (L.) Cải bẹ xanh có màu xanh, vị đắng nhẹ, cay mạnh. Loại cải này thường được dùng để luộc, nấu canh hoặc xào, dùng làm rau sống ăn kèm.'),
(54, 'Rau lang', 'Rau xanh', 'lang1.jpg', 1000, '2024-07-25', 10000, NULL, 'Rau lang là một bộ phận của cây khoai lang (tên gọi khoa học là Ipomoea batatas), thuộc loại cây thân thảo dây leo. Do đó, rau lang cũng được gọi là rau khoai lang và được biết đến với nhiều tên gọi trong Y học cổ truyền như phiên chử, cam thử,….'),
(55, 'Tía tô', 'Rau xanh', 'tiato1.jpg', 1000, '2024-07-24', 60000, NULL, 'Là loại cây thân thảo có chiều cao tầm 0,5 – 1 m. Toàn thân có lông. Lá tía tô có lông nhám, mép khía răng, mọc đối xứng. Mặt dưới thường có màu tím, đôi khi cả hai mặt đều có màu tím, xanh lục hoặc nâu. Hoa có màu trắng hoặc tím mọc thành xim co ở đầu cành. Quả hình cầu.'),
(56, 'Bắp cải tím', 'Rau xanh', 'bapcai1.jpg', 998, '2024-07-25', 16000, NULL, 'Bắp cải tím là một cây thuộc cải, có hình tròn, được tạo thành từ nhiều lớp lá cứng bên ngoài có màu tím, bên trong ruột màu trắng cuộn chặt với nhau, khi cầm lên nặng và chắc tay. Lá của bắp cải tím sẽ cứng và giòn hơn bắp cải xanh do thời gian trồng lâu hơn.\r\nKhi ăn có vị giòn ngọt, có thể ăn sốnghoặc nấu chín, và thường được dùng để tăng thêm hương vị, màu sắc cho các món salad, món xào, gỏi,...'),
(57, 'Bí đỏ non', 'Trái Cây', 'bi1.jpg', 400, '2024-07-25', 30000, NULL, 'Bí đỏ non là một loại bí có hình tròn, kích thước khá nhỏ, chỉ khoảng 1 nắm tay. Vỏ có màu xanh đậm, mềm, có thể ăn được cả vỏ. Phần thịt bên trong có màu vàng nhạt, vị ngọt thanh, béo nhẹ.\r\nBí đỏ non có thể chế biến thành nhiều món ăn hấp dẫn như các món canh, luộc, xào, làm bánh, nấu chè... Loại bí này rất được ưa chuộng để chế biến món ăn cho trẻ nhỏ vì có hàm lượng dinh dưỡng cao.'),
(58, 'Tỏi cô đơn', 'Trái Cây', 'toi3.jpg', 0, '2024-07-25', 150000, 143000, 'Tỏi cô đơn là đặc sản nổi tiếng của đảo Lý Sơn (Quảng Ngãi). Điều khác biệt ở đây là tỏi chỉ có duy nhất một tép, khác hẳn với những loại tỏi thông thường khác. Vì lẽ đó, tất cả chất dinh dưỡng sẽ tập trung vào đúng một tép một cách tự nhiên nhất mà không cần bất cứ sự tác động nào từ bên ngoài.\r\nĐây là loại tỏi thơm ngon đặc biệt, được trồng tại vùng đất đỏ được hình thành và khai sinh do hoạt động của núi lửa và sự bồi đắp của cát biển trắng mịn, tinh khiết. Đây là điều kiện lý tưởng để tỏi cô đơn ở Lý Sơn phát triển.'),
(59, 'Nấm mối đen', 'Rau xanh', 'nam1.jpg', 1000, '2024-07-25', 650000, 630000, 'Nấm mối trước đây chỉ phát triển tự nhiên trong điều kiện thích hợp vào mùa mưa, đặc biệt ở các tỉnh miền Tây Nam bộ ở Việt nam. Tuy nhiên, đó là loại nấm mối trắng, với nấm mối đen đây là loại nấm được người dân nuôi trồng với một điều kiện thời tiết nhất định và cần có kỹ thuật cao khi trồng và chăm sóc nấm nếu muốn có được một sản phẩm nấm chất lượng.'),
(60, 'Rau ngót', 'Rau xanh', 'ngot1.jpg', 993, '2024-07-25', 30000, NULL, 'Cây rau ngót thực sự là một loài thực vật kỳ diệu, với lá và hạt vượt trội hơn bánh mì nướng về cả hương vị và kết cấu, khi chúng chứa đầy dinh dưỡng, vi chất dinh dưỡng, vitamin và khoáng chất để giúp bạn mạnh mẽ hơn trong ngày.'),
(61, 'Bắp mỹ', 'Rau xanh', 'bap1.jpg', 1000, '2024-07-25', 27000, 24000, 'Bắp Mỹ hay còn gọi là ngô ngọt, bắp ngọt có nguồn gốc từ Mỹ. Tại Châu Mỹ giống bắp này được trồng nhiều, nghiên cứu lai ghép cho năng suất cực cao. Khoảng những năm 1990 giống bắp này được du nhập vào nước ta sau đó phát triển rộng rãi cho đến ngày ngay.'),
(62, 'Hạt điều vị sầu riêng HAPPY NUTS', 'Hạt khô', 'dieu.jpg', 1000, '2024-07-25', 550000, 500000, 'Hạt điều vị sầu riêng nhà Happy Nuts với 100% nguyên liệu được chọn lọc từ Bình Phước, vùng đất có chất lượng hạt điều ngon nhất thế giới. Mỗi hạt được phủ một lớp bột sầu riêng sấy thăng hoa nguyên chất 100%, hoàn toàn không hương liệu và chất bảo quản giúp giữ nguyên vị thật của sầu riêng hoà quyện với vị béo, ngọt và giòn của hạt điều.'),
(63, 'Hạt chia', 'Hạt khô', 'chia.jpg', 1000, '2024-07-25', 180000, NULL, 'Hạt chia là một siêu thực phẩm giàu dinh dưỡng và có nhiều lợi ích cho sức khỏe, bao gồm hỗ trợ sức khỏe tim mạch, giảm cân, tăng cường sức đề kháng và hỗ trợ sức khỏe tiêu hóa.'),
(64, 'Hạt dẻ cười', 'Hạt khô', 'de1.jpg', 989, '2024-07-25', 630000, NULL, 'Hạt dẻ cười Happy Nuts có xuất xứ từ Mỹ với 99,95% hạt dẻ cười và 0,05% muối. Hạt dẻ cười là lựa chọn tối ưu cho những ai đang theo chế độ ăn lành mạnh. Đây là thực phẩm cung cấp đầy đủ 4 nhóm đạm, chất béo, bột đường, vitamin và khoáng chất.'),
(65, 'Hạt Macca Úc nứt vỏ', 'Hạt khô', 'macca1.jpg', 1000, '2024-07-25', 500000, 460000, 'Hạt Macca (maccadamia hay macca) là hạt của cây maccadamia, loại cây phổ biến ở Úc. Nhân hạt macca có vị béo, bùi, thơm ngon. Vì những dưỡng chất trong hạt như giàu protein, chất chống oxy hóa, vitamin và khoáng chất… nên ngoài dùng làm thực phẩm thì macca còn được ứng dụng vào làm đẹp.'),
(66, 'Mây bali', 'Quả nhiệt đới', 'Untitled.jpg', 196, '2025-03-08', 200000, NULL, 'Siêu ngon mát mẻ mùa hè '),
(67, 'xoài', 'Trái Cây', 'xoai1.png', 132, '2025-04-02', 25000, NULL, 'Thơm ngon mát mùa hè'),
(70, 'Cà chua cherry', 'Trái Cây', 'ca-chua-cherry-la-gi-cac-loai-ca.png', 484, '2025-04-29', 100000, 69000, 'Cà chua cherry nhỏ, mọng nước, vị ngọt thanh, thích hợp cho salad hoặc ăn sống.'),
(71, 'Khoai lang tím', 'Trái Cây', 'Khoai-lang-tim-1kg-gom-5-7-cu.png', 300, '2025-04-28', 40000, NULL, 'Khoai lang tím giàu chất chống oxy hóa, vị ngọt bùi, dùng để nướng hoặc nấu chè.'),
(72, 'Chôm chôm Thái', 'Quả nhiệt đới', 'chom-chom-thai-2.png', 199, '2025-04-16', 80000, 75000, 'Chôm chôm Thái ngọt, mọng nước, vỏ đỏ tươi, dễ bóc, rất được ưa chuộng.'),
(73, 'Thanh long ruột đỏ', 'Trái Cây', '2-1724777037693.png', 245, '2025-04-16', 150000, 120000, 'Thanh long ruột đỏ ngọt thanh, giàu dinh dưỡng, phù hợp làm sinh tố hoặc ăn trực tiếp.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `phone`, `email`) VALUES
(1, 'tú', '12345678', 432, 'fff'),
(6, 'dat', '12345678', 7567, 'dat@yahoo.com'),
(9, 'ytyr', '12345678', 645654, '4342sdfds'),
(11, 'hung', '12345678', 0, 'hung@yahoo.com'),
(12, 'cuong', '12345678', 0, 'cuong@yahoo.com'),
(14, 'Lan', '$2y$10$0ux1AFzq4PuQwVzleATjbOo', 0, 'lan@yahoo.com'),
(15, 'nhat', '$2y$10$xkdVePHBEPXxu7rRcQExX.a', 0, 'nhat@yahoo.com'),
(16, 'tuan', '$2y$10$mrm2lvaLAcVtMm6zIjM0PeG', 0, 'tuan@yahoo.com'),
(17, 'dung', '$2y$10$fUsjwJubpmlOAerv4QTi0uj', 0, 'dung@yahoo.com'),
(18, 'ngoc', '$2y$10$Ql6UCw2OIuh5bOI8jpHmW.J', 0, 'ngoc@yahoo.com'),
(19, 'tung', '$2y$10$b0hi4PTpdWDpvIabHXPkAeG', 0, 'tung@yahoo.com'),
(20, 'loan', '12345678', 0, 'loan@yahoo.com'),
(21, 'manh', '12345678', 0, 'manh123@yahoo.com'),
(22, 'duong', '12345678', 0, 'duong@yahoo.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`, `email`, `phone`, `role`) VALUES
(1, 'adminC1', '123', 'dat@gmail.com', 236514789, '1'),
(2, 'adminC2', '123', 'test@yahoo.com', 456789, '2'),
(3, 'fsfd', '123', 'fdsfs', 21321, '2'),
(4, 'dẻwrre', '123', 'dsad', 3123, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `name_pro` varchar(150) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wish_list`
--

INSERT INTO `wish_list` (`id`, `id_pro`, `image`, `name_pro`, `price`) VALUES
(14, 50, 'luu1.jpg', 'Lựu đỏ Peru', 200000),
(17, 47, 'nho1.jpg', 'Nho Xanh Autumn', 280000),
(19, 51, 'buoi1.jpg', 'Bưởi da xanh Phú Quý', 90000),
(20, 43, 'tao1.jpg', 'Táo Envy Nhập Khẩu New Zealand', 110000),
(22, 65, 'macca1.jpg', 'Hạt Macca Úc nứt vỏ', 500000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Chỉ mục cho bảng `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_con`);

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `order_pro`
--
ALTER TABLE `order_pro`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=935;

--
-- AUTO_INCREMENT cho bảng `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT cho bảng `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_pro` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
