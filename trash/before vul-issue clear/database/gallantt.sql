CREATE TABLE `business_brochures` (
  `id` int(11) NOT NULL,
  `business_name` enum('steel','real_estate','cement') NOT NULL,
  `brochure_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_corporatereports` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `doc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
CREATE TABLE `web_districts` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_employeewelfare` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_financialhighlight` (
  `id` int(11) NOT NULL,
  `highlights` text NOT NULL,
  `consolidated` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_financialreports` (
  `id` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_homepagevideo` (
  `id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_investorreportheading` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_investorreports` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `file_path` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_jobapplication` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `resume_file` varchar(255) DEFAULT NULL,
  `applied_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `job_type` enum('Full-Time','Part-Time','Contract') NOT NULL,
  `location` varchar(255) NOT NULL,
  `vacancies` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','disabled','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_mediagallery` (
  `id` int(11) NOT NULL,
  `media_name` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `media_image` varchar(256) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `date_of_post` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('live','disabled') DEFAULT NULL,
  `media_file` varchar(255) DEFAULT NULL,
  `media_file_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_reportcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_reports` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_reportsubcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_resourcecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_resources` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `file_type` enum('doc','video') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_sections` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `consumer_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `web_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `business_brochures`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `web_banners`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `web_blogs`
  ADD PRIMARY KEY (`blog_id`);
ALTER TABLE `web_contactform`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_corporatereports`
--
ALTER TABLE `web_corporatereports`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_districts`
--
ALTER TABLE `web_districts`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_employeewelfare`
--
ALTER TABLE `web_employeewelfare`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_financialhighlight`
--
ALTER TABLE `web_financialhighlight`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_financialreports`
--
ALTER TABLE `web_financialreports`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_homepagevideo`
--
ALTER TABLE `web_homepagevideo`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_investorreportheading`
--
ALTER TABLE `web_investorreportheading`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_investorreports`
--
ALTER TABLE `web_investorreports`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_jobapplication`
--
ALTER TABLE `web_jobapplication`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_jobs`
--
ALTER TABLE `web_jobs`
  ADD PRIMARY KEY (`job_id`);
--
-- Indexes for table `web_mediagallery`
--
ALTER TABLE `web_mediagallery`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_products`
--
ALTER TABLE `web_products`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_reportcategories`
--
ALTER TABLE `web_reportcategories`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_reports`
--
ALTER TABLE `web_reports`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_reportsubcategories`
--
ALTER TABLE `web_reportsubcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);
--
-- Indexes for table `web_resourcecategories`
--
ALTER TABLE `web_resourcecategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);
--
-- Indexes for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);
--
-- Indexes for table `web_sections`
--
ALTER TABLE `web_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `product_id` (`product_id`);
--
-- Indexes for table `web_states`
--
ALTER TABLE `web_states`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_subscribers`
--
ALTER TABLE `web_subscribers`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `business_brochures`
--
ALTER TABLE `business_brochures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `web_banners`
--
ALTER TABLE `web_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `web_blogs`
--
ALTER TABLE `web_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `web_contactform`
--
ALTER TABLE `web_contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `web_corporatereports`
--
ALTER TABLE `web_corporatereports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `web_districts`
--
ALTER TABLE `web_districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `web_employeewelfare`
--
ALTER TABLE `web_employeewelfare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `web_financialhighlight`
--
ALTER TABLE `web_financialhighlight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `web_financialreports`
--
ALTER TABLE `web_financialreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_homepagevideo`
--
ALTER TABLE `web_homepagevideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `web_investorreportheading`
--
ALTER TABLE `web_investorreportheading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_investorreports`
--
ALTER TABLE `web_investorreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `web_jobapplication`
--
ALTER TABLE `web_jobapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `web_jobs`
--
ALTER TABLE `web_jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_mediagallery`
--
ALTER TABLE `web_mediagallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `web_products`
--
ALTER TABLE `web_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_reportcategories`
--
ALTER TABLE `web_reportcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_reports`
--
ALTER TABLE `web_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_reportsubcategories`
--
ALTER TABLE `web_reportsubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_resourcecategories`
--
ALTER TABLE `web_resourcecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_resources`
--
ALTER TABLE `web_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_sections`
--
ALTER TABLE `web_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_states`
--
ALTER TABLE `web_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `web_subscribers`
--
ALTER TABLE `web_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `web_reportsubcategories`
  ADD CONSTRAINT `web_reportsubcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `web_reportcategories` (`id`);
ALTER TABLE `web_resources`
  ADD CONSTRAINT `web_resources_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `web_resourcecategories` (`id`);
COMMIT;
