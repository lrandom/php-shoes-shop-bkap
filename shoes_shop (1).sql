-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2022 lúc 03:16 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Boots'),
(2, 'Sneakner'),
(3, 'Clothes'),
(4, 'Casual');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `content`, `image`, `category_id`) VALUES
(1, 'Nike 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/16613425369326e8db8d8e4e509e42ad26010cf693_9366.webp', 1),
(2, 'Nike 02', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342555c7227d99699243099c24ac5e00406c2c_9366.webp', 1),
(3, 'Nike 03', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342566e20484c2-2b66-4124-b692-ad132a4ef9a5.webp', 1),
(4, 'Adidas 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/166134259010bad0b9-abd3-47e2-8fc0-1323d2f6a3f2.webp', 2),
(5, 'Nike 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/16613425369326e8db8d8e4e509e42ad26010cf693_9366.webp', 1),
(6, 'Nike 02', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342555c7227d99699243099c24ac5e00406c2c_9366.webp', 1),
(7, 'Nike 03', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342566e20484c2-2b66-4124-b692-ad132a4ef9a5.webp', 1),
(8, 'Adidas 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/166134259010bad0b9-abd3-47e2-8fc0-1323d2f6a3f2.webp', 2),
(9, 'Nike 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/16613425369326e8db8d8e4e509e42ad26010cf693_9366.webp', 1),
(10, 'Nike 02', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342555c7227d99699243099c24ac5e00406c2c_9366.webp', 1),
(11, 'Nike 03', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342566e20484c2-2b66-4124-b692-ad132a4ef9a5.webp', 1),
(12, 'Adidas 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/166134259010bad0b9-abd3-47e2-8fc0-1323d2f6a3f2.webp', 2),
(13, 'Nike 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/16613425369326e8db8d8e4e509e42ad26010cf693_9366.webp', 1),
(14, 'Nike 02', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342555c7227d99699243099c24ac5e00406c2c_9366.webp', 1),
(15, 'Nike 03', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/1661342566e20484c2-2b66-4124-b692-ad132a4ef9a5.webp', 1),
(16, 'Adidas 01', '100', '&lt;p&gt;Huge Selection Of Products For Men, Women &amp;amp; Kids At Great Prices. Download the &lt;strong&gt;adidas&lt;/strong&gt; app! Offers Products For Multiple Sports Activities Like Running, Training, Football and More. Min Spend 1.3M VNĐ. Fast Returns. Free Shipping. Types: Shoes, Apparels, Accessories.&lt;/p&gt;', '/uploads/08-2022/166134259010bad0b9-abd3-47e2-8fc0-1323d2f6a3f2.webp', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`) VALUES
(1, 'admin@gmail.com', 'e9cc3f037e8ed88090a7ed47d304b129', '121212');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
