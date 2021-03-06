-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2015 at 01:42 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(19, 'My Album', 'My album', '2015-04-12 01:48:17', '2015-04-12 01:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Artikel', '2014-11-03 02:09:32', '2014-11-03 02:14:15'),
(3, 'Tips and Trik', '2014-11-03 02:10:28', '2014-11-03 02:14:36'),
(4, 'Kesehatan', '2014-12-15 04:18:07', '2014-12-15 04:18:07'),
(5, 'Events', '2015-02-14 05:36:05', '2015-02-14 05:36:05'),
(6, 'Berita', '2015-02-17 01:50:05', '2015-02-17 01:50:05'),
(7, 'Review', '2015-02-17 01:50:16', '2015-02-17 01:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_items`
--

CREATE TABLE IF NOT EXISTS `file_items` (
  `id` int(10) unsigned NOT NULL,
  `file_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE IF NOT EXISTS `galeries` (
  `id` int(10) unsigned NOT NULL,
  `album_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '{"superuser":1,"view-users-list":1,"posts-delete":1}', '2014-11-27 19:14:06', '2014-12-15 01:31:34'),
(2, 'Guest', '{"view-users-list":1,"view-posts-list":1,"posts-edit":1}', '2014-11-29 04:58:17', '2014-12-14 04:44:48'),
(3, 'momod', '{"view-users-list":1}', '2014-12-07 02:23:02', '2014-12-07 02:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `group_menus`
--

CREATE TABLE IF NOT EXISTS `group_menus` (
  `id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_menus`
--

INSERT INTO `group_menus` (`id`, `group_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(8, 1, 1, '2015-02-26 20:57:19', '2015-02-26 20:57:19'),
(9, 1, 4, '2015-02-26 20:57:53', '2015-02-26 20:57:53'),
(10, 3, 4, '2015-02-26 20:57:53', '2015-02-26 20:57:53'),
(11, 1, 5, '2015-02-26 21:29:07', '2015-02-26 21:29:07'),
(12, 1, 7, '2015-02-26 21:29:49', '2015-02-26 21:29:49'),
(13, 1, 15, '2015-02-27 00:02:38', '2015-02-27 00:02:38'),
(14, 1, 16, '2015-02-27 00:02:53', '2015-02-27 00:02:53'),
(15, 1, 17, '2015-02-27 00:04:51', '2015-02-27 00:04:51'),
(16, 1, 18, '2015-02-27 00:05:06', '2015-02-27 00:05:06'),
(17, 1, 8, '2015-02-27 00:05:21', '2015-02-27 00:05:21'),
(18, 1, 14, '2015-02-27 00:06:06', '2015-02-27 00:06:06'),
(19, 1, 9, '2015-02-27 00:06:20', '2015-02-27 00:06:20'),
(20, 1, 13, '2015-02-27 00:07:20', '2015-02-27 00:07:20'),
(21, 1, 2, '2015-02-27 00:07:51', '2015-02-27 00:07:51'),
(22, 1, 12, '2015-02-27 00:08:01', '2015-02-27 00:08:01'),
(23, 1, 3, '2015-02-27 00:08:11', '2015-02-27 00:08:11'),
(24, 1, 11, '2015-02-27 00:08:27', '2015-02-27 00:08:27'),
(25, 1, 10, '2015-02-27 00:08:41', '2015-02-27 00:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `download` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `name`, `description`, `status`, `download`, `created_at`, `updated_at`) VALUES
(1, 'media 1', 'media 1 desc', 1, 1, '2015-02-13 17:00:00', '2015-02-14 04:06:31'),
(2, 'mama', 'mama', 0, 0, '2015-02-14 01:57:02', '2015-02-14 04:00:13'),
(4, 'papa', 'papaap', 1, 0, '2015-02-14 02:08:32', '2015-02-14 03:31:02'),
(5, 'kakak', 'kakak\r\n', 0, 0, '2015-02-14 04:08:06', '2015-02-14 04:08:06'),
(6, 'caca', 'vvavav', 0, 0, '2015-02-14 04:08:20', '2015-02-14 04:08:20'),
(7, 'lalal', 'lalalal', 0, 0, '2015-02-14 04:08:39', '2015-02-14 04:08:39'),
(8, 'haha', 'hahah', 0, 0, '2015-02-14 04:09:53', '2015-02-14 04:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `media_items`
--

CREATE TABLE IF NOT EXISTS `media_items` (
  `id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `download` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media_items`
--

INSERT INTO `media_items` (`id`, `media_id`, `file`, `description`, `download`, `created_at`, `updated_at`) VALUES
(1, 4, 'e154c24fa45c2d1e439a2ce510e5191bef81211c.png', 'dewi sartika.png', 0, '2015-02-14 02:08:32', '2015-02-14 02:08:32'),
(2, 4, '370428a73f190e108111634147703c7cbda5d325.png', 'download.png', 0, '2015-02-14 02:08:32', '2015-02-14 02:08:32'),
(5, 4, 'fbd8b5776dadd5a91037bd46425764f1bc1f4447.png', 'download (1).png', 0, '2015-02-14 03:25:04', '2015-02-14 03:25:04'),
(6, 1, 'eefd4ace4ff084566a073883bf27fa72e63f6610.png', 'TANDA-TANGAN-ANDI-W-WARSITO.png', 0, '2015-02-14 03:34:00', '2015-02-14 03:34:00'),
(7, 1, 'e05f147f4378575e0c21fa4fe642b654eec78923.jpg', 'stempel.jpg', 0, '2015-02-14 03:34:00', '2015-02-14 03:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `icon`, `class`, `order`, `disable`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'admin-default', 'fa fa-bar-chart-o', '', '0', NULL, '2014-12-24 00:13:19', '2015-02-18 02:03:33'),
(2, 0, 'Utilitas', '#', 'fa fa-wrench', '', '4', NULL, '2014-12-24 00:42:52', '2014-12-25 09:33:18'),
(3, 2, 'User', 'listUsers', 'fa fa-check', '', '1', NULL, '2014-12-24 00:47:10', '2014-12-24 01:10:41'),
(4, 0, 'CMS', '#', 'fa fa-money', '', '3', NULL, '2014-12-25 09:33:03', '2015-02-15 20:41:19'),
(5, 4, 'Post', 'posts-list', 'fa fa-cubes', '', '0', NULL, '2014-12-25 09:43:15', '2014-12-25 09:43:15'),
(7, 4, 'Category', 'category-list', 'fa fa-th-list', '', '1', NULL, '2014-12-27 08:28:15', '2014-12-27 08:28:15'),
(8, 4, 'Tags', 'tag-list', 'fa fa-th-list', '', '3', NULL, '2014-12-27 08:29:32', '2014-12-27 08:29:32'),
(9, 4, 'Album', 'album-list', 'fa fa-th', '', '4', NULL, '2014-12-27 08:30:56', '2014-12-27 08:30:56'),
(10, 2, 'Group', 'listGroups', 'fa fa-user', '', '1', NULL, '2014-12-27 21:48:26', '2014-12-27 21:48:26'),
(11, 2, 'Permission', 'listPermissions', 'fa fa-glass', '', '2', NULL, '2014-12-27 21:50:32', '2014-12-27 21:50:32'),
(12, 2, 'Menu', 'menu-list', 'fa fa-glass', '', '3', NULL, '2014-12-28 19:13:55', '2014-12-28 19:13:55'),
(13, 4, 'comment', 'comment-list', 'fa fa-glass', '', '2', NULL, '2014-12-28 19:32:03', '2014-12-28 19:32:03'),
(14, 4, 'Media', 'media-list', 'fa fa-cube', '', '6', NULL, '2015-02-14 05:17:51', '2015-02-14 05:17:51'),
(15, 0, 'Data', '#', 'fa fa-codepen', '', '3', NULL, '2015-02-15 20:39:32', '2015-02-19 10:27:23'),
(16, 15, 'Data Posisi', 'position-list', 'fa fa-share-alt', '', '0', NULL, '2015-02-15 20:42:53', '2015-02-15 20:42:53'),
(17, 15, 'Data Staff', 'staff-list', 'fa fa-male', '', '2', NULL, '2015-02-15 20:44:28', '2015-02-15 20:44:28'),
(18, 15, 'Data Schedule', 'schedule-list', 'fa fa-clock-o', '', '3', NULL, '2015-02-15 20:46:46', '2015-02-15 20:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_24_023924_create_posts_table', 1),
('2014_10_31_124829_add_status_to_users', 2),
('2014_10_31_125146_add_status_to_user_table', 3),
('2014_10_31_125235_add_status_to_posts', 4),
('2014_10_31_125324_add_status_to_post_table', 5),
('2014_11_01_083401_add_status_to_posts_table', 6),
('2014_11_02_043813_create_users_table', 7),
('2014_11_03_013522_add_remember_token_to_users_table', 8),
('2014_11_03_043231_add_user_id_to_posts_table', 9),
('2014_11_03_064705_create_categories_table', 10),
('2014_11_03_092925_add_category_id_to_posts_table', 11),
('2014_11_03_100634_add_image_to_posts_table', 12),
('2014_11_25_084752_create_tags_table', 14),
('2014_11_26_142344_create_post_tag_table', 15),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 16),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 16),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 16),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 16),
('2013_07_16_172358_alter_user_table', 17),
('2013_09_02_072804_create_permission_table', 17),
('2013_09_08_191339_update_admin_group_permission', 17),
('2014_12_01_085503_create_albums_table', 18),
('2014_12_01_085821_create_galeries_table', 18),
('2014_12_02_064456_create_photos_table', 19),
('2014_12_09_071430_create_settings_table', 20),
('2014_12_23_035553_create_menus_table', 21),
('2014_12_24_072905_update_column_menus', 22),
('2014_12_28_091737_create_comments_table', 23),
('2015_02_13_132922_create_files_table', 24),
('2015_02_13_133853_create_file_items_table', 25),
('2015_02_14_040317_create_medias_table', 26),
('2015_02_14_071950_create_media_items_table', 27),
('2015_02_15_033243_add_headline_is_comment_date_posting_comment_expired_to_posts_table', 28),
('2015_02_15_083003_create_post_albums_table', 29),
('2015_02_15_092653_create_positions_table', 30),
('2015_02_15_124548_create_staffs_table', 31),
('2015_02_16_023000_create_Schedules_table', 32),
('2015_02_19_074956_add_read_to_posts_table', 33),
('2015_02_20_023407_create_group_menus_table', 34),
('2015_02_22_124407_add_user_id_to_staffs_table', 35),
('2015_04_07_033010_add_sluggable_columns', 36);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'superuser', 'All permissions', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(2, 'List Users', 'view-users-list', 'View the list of users', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(3, 'Create user', 'create-user', 'Create new user', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(4, 'Delete user', 'delete-user', 'Delete a user', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(5, 'Update user', 'update-user-info', 'Update a user profile', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(6, 'Update user group', 'user-group-management', 'Add/Remove a user in a group', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(7, 'Groups management', 'groups-management', 'Manage group (CRUD)', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(8, 'Permissions management', 'permissions-management', 'Manage permissions (CRUD)', '2014-11-27 19:14:06', '2014-11-27 19:14:06'),
(9, 'List Posts', 'posts-list', 'Post List', '2014-12-14 03:18:11', '2014-12-14 20:37:58'),
(10, 'Edit Post', 'posts-edit', 'Edit Post', '2014-12-14 04:38:26', '2014-12-14 04:38:26'),
(11, 'Create Post', 'posts-create', 'posts-create', '2014-12-14 20:20:42', '2014-12-14 20:20:42'),
(12, 'Tag Autocomplete', 'tag_autocomplete', 'Auto Complete Tag', '2014-12-14 23:31:12', '2014-12-14 23:31:12'),
(13, 'Post Delete', 'posts-delete', 'Delete A Post', '2014-12-15 01:30:49', '2014-12-15 01:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL,
  `album_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `file`, `description`, `created_at`, `updated_at`) VALUES
(1, 19, '76355643e5be899049765d9e89622a562a8cf833.png', '', '2015-04-12 01:48:18', '2015-04-12 01:48:18'),
(2, 19, '17dd7cd198d5a676886a3c40f5b58fd37eff2a8b.jpg', '', '2015-04-12 01:48:44', '2015-04-12 01:48:44'),
(3, 19, '092a0807668bbec1aaefd7ea1cdff364ea9d9b76.png', '', '2015-04-12 01:49:14', '2015-04-12 01:49:14'),
(4, 19, '98a2f249e00424282826fff596f2e83fd740608d.png', '', '2015-04-12 02:31:19', '2015-04-12 02:31:19'),
(5, 19, '7dc2a838027bf3e8e9b91c115c4b1086cc7bd60b.jpg', '', '2015-04-12 02:32:10', '2015-04-12 02:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Developer', '2015-02-15 02:53:33', '2015-11-22 17:18:21'),
(2, 'Web Programmer', '2015-11-22 17:18:08', '2015-11-22 17:18:08'),
(3, 'Sys Admin', '2015-11-22 17:18:39', '2015-11-22 17:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `updated_at`, `status`, `user_id`, `category_id`, `image`) VALUES
(5, '1', '1', '2014-10-31 02:33:06', '2014-11-13 08:51:26', 0, 1, 0, ''),
(8, '3', '3\r\n', '2014-10-31 05:04:50', '2014-10-31 05:04:50', 0, 1, 0, ''),
(9, '5', '5', '2014-11-01 02:11:26', '2014-11-01 02:11:26', 0, 1, 0, ''),
(10, 'haha', 'haha', '2014-11-02 21:39:18', '2014-11-02 21:39:18', 1, 1, 0, ''),
(11, 'Berita', 'Berita', '2014-11-03 02:40:48', '2014-11-03 02:40:48', 0, 1, 1, ''),
(12, 'Berita Baru', 'Berita Baru', '2014-11-03 03:15:29', '2014-11-03 03:15:29', 1, 1, 1, ''),
(13, 'Berita basi', 'berita basi', '2014-11-03 03:28:13', '2014-11-13 18:28:46', 1, 1, 1, 'Screenshot from 2014-10-22 16:26:32.png'),
(14, 'Test Upload', 'test upload', '2014-11-03 03:29:54', '2014-11-03 03:29:54', 1, 1, 1, 'Screenshot from 2014-10-22 14:58:50.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_comment` tinyint(1) NOT NULL,
  `date_posting` datetime NOT NULL,
  `comment_expired` datetime NOT NULL,
  `read` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`, `status`, `user_id`, `category_id`, `image`, `headline`, `is_comment`, `date_posting`, `comment_expired`, `read`, `slug`) VALUES
(36, 'New Article slug', '<p style="text-align: justify;"><strong>Projects.co.id</strong> adalah &ldquo;Project and Digital Product Marketplace&rdquo; atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa). <strong>Projects.co.id</strong> juga menyediakan tempat untuk terjadinya transaksi penjualan product digital antara seller (penjual product) dan buyer (pembeli product).</p>\r\n<p style="text-align: justify;">Dengan demikian Projects.co.id sebagai online marketplace pertama di dunia yang menggabungkan dua konsep besar, dua konsep besar yang dimaksud adalah:</p>\r\n<p style="text-align: justify;">Transaksi project (menawarkan project dan mencari project), antara owner (pemberi kerja) dan worker (pekerja).<br />&ldquo;Semua pekerjaan yang hasil akhirnya bisa dikemas dalam bentuk file&rdquo; bisa dikerjakan di Projects.co.id.</p>\r\n<p style="text-align: justify;">Transaksi Jual Beli Produk Digital antara seller (penjual produk) dan buyer (pembeli produk).<br />&ldquo;Semua produk digital yang bisa dikemas dalam bentuk file&rdquo; bisa diperjualbelikan di space penjualan Projects.co.id.<br />Projects.co.id bertindak sebagai &ldquo;Mediator, Fasilitator dan Penjamin&rdquo; agar terjadi hubungan kerja yang win-win antara :</p>\r\n<p style="text-align: justify;">Owner dan Worker<br />Owner menerima hasil kerja sesuai dengan yang diinginkan dan worker menerima bayaran sesuai dengan yang dijanjikan.</p>\r\n<p style="text-align: justify;">Buyer dan Seller<br />Buyer menerima produk sebagaimana yang diinginkan dan seller menerima bayaran sesuai harga penjualan</p>\r\n<p style="text-align: justify;">Untuk meningkatkan kenyamanan bagi pengguna, telah tersedia fitur "Service". Melalui service Sekarang worker/seller bisa mempromosikan keahliannya pada pembuatan project untuk suatu pekerjaan tertentu:</p>\r\n<p style="text-align: justify;">Buyer semakin mudah untuk mendapatkan suatu produk digital yang benar-benar sesuai dengan kebutuhannya;<br />Owner juga semakin mudah untuk membuat project yang menjadi kebutuhannya</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: justify;"><br />Banyak Faktor yang Menghambat Perusahaan Multinasional Dengan Modal Besar untuk Mengembangkan Marketplace di Indonesia, Antara Lain:<br />Hambatan bahasa, sebagian besar pengguna internet di Indonesia masih mengalami kesulitan dalam memahami workflow pengerjaan project secara online.<br />Hambatan geografis, khususnya dalam hal pembayaran yang masih mengandalkan pembayaran melalui cek yang berbiaya murah namun sangat lambat, atau wire-transfer yang cepat namun sangat mahal.<br />UKM dan kaum profesional di Indonesia masih banyak yang belum familier dengan internet.</p>', '2015-04-01 05:08:09', '2015-04-07 07:51:09', 1, 1, 2, '3df0a5439f2219b0c163b655e998e7f09c4dd48a.jpg', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa). Projects.co.id juga menyediakan t', 1, '2015-04-01 19:07:21', '2015-04-30 19:07:26', 0, 'new-article-slug');

-- --------------------------------------------------------

--
-- Table structure for table `post_albums`
--

CREATE TABLE IF NOT EXISTS `post_albums` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 26, 8),
(2, 28, 2),
(3, 28, 1),
(7, 31, 10),
(8, 31, 2),
(27, 9, 9),
(28, 9, 10),
(30, 10, 2),
(31, 8, 9),
(32, 34, 11),
(33, 34, 12),
(34, 35, 9),
(35, 35, 12),
(36, 36, 9),
(37, 36, 12),
(38, 20, 10),
(39, 15, 10),
(40, 14, 1),
(41, 29, 12);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(10) unsigned NOT NULL,
  `date_start` datetime NOT NULL,
  `date_close` datetime NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date_start`, `date_close`, `place`, `description`, `staff_id`, `file`, `created_at`, `updated_at`) VALUES
(7, '2015-02-16 10:23:18', '2015-02-16 10:23:23', 'RSHS BANDUNG', '', 5, '6447ab9b7d4d3fac41da16089ac24229a6dd38b4.jpg', '2015-02-15 20:29:21', '2015-02-15 20:29:21'),
(8, '2015-02-28 17:08:55', '2015-02-28 17:09:55', 'Alun-alun Bandung', '', 5, 'c80eb052b28ff42f40e5b72bfee7890c23911a43.jpg', '2015-02-16 03:10:13', '2015-02-16 03:10:13'),
(11, '2015-01-01 06:34:43', '2015-01-01 06:34:52', 'Sukabumi', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa).', 5, '', '2015-02-18 16:35:17', '2015-02-18 16:35:17'),
(12, '2015-03-01 10:15:21', '2015-03-01 10:15:30', 'RSHS BANDUNG', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa).', 5, '', '2015-02-18 20:15:46', '2015-02-18 20:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'phone', '08782570432', '2014-12-09 00:49:34', '2014-12-09 00:49:34'),
(2, 'company name', 'example co ltd', '2014-12-09 05:18:05', '2014-12-09 05:18:05'),
(3, 'company address', 'Selabintana road 167 Sukabumi', '2014-12-09 05:18:47', '2014-12-09 05:18:47'),
(4, 'email', 'cs@company.com', '2014-12-09 05:19:21', '2014-12-09 05:19:21'),
(5, 'fax', '022 - 2678910', '2014-12-09 05:19:46', '2014-12-09 05:19:46'),
(6, 'status', '0', '2014-12-09 05:20:49', '2014-12-09 05:20:49'),
(7, 'owner', 'Budi Hariyana', '2014-12-19 20:47:42', '2014-12-19 20:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `motto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `position_id`, `motto`, `file`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 'Anggara Jauhari', 1, 'Dooooo', 'af4c5692005ca88a3e1d6b4accacb4abc16815cb.jpg', '2015-02-15 06:47:35', '2015-02-15 18:26:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'gosip', '0000-00-00 00:00:00', '2014-11-26 06:33:41'),
(2, 'food', '2014-11-26 01:35:09', '2014-11-26 01:35:09'),
(8, 'style', '2014-11-26 22:08:56', '2014-11-26 22:08:56'),
(9, 'sport', '2014-11-26 22:16:44', '2014-11-26 22:16:44'),
(10, 'test aja lah', '2014-11-26 23:00:33', '2014-11-26 23:00:33'),
(11, 'event', '2015-02-15 01:06:14', '2015-02-15 01:06:14'),
(12, 'kesehatan', '2015-02-15 01:06:14', '2015-02-15 01:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, NULL, 0, 0, 0, NULL, NULL, NULL),
(3, 3, NULL, 0, 0, 0, NULL, NULL, NULL),
(4, 1, '192.168.43.223', 0, 0, 0, NULL, NULL, NULL),
(5, 4, NULL, 0, 0, 0, NULL, NULL, NULL),
(6, 5, NULL, 0, 0, 0, NULL, NULL, NULL),
(7, 6, NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 7, NULL, 0, 0, 0, NULL, NULL, NULL),
(9, 1, '::1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'budihariyana2@gmail.com', 'administrator', '$2y$10$HNHS3vyEfCdWyjjuj9cjKuYg6oJzQM5L76QKJgoU1aR3SxGa2YsOu', '', 1, NULL, '2014-11-27 19:14:36', '2015-11-17 22:03:23', '$2y$10$L1FnS9TQNSHWtSjRAEgCGOHdBB3z.tiHMsdY5F50vxMYIMAQxW2ki', NULL, 'budi', 'hariyana', '2014-11-27 19:14:36', '2015-11-17 22:03:23'),
(2, 'dika@love.com', 'dika', '$2y$10$twUFI/OPB3LgVqboxtWbqObp89Sane8Fe0zH.pAXbWOADS.UGQZZS', '', 1, NULL, '2014-11-27 20:59:05', '2015-02-10 23:13:39', '$2y$10$.mwyI.qOeeSJ71pTkZ8FJO/drQ2XO8WHe4wWPYricvMWmMnHSKGp6', NULL, 'ayummi', 'dika', '2014-11-27 20:59:05', '2015-02-10 23:13:39'),
(3, 'guest@email.com', 'guest', '$2y$10$nND2eHUDLMLmIurxiVhRCuUqESNHDutXPEZavnQ.8vZ2lTjhe6SsS', '', 1, NULL, '2014-11-29 01:21:06', '2014-12-14 03:20:39', '$2y$10$jkoPZH.EmpOLqQ4S368N5uD7Gh9t9/CsdUM.cZUia2FQpyje8T2d.', NULL, 'gugu', 'guest', '2014-11-29 01:21:06', '2014-12-14 03:20:39'),
(4, 'mamama@ayahoo.com', 'mamama', '$2y$10$4V6oYCeiDaMFKnK/JcNcjuWXqNJEOrV0YUtnf/qm7C3ieaVHPQ9DS', NULL, 1, NULL, '2015-02-16 01:45:37', NULL, NULL, NULL, 'papapap', '-', '2015-02-16 01:45:36', '2015-02-16 01:45:37'),
(5, 'komarudin@yahoo.com', 'komarudin', '$2y$10$N0X3EJWRPplEgtfiFVGmEeIOr.YJ9UOjDIHEER5Au9CBYxdVM4S4.', NULL, 1, NULL, '2015-02-22 06:46:00', NULL, NULL, NULL, 'Kang Komar', '-', '2015-02-22 06:46:00', '2015-02-22 06:46:00'),
(6, 'komars@yahoo.com', 'komars', '$2y$10$dCxtPdmVB6zykC6VA4tnP.IPTJQo83yFvpZHrygKIphKCQoJUubKW', NULL, 1, NULL, '2015-02-22 06:48:11', NULL, NULL, NULL, 'Kang Komar', '-', '2015-02-22 06:48:11', '2015-02-22 06:48:11'),
(7, 'komarx@yahoo.com', 'komarx', '$2y$10$wp/i/eT.xIQufpGVFMUeAOzPTkOelQqT1QiYFOJChhAESrv92oHLm', NULL, 1, NULL, '2015-02-22 06:49:26', NULL, NULL, NULL, 'Kang Komar', '-', '2015-02-22 06:49:26', '2015-02-22 16:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(6, 3),
(7, 1),
(7, 2),
(7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_items`
--
ALTER TABLE `file_items`
  ADD PRIMARY KEY (`id`), ADD KEY `file_items_file_id_foreign` (`file_id`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `group_menus`
--
ALTER TABLE `group_menus`
  ADD PRIMARY KEY (`id`), ADD KEY `group_menus_group_id_foreign` (`group_id`), ADD KEY `group_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_items`
--
ALTER TABLE `media_items`
  ADD PRIMARY KEY (`id`), ADD KEY `media_items_media_id_foreign` (`media_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_value_unique` (`value`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `post_albums`
--
ALTER TABLE `post_albums`
  ADD PRIMARY KEY (`id`), ADD KEY `post_albums_post_id_foreign` (`post_id`), ADD KEY `post_albums_album_id_foreign` (`album_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`), ADD KEY `schedules_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`), ADD KEY `staffs_position_id_foreign` (`position_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`), ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD KEY `users_activation_code_index` (`activation_code`), ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_items`
--
ALTER TABLE `file_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group_menus`
--
ALTER TABLE `group_menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `media_items`
--
ALTER TABLE `media_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `post_albums`
--
ALTER TABLE `post_albums`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `file_items`
--
ALTER TABLE `file_items`
ADD CONSTRAINT `file_items_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_menus`
--
ALTER TABLE `group_menus`
ADD CONSTRAINT `group_menus_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `group_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_items`
--
ALTER TABLE `media_items`
ADD CONSTRAINT `media_items_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_albums`
--
ALTER TABLE `post_albums`
ADD CONSTRAINT `post_albums_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `post_albums_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
ADD CONSTRAINT `schedules_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
ADD CONSTRAINT `staffs_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
