-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 07:26 AM
-- Server version: 5.5.29-0ubuntu1
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budihariyana-studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `content`, `status`, `ip`, `created_at`, `updated_at`) VALUES
(2, 11, 'dika', 'dika@email.com', 'test comment lagi', 1, '', '0000-00-00 00:00:00', '2015-02-17 00:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file_items`
--

CREATE TABLE IF NOT EXISTS `file_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `file_items_file_id_foreign` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galeries`
--

CREATE TABLE IF NOT EXISTS `galeries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `group_menus_group_id_foreign` (`group_id`),
  KEY `group_menus_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `group_menus`
--

INSERT INTO `group_menus` (`id`, `group_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(6, 1, 21, '2015-02-20 02:32:55', '2015-02-20 02:32:55'),
(7, 3, 21, '2015-02-20 02:32:55', '2015-02-20 02:32:55'),
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
(25, 1, 10, '2015-02-27 00:08:41', '2015-02-27 00:08:41'),
(26, 1, 6, '2015-02-27 00:09:25', '2015-02-27 00:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `download` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `download` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `media_items_media_id_foreign` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `icon`, `class`, `order`, `disable`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'admin-default', 'fa fa-bar-chart-o', '', '0', NULL, '2014-12-24 00:13:19', '2015-02-18 02:03:33'),
(2, 0, 'Utilitas', '#', 'fa fa-wrench', '', '4', NULL, '2014-12-24 00:42:52', '2014-12-25 09:33:18'),
(3, 2, 'User', 'listUsers', 'fa fa-check', '', '1', NULL, '2014-12-24 00:47:10', '2014-12-24 01:10:41'),
(4, 0, 'CMS', '#', 'fa fa-money', '', '3', NULL, '2014-12-25 09:33:03', '2015-02-15 20:41:19'),
(5, 4, 'Post', 'posts-list', 'fa fa-cubes', '', '0', NULL, '2014-12-25 09:43:15', '2014-12-25 09:43:15'),
(6, 0, 'E-commerce', '#', 'fa fa-cubes', '', '4', NULL, '2014-12-25 09:45:42', '2015-02-15 20:40:55'),
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
(18, 15, 'Data Schedule', 'schedule-list', 'fa fa-clock-o', '', '3', NULL, '2015-02-15 20:46:46', '2015-02-15 20:46:46'),
(21, 0, 'test we lah', '#', 'fa fa-instagram', '', '0', NULL, '2015-02-20 00:59:08', '2015-02-20 00:59:08');

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_value_unique` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', '2015-02-15 02:53:33', '2015-02-15 02:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`, `status`, `user_id`, `category_id`, `image`, `headline`, `is_comment`, `date_posting`, `comment_expired`, `read`, `slug`) VALUES
(10, 'After accepting the request permission, you will be redirected to the login page with the code parameter.', '<p>After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;After accepting the request permission, you will be redirected to the login page with the code parameter.&nbsp;</p>', '2014-11-02 21:39:18', '2015-04-07 20:12:08', 1, 1, 2, '8fc92a6318138744ddf4e9799d8fe842e9a72b46.jpg', 'After accepting the request permission, you will be redirected to the login page with the code parameter.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 'after-accepting-the-request-permission-you-will-be-redirected-to-the-login-page-with-the-code-parameter'),
(11, 'Built aura project reloading modules twice with requirejs', '<p>Berita</p>', '2014-11-03 02:40:48', '2015-04-08 04:22:08', 0, 1, 2, 'fc3470d3bb2f596994b6b1bb33e851c17ca6e957.jpg', 'Built aura project reloading modules twice with requirejs', 0, '2015-04-07 16:55:21', '2015-04-30 16:55:25', 0, 'built-aura-project-reloading-modules-twice-with-requirejs'),
(12, 'Berita Baru', '<p>Berita Baru</p>', '2014-11-03 03:15:29', '2015-04-07 03:00:26', 1, 1, 2, '', 'hahaha', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 80, 'berita-baru'),
(13, 'Berita basi', '<p>berita basi</p>', '2014-11-03 03:28:13', '2015-04-07 03:01:04', 1, 1, 3, 'Screenshot from 2014-10-22 16:26:32.png', 'Berita basi\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'berita-basi'),
(14, 'Test Upload', '<p>test upload</p>', '2014-11-03 03:29:54', '2015-04-07 02:55:02', 1, 1, 4, 'Screenshot from 2014-10-22 14:58:50.png', 'mamam', 1, '2015-04-08 16:54:52', '2015-04-09 16:54:58', 50, 'test-upload'),
(15, 'Blog Picture', '<p>hahah aya2 wae</p>', '2014-11-25 01:23:01', '2015-04-07 02:54:17', 1, 1, 3, 'permintaan-sppi-anggota-komisaris-poslog4.jpg', 'jajaj', 1, '2015-04-07 16:54:08', '2015-05-02 16:54:12', 0, 'blog-picture'),
(16, 'test tag', '<p>hahahaha</p>', '2014-11-26 21:48:39', '2015-04-07 02:53:45', 0, 1, 2, 'BNVdMxTCAAEcRlw.jpg', 'kakak', 0, '2015-04-07 16:53:34', '2015-05-02 16:53:39', 0, 'test-tag'),
(18, 'ysse', '<p>jajaj</p>', '2014-11-26 21:50:14', '2015-04-07 03:01:32', 0, 1, 2, 'BNVdMxTCAAEcRlw.jpg', 'mamam', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ysse'),
(20, 'lalal', '<p>jajaj</p>', '2014-11-26 21:57:56', '2015-04-07 02:53:17', 1, 1, 2, 'BNVdMxTCAAEcRlw.jpg', 'mamam', 1, '2015-04-07 16:53:06', '2015-04-08 16:53:11', 0, 'lalal'),
(29, 'welcome home', '<p>welcome to my blog</p>', '2014-11-26 22:16:44', '2015-04-07 03:02:12', 1, 1, 2, 'BNVdMxTCAAEcRlw.jpg', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'welcome-home'),
(31, 'Berita basi part 2', '<p style="text-align: center;"><em><strong>mamama</strong></em></p>', '2014-11-26 23:00:32', '2015-04-07 02:52:34', 0, 1, 2, 'ijazah-sma.jpg', 'yayayay', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 'berita-basi-part-2'),
(32, 'xxx', '<p>xxxx</p>', '2015-01-04 03:49:08', '2015-01-04 03:49:08', 1, 2, 2, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'xxx'),
(33, 'zzzz', '<p>hahahahazzz</p>', '2015-01-04 03:50:20', '2015-04-07 02:52:16', 1, 1, 2, '', 'hahaha', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'zzzz'),
(34, 'Pemeriksaan Kesehatan', '<p style="text-align: justify;">Migrations are a type of version control for your database. They allow a team to modify the database schema and stay up to date on the current schema state. Migrations are typically paired with the<a href="http://laravel.com/docs/4.2/schema">Schema Builder</a> to easily manage your application''s schema.&nbsp;Migrations are a type of version control for your database. They allow a team to modify the database schema and stay up to date on the current schema state. Migrations are typically paired with the<a href="http://laravel.com/docs/4.2/schema">Schema Builder</a> to easily manage your application''s schema.</p>', '2015-02-15 01:06:14', '2015-04-07 02:52:01', 1, 1, 5, 'dewi sartika.png', 'Migrations are a type of version control for your database. They allow a team to modify the database schema and stay up to date on the current schema state. Migrations are typically paired with the Schema Builder to easily manage your application''s schema', 1, '2015-02-28 14:54:36', '2015-02-28 14:54:24', 5, 'pemeriksaan-kesehatan'),
(35, 'muahahah', '<p>Kami mengundang programmer untuk membuat project Web seperti www.blurgroup.com. Bagi yang berminat dapat melakukan penawaran dengan menyertakan cv lengkap dan project yang sudah pernah dikerjakan.</p>\r\n<p>MAAF BAGI YANG TIDAK BERPENGALAMAN MOHON TIDAK BID.</p>', '2015-02-15 18:34:34', '2015-04-07 02:51:48', 1, 1, 2, 'a9425751b18f5598f5a54f7057dc3e4a0f89d04b.jpg', 'Kami mengundang programmer untuk membuat project Web seperti www.blurgroup.com. Bagi yang berminat dapat melakukan penawaran dengan menyertakan cv lengkap dan project yang sudah pernah dikerjakan.', 1, '2015-02-16 08:32:56', '2015-02-17 08:33:02', 0, 'muahahah'),
(36, 'New Article slug', '<p style="text-align: justify;"><strong>Projects.co.id</strong> adalah &ldquo;Project and Digital Product Marketplace&rdquo; atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa). <strong>Projects.co.id</strong> juga menyediakan tempat untuk terjadinya transaksi penjualan product digital antara seller (penjual product) dan buyer (pembeli product).</p>\r\n<p style="text-align: justify;">Dengan demikian Projects.co.id sebagai online marketplace pertama di dunia yang menggabungkan dua konsep besar, dua konsep besar yang dimaksud adalah:</p>\r\n<p style="text-align: justify;">Transaksi project (menawarkan project dan mencari project), antara owner (pemberi kerja) dan worker (pekerja).<br />&ldquo;Semua pekerjaan yang hasil akhirnya bisa dikemas dalam bentuk file&rdquo; bisa dikerjakan di Projects.co.id.</p>\r\n<p style="text-align: justify;">Transaksi Jual Beli Produk Digital antara seller (penjual produk) dan buyer (pembeli produk).<br />&ldquo;Semua produk digital yang bisa dikemas dalam bentuk file&rdquo; bisa diperjualbelikan di space penjualan Projects.co.id.<br />Projects.co.id bertindak sebagai &ldquo;Mediator, Fasilitator dan Penjamin&rdquo; agar terjadi hubungan kerja yang win-win antara :</p>\r\n<p style="text-align: justify;">Owner dan Worker<br />Owner menerima hasil kerja sesuai dengan yang diinginkan dan worker menerima bayaran sesuai dengan yang dijanjikan.</p>\r\n<p style="text-align: justify;">Buyer dan Seller<br />Buyer menerima produk sebagaimana yang diinginkan dan seller menerima bayaran sesuai harga penjualan</p>\r\n<p style="text-align: justify;">Untuk meningkatkan kenyamanan bagi pengguna, telah tersedia fitur "Service". Melalui service Sekarang worker/seller bisa mempromosikan keahliannya pada pembuatan project untuk suatu pekerjaan tertentu:</p>\r\n<p style="text-align: justify;">Buyer semakin mudah untuk mendapatkan suatu produk digital yang benar-benar sesuai dengan kebutuhannya;<br />Owner juga semakin mudah untuk membuat project yang menjadi kebutuhannya</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: justify;"><br />Banyak Faktor yang Menghambat Perusahaan Multinasional Dengan Modal Besar untuk Mengembangkan Marketplace di Indonesia, Antara Lain:<br />Hambatan bahasa, sebagian besar pengguna internet di Indonesia masih mengalami kesulitan dalam memahami workflow pengerjaan project secara online.<br />Hambatan geografis, khususnya dalam hal pembayaran yang masih mengandalkan pembayaran melalui cek yang berbiaya murah namun sangat lambat, atau wire-transfer yang cepat namun sangat mahal.<br />UKM dan kaum profesional di Indonesia masih banyak yang belum familier dengan internet.</p>', '2015-04-01 05:08:09', '2015-04-07 07:51:09', 1, 1, 2, '3df0a5439f2219b0c163b655e998e7f09c4dd48a.jpg', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa). Projects.co.id juga menyediakan t', 1, '2015-04-01 19:07:21', '2015-04-30 19:07:26', 0, 'new-article-slug');

-- --------------------------------------------------------

--
-- Table structure for table `post_albums`
--

CREATE TABLE IF NOT EXISTS `post_albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_albums_post_id_foreign` (`post_id`),
  KEY `post_albums_album_id_foreign` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL,
  `date_close` datetime NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `schedules_staff_id_foreign` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date_start`, `date_close`, `place`, `description`, `staff_id`, `file`, `created_at`, `updated_at`) VALUES
(7, '2015-02-16 10:23:18', '2015-02-16 10:23:23', 'RSHS BANDUNG', '', 5, '6447ab9b7d4d3fac41da16089ac24229a6dd38b4.jpg', '2015-02-15 20:29:21', '2015-02-15 20:29:21'),
(8, '2015-02-28 17:08:55', '2015-02-28 17:09:55', 'Alun-alun Bandung', '', 5, 'c80eb052b28ff42f40e5b72bfee7890c23911a43.jpg', '2015-02-16 03:10:13', '2015-02-16 03:10:13'),
(9, '2015-02-28 17:08:55', '2015-02-28 17:09:55', 'Alun-alun Bandung 1', '', 9, '', '2015-02-16 04:11:01', '2015-02-16 04:15:28'),
(10, '2015-02-16 10:23:18', '2015-02-16 10:23:23', 'RSHS BANDUNG', '', 9, '', '2015-02-16 04:11:37', '2015-02-16 04:11:37'),
(11, '2015-01-01 06:34:43', '2015-01-01 06:34:52', 'Sukabumi', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa).', 5, '', '2015-02-18 16:35:17', '2015-02-18 16:35:17'),
(12, '2015-03-01 10:15:21', '2015-03-01 10:15:30', 'RSHS BANDUNG', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa).', 5, '', '2015-02-18 20:15:46', '2015-02-18 20:15:46'),
(13, '2015-04-01 10:29:14', '2015-03-01 10:29:27', 'Cianjur', 'Projects.co.id adalah “Project and Digital Product Marketplace” atau tempat transaksi (menawarkan project dan mencari project) secara online antara owner (pemberi kerja/ pengguna jasa) dan worker (pekerja/ penyedia jasa).', 7, '', '2015-02-18 20:29:38', '2015-02-18 20:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `motto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staffs_position_id_foreign` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `position_id`, `motto`, `file`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 'Dr. Budi Hariyana, M.sc, ', 1, 'Dooooo', 'af4c5692005ca88a3e1d6b4accacb4abc16815cb.jpg', '2015-02-15 06:47:35', '2015-02-15 18:26:52', 0),
(6, 'Dr.g Pipin Firdaus', 1, 'Haha', '183d9a2c2281001e05c1b4e73a95a47650ae0e27.jpg', '2015-02-15 08:08:47', '2015-02-15 18:48:09', 0),
(7, 'Dr. Dapid Bekam', 1, 'kakak', '30ee5c995d1c2ffd05f1397a9f1fd5f359de6563.jpg', '2015-02-15 08:36:22', '2015-02-21 00:19:30', 0),
(8, 'mama', 1, 'kaka', 'e8ea043df2d95b32fc426ab439c66a3b7fde64a0.jpeg', '2015-02-15 18:14:47', '2015-02-15 18:46:58', 0),
(9, 'Drs. Buddy Hariyana', 1, 'hahaha', '61877178d93f1a8ff9f94f16337a102c7b363143.jpg', '2015-02-15 23:54:51', '2015-02-15 23:54:51', 0),
(10, 'Dr. Muslihat alias Kang Mus', 1, 'papapa', '2c6415bc6d7c8af161b1b5312da25f44e8a8d843.jpg', '2015-02-15 23:59:50', '2015-02-21 00:20:24', 0),
(11, 'Kang Ucup', 1, 'papapa', 'f83c621e670444df0570d202dded64ac9bad8db8.png', '2015-02-16 01:41:37', '2015-02-21 00:20:02', 0),
(12, 'Kang Komar', 1, 'papapa', '4994a4e59f4692391a587f73965ddaebe5aa00af.png', '2015-02-16 01:45:36', '2015-02-22 06:49:26', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

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
(8, 7, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'budihariyana2@gmail.com', 'administrator', '$2y$10$HNHS3vyEfCdWyjjuj9cjKuYg6oJzQM5L76QKJgoU1aR3SxGa2YsOu', '', 1, NULL, '2014-11-27 19:14:36', '2015-11-16 16:29:59', '$2y$10$hrZkptbDZuwuDtQqWss1tO.Nt9esl/t4g37miJUcuCmms0Dmr7NeS', NULL, 'budi', 'hariyana', '2014-11-27 19:14:36', '2015-11-16 16:29:59'),
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
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
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
