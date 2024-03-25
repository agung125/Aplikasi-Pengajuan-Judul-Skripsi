-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Mar 2024 pada 07.16
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judul_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nipy` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`id`, `dosen_id`, `nama_dosen`, `nipy`, `created_at`, `updated_at`) VALUES
(1, 7, 'dairoh', 21212, '2024-03-22 14:19:58', '2024-03-22 14:19:58'),
(2, 8, 'sarfina', 23232, '2024-03-22 14:20:25', '2024-03-22 14:20:25'),
(3, 9, 'ardi', 21213, '2024-03-24 01:43:47', '2024-03-24 01:43:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dps`
--

CREATE TABLE `dps` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `judul_skripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dps`
--

INSERT INTO `dps` (`id`, `mahasiswa_id`, `judul_skripsi`, `dosen_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'Aplikasi lapangan futsal', 3, '2024-03-24 02:26:03', '2024-03-24 02:26:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `nim` int NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sks` int NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `status_matkul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `mahasiswa_id`, `nim`, `nama_mahasiswa`, `total_sks`, `status`, `status_matkul`, `invoice`, `created_at`, `updated_at`) VALUES
(1, 4, 2301, 'alfin', 110, 'aktif', 'lulus', NULL, '2024-03-22 14:18:19', '2024-03-22 14:18:19'),
(2, 5, 2302, 'tegar', 110, 'aktif', 'lulus', NULL, '2024-03-22 14:18:42', '2024-03-22 14:18:42'),
(3, 6, 2303, 'dewi', 100, 'aktif', 'tidak lulus', 'Jumlah SKS mata kuliah Metodologi Penelitian tidak mencukupi', '2024-03-22 14:19:14', '2024-03-22 14:19:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_15_005324_create_permission_tables', 1),
(6, '2024_03_22_124239_create_skripsis_table', 1),
(7, '2024_03_22_125207_create_dosens_table', 1),
(8, '2024_03_22_130204_create_mahasiswas_table', 1),
(9, '2024_03_22_131458_create_dps_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'roles.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(2, 'roles.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(3, 'roles.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(4, 'roles.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(5, 'skripsis.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(6, 'skripsis.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(7, 'skripsis.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(8, 'skripsis.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(9, 'dps.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(10, 'dps.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(11, 'dps.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(12, 'dps.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(13, 'mahasiswas.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(14, 'mahasiswas.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(15, 'mahasiswas.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(16, 'mahasiswas.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(17, 'dosens.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(18, 'dosens.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(19, 'dosens.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(20, 'dosens.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(21, 'permissions.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(22, 'users.index', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(23, 'users.create', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(24, 'users.edit', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(25, 'users.delete', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(2, 'sekprod', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(3, 'kaprod', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(4, 'dosen', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(5, 'mahasiswa', 'web', '2024-03-22 14:17:39', '2024-03-22 14:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(5, 2),
(5, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(5, 4),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsis`
--

CREATE TABLE `skripsis` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `judul_skripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_approve_1_id` bigint UNSIGNED DEFAULT NULL,
  `user_approve_2_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekprod_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skripsis`
--

INSERT INTO `skripsis` (`id`, `mahasiswa_id`, `dosen_id`, `judul_skripsi`, `file`, `invoice`, `user_approve_1_id`, `user_approve_2_id`, `created_at`, `updated_at`, `sekprod_id`) VALUES
(1, 1, 1, 'Aplikasi lapangan futsal', 'XAXYXTVOHyTVv5dENwYNjLtCOCoV5Ce8fqmL7Zhv.pdf', 'Sekpro : Berkas Sudah Sesuai', 7, 2, '2024-03-22 14:22:14', '2024-03-23 08:21:27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$hV6.MDPLDfQ5./npyoyT6eE4n03M9kEqmHUgIgfj5qzX5.v0BtjRm', NULL, '2024-03-22 14:17:39', '2024-03-22 14:17:39'),
(2, NULL, 'wijayanti', 'wijayanti@gmail.com', NULL, '$2y$10$kMzA/bEqRqMXiZI74ZIVVuh5MdjE.HBZmdDLNNkbKsp283Nqqkrh6', NULL, '2024-03-22 14:17:40', '2024-03-22 14:17:40'),
(3, NULL, 'slamet wiyono', 'slamet@gmail.com', NULL, '$2y$10$USIZlwxQUBGyPOGlnicH3ubvDq2w3JAsIe45.Wc08gHsv.z.4Uy5W', NULL, '2024-03-22 14:17:40', '2024-03-22 14:17:40'),
(4, 1, 'alfin', 'alfin@gmail.com', NULL, '$2y$10$5AHQ3mt3ym2MIqnkdUm.UOMpro.iIP1f6Qp4HSR6zB6MgPNv2jEzi', NULL, '2024-03-22 14:18:18', '2024-03-22 14:18:19'),
(5, 2, 'tegar', 'tegar@gmail.com', NULL, '$2y$10$rDsM9tfzmh/RBea.IbVljOQ6Cr0.nijF/pCd2FS6LkuKPJF3zH7De', NULL, '2024-03-22 14:18:42', '2024-03-22 14:18:42'),
(6, 3, 'dewi', 'dewi@gmail.com', NULL, '$2y$10$GR7Yx4uN1gcu3zAHF7gN2uR3PpuxiqeHxp8BuY//YEtjJAfKPnLCy', NULL, '2024-03-22 14:19:14', '2024-03-22 14:19:14'),
(7, 1, 'dairoh', 'dairoh@gmail.com', NULL, '$2y$10$.dA6qw0JqczQGrn7HTGY8uUhzTb9MRgGWacaFfe.WfxydcGfnGXqC', NULL, '2024-03-22 14:19:58', '2024-03-22 14:19:58'),
(8, 2, 'sarfina', 'sarfina@gmail.com', NULL, '$2y$10$bsAVueX7LJxEnJVkCLCw9OOvZSVWTQtgw36fYarqSg9ul9Dx5rUaa', NULL, '2024-03-22 14:20:25', '2024-03-22 14:20:25'),
(9, 3, 'ardi', 'ardi@gmail.com', NULL, '$2y$10$DA4repoXYhYx17/5Fjemx.WKoi5uOJpBC2rEhczgLwbNV9NrrAKy2', NULL, '2024-03-24 01:43:47', '2024-03-24 01:43:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dps`
--
ALTER TABLE `dps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsis_user_approve_1_id_foreign` (`user_approve_1_id`),
  ADD KEY `skripsis_user_approve_2_id_foreign` (`user_approve_2_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dps`
--
ALTER TABLE `dps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD CONSTRAINT `skripsis_user_approve_1_id_foreign` FOREIGN KEY (`user_approve_1_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `skripsis_user_approve_2_id_foreign` FOREIGN KEY (`user_approve_2_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
